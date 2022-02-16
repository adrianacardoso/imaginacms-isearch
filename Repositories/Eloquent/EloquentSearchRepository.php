<?php

namespace Modules\Isearch\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Iblog\Entities\Post;
use Modules\Isearch\Repositories\Collection;
use Modules\Isearch\Repositories\SearchRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Laracasts\Presenter\PresentableTrait;
use Modules\Isearch\Transformers\SearchItemTransformer;

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
      return $results;
    }
  }
}
