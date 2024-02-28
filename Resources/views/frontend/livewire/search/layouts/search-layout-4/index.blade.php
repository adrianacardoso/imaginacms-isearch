<div class="searchLayout4">
  <a class="btn-search {{$classButton}}" data-toggle="modal" data-target="#modalSearch4">
    <i class="{{ $icon }}"></i>
  </a>
  <div id="modalSearch4" class="modal fade p-0" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0 bg-transparent border-0">
        <div class="modal-header border-0">
          <a type="button" class="close text-white px-0" data-dismiss="modal" data-backdrop="false" aria-label="Close"
             style="opacity: 1;">
            <i class="fa fa-close"></i>
          </a>
        </div>
        <div class="modal-body bg-white">
          <livewire:isite::filter-autocomplete
            :showModal="$showModal"
            :icon="$icon"
            :placeholder="$placeholder"
            :buttonSearch="true"
            :params="$params"
            :title="$title"
            :minSearchChars="$minSearchChars"
            :goToRouteAlias="$goToRouteAlias"
            :withLabelButton="$withLabelButton"
            :labelButton="$labelButton"
          />
        </div>
      </div>
    </div>
  </div>
</div>
@section('scripts')
  @parent
  <style>

    .searchLayout4 .btn {
      color: #ffffff;
      font-size: 22px;
      padding: 0 15px 0 0;
      border-radius: 0 !important;
    }
    .searchLayout4 .btn:focus {
      box-shadow: none;
    }
    .searchLayout4 .form-control {
      border-width: 0 0 2px 0;
      color: #444444;
      background-color: transparent;
      border-radius: 0;
    }
    .searchLayout4 .form-control:focus {
      color: #444444;
      background-color: transparent;
      border-color: #444444;
      outline: 0;
      box-shadow: none;
    }
    @if(!empty($styleButton))
    .searchLayout4 .btn-search {
    {!!$styleButton!!}
    }
    @endif
  </style>
@stop



