@extends('layouts.master')
@section('title')
  {{trans('isearch::common.title')}}-{{$searchphrase}} | @parent
@stop
@section('content')

  <div id="pageIsearch" class="page blog isearch pt-5">
    <div class="container">
      <h1 class="page-header text-primary col-12">{{trans('isearch::common.search')}} "{{$searchphrase}}"</h1>
      <br>
      
      <livewire:isite::filters
        :filters="config('asgard.isearch.config.filters')"
        :showResponsiveModal="false"
        layout="filter-layout-2"
      />
    
      <hr>

      
      @if($viewItemListBase=='index-item-list-icommerce' && is_module_enabled('Icommerce') && $onlyIcommerce)
        <livewire:isite::items-list
          moduleName="Icommerce"
          itemComponentName="icommerce::product-list-item"
          itemComponentNamespace="Modules\Icommerce\View\Components\ProductListItem"
          :configLayoutIndex="config('asgard.icommerce.config.layoutIndex')"
          entityName="Product"
          :showTitle="false"
          :params="['take' => setting('icommerce::product-per-page',null,12)]"
          :configOrderBy="config('asgard.icommerce.config.orderBy')"
          :pagination="config('asgard.icommerce.config.pagination')"
          :responsiveTopContent="['mobile'=>false,'desktop'=>false,'order'=>false]"
        />
      @else
        <livewire:isite::items-list
          moduleName="Isearch"
          itemComponentName="isite::item-list"
          itemComponentNamespace="Modules\Isite\View\Components\ItemList"
          :configLayoutIndex="config('asgard.isearch.config.layoutIndex')"
          :itemComponentAttributes="config('asgard.isearch.config.indexItemListAttributes')"
          entityName="Search"
          :showTitle="false"
          :params="['filter' => ['withoutInternal' => true], 'take' => 12]"
          :responsiveTopContent="['mobile'=>false,'desktop'=>false,'order'=>false]"
        />
      @endif

      
    </div>
    <br>
  </div>
@stop
@section('scripts')
  @parent
  <style>
    #pageIsearch .page-header {
      font-size: 2rem;
      color: var(--primary);
    }
    #pageIsearch .card img {
      height: 200px;
    }
    #pageIsearch .card .item-title a {
      text-decoration: none;
    }
    #pageIsearch .card .item-title a h3 {
      margin-top: 5px;
      font-size: 21px;
    }
    #pageIsearch .card .item-summary a {
      text-decoration: none;
    }
    #pageIsearch .card .item-summary a .summary {
      line-height: 1.4;
    }
    #pageIsearch .card .item-view-more-button a {
      color: var(--primary);
      font-size: 15px;
      font-weight: 400;
    }
    #pageIsearch .card .item-view-more-button a:after {
      margin-left: 8px;
      color: var(--primary);
      font: normal normal normal 14px/1 FontAwesome;
      content: "";
    }

  </style>
@stop


