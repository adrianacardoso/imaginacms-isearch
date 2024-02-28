<div id="searchLayout1">
    <a data-toggle="modal" data-target="#searchModal"
       class="btn btn-link text-secondary icon cursor-pointer {{$classButton}}">
        <i class="{{ $icon }}"></i>
    </a>
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <x-isite::logo imgClasses="text-center d-inline-block search-logo" />
                    </div>
                    <h5 class="text-center my-4 font-weight-bold">
                        {{ $title }}
                    </h5>
                    <div id="search-box">
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
</div>
@section('scripts')
    @parent
    <style>
        @if(!empty($styleButton))
        #searchLayout1 .btn-link {
        {!!$styleButton!!}
        }
        @endif
        #searchLayout1 .cover-img {
            object-fit: cover;
            max-height: 70px;
        }
        #searchLayout1 .search-logo {
            max-height: 100px;
            min-height: 100px;
            width: auto !important;
        }
        @media (max-width: 991.98px) {
            #searchLayout1 .search-logo {
                min-height: 40px;
            }
        }

    </style>
    @stop