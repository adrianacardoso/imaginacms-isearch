<div class="searchLayout3">
  <a class="btn-search {{$classButton}}" data-toggle="modal" data-target="#modalSearch3">
    <i class="{{ $icon }}"></i>
  </a>
  <div id="modalSearch3" class="modal fade p-0" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content rounded-0">
        <div class="modal-body px-4">
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
    .searchLayout3 .modal-dialog {
      max-width: 100%;
      margin: 0;
    }
    .searchLayout3 .btn {
      color: #ffffff;
      font-size: 22px;
      padding: 0 15px;
      border-radius: 0 !important;
    }
    .searchLayout3 .btn:focus {
      box-shadow: none;
    }
    .searchLayout3 .form-control {
      border-width: 0 0 2px 0;
      color: #444444;
      background-color: transparent;
      border-radius: 0;
    }
    .searchLayout3 .form-control:focus {
      color: #444444;
      background-color: transparent;
      border-color: #444444;
      outline: 0;
      box-shadow: none;
    }
    .searchLayout3 .form-control::placeholder {
      color: #555555;
    }
    @if(!empty($styleButton))
    .searchLayout3 .btn-search {
    {!!$styleButton!!}
    }
    @endif
  </style>
@stop
