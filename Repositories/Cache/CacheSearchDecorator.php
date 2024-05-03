<?php

namespace Modules\Isearch\Repositories\Cache;

use Modules\Isearch\Repositories\Collection;
use Modules\Iblog\Entities\Post;
use Modules\Isearch\Repositories\SearchRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSearchDecorator extends BaseCacheDecorator implements SearchRepository
{
    public function __construct(SearchRepository $search)
    {
        parent::__construct();
        $this->posts = Post::query();
        $this->repository = $search;
    }
    
    public function getItemsBy($params)
    {
      return $this->repository->getItemsBy($params);
    }
  
  public function getRepositoriesFromSetting($params)
    {
        return $this->remember(function () use ($params) {
            return $this->repository->getRepositoriesFromSetting($params);
        });
    }

}
