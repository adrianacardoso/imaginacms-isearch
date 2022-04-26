<?php

namespace Modules\Isearch\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Iblog\Entities\Post;
use Modules\Isearch\Repositories\Collection;
use Modules\Isearch\Repositories\SearchRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Laracasts\Presenter\PresentableTrait;
use Modules\Isearch\Transformers\SearchItemTransformer;
use Illuminate\Support\Str;
class EloquentSearchRepository extends EloquentBaseRepository implements SearchRepository
{

  public function whereSearch($searchphrase)
  {
    return $this->posts->where('title', 'LIKE', "%{$searchphrase}%")
      ->orWhere('description', 'LIKE', "%{$searchphrase}%")
      ->orderBy('created_at', 'DESC')->paginate(12);
  }

  public function getItemsBy($params)
  {
    $results = Collect();
    $filter = $params->filter;
    $minCharactersSearch = setting("isearch::minSearchChars");
    
    $params->filter->minCharactersSearch = setting("isearch::minSearchChars",null,3);
    $params->page = 0;
    $params->take = 0;
    if (isset($filter->repositories)) {
      !is_array($filter->repositories) ? $filter->repositories = [$filter->repositories] : false;
      foreach ($filter->repositories as $repository) {
        try {
          $repository = app($repository);
          $items = $repository->getItemsBy($params);
          $results = $results->concat($items);
        } catch (\Exception $e) {
          \Log::info("Isearch::SearchRepository | getItemsBy error:".$e->getMessage());
        }
      }
      $words = explode(' ', trim($filter->search));

      foreach($results as &$result){
        $result->coincidences=0;
        foreach ($words as $index => $word) {
          if(strlen($word)>=$minCharactersSearch){
            $pos = strpos(Str::slug($result->title ?? $result->name ?? ""),Str::slug($word));
            if($pos !== false){
              $result->coincidences+=1;
            }//if pos
            $pos = strpos(Str::slug($result->description ?? $result->body ?? ""),Str::slug($word));
            if($pos !== false){
              $result->coincidences+=1;
            }//if pos
          }//if str len words
        }//foreach words
      }//foreach collection
      
      //Sort by coincidences
      $results=$results->sortByDesc("coincidences");
      
  
      return $results;
    }//searchItems
    
  }
}
