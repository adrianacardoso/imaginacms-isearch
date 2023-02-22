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
      
    </div>
    <br>
  </div>
@stop

