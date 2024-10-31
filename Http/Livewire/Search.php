<?php

namespace Modules\Isearch\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Icommerce\Repositories\ProductRepository;
use Modules\Iblog\Repositories\PostRepository;
use Modules\Isearch\Transformers\SearchItemTransformer;

use Illuminate\Http\Request;

class Search extends Component
{
  public $view;
  public $search;
  public $defaultView;
  public $params;
  public $results;
  public $showModal;
  public $icon;
  public $placeholder;
  public $title;
  public $minSearchChars;
  public $goToRouteAlias;
  public $labelButton;
  public $withLabelButton;
  public $classButton;
  public $styleButton;
  public $applyTenantUrlToBtnSearch;

  protected $queryString = [
    'search' => ['except' => ''],
  ];


  public function mount($layout = 'search-layout-1', $showModal = false, $icon = 'fa fa-search', $placeholder = null,
                        $title = '', $params = [], $minSearchChars = null, $goToRouteAlias = null, $labelButton = null,
                        $withLabelButton = false, $classButton = '', $styleButton = '', $applyTenantUrlToBtnSearch = false )
  {
    $this->defaultView = 'isearch::frontend.livewire.search.layouts.search-layout-1.index';
    $this->view = isset($layout) ? 'isearch::frontend.livewire.search.layouts.' . $layout . '.index' : $this->defaultView;
    $this->results = [];
    $this->showModal = isset($showModal) ? $showModal : false;
    $this->icon = !empty($icon) ? $icon : 'fa fa-search';
    $this->placeholder = $placeholder ?? trans('isearch::common.form.search_here');
    $this->title = $title;
    $this->params = $params;
    $this->minSearchChars = $minSearchChars ?? setting('isearch::minSearchChars', null, "3");
    $this->goToRouteAlias = $goToRouteAlias ?? config('asgard.isearch.config.route', 'isearch.search');
    $repos = json_decode(setting('isearch::repoSearch'));
    $this->params['filter']['repositories'] = $this->params['filter']['repositories'] ?? $repos;
    $this->labelButton = $labelButton;
    $this->withLabelButton = $withLabelButton;
    $this->classButton = $classButton;
    $this->styleButton = $styleButton;
    $this->applyTenantUrlToBtnSearch = $applyTenantUrlToBtnSearch;

  }

  public function render()
  {
    return view($this->view);
  }
}
