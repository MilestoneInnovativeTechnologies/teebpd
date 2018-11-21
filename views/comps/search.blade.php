<div class="search-box pull-right"><div class="search-toggle"><i class="icon_search"></i></div></div>
@push('extra')
    <div class="search-overlay"><span class="close-search"><i class="icon_close"></i></span>
        <div class="container wrapper-search">
            <form role="search" method="get" action="{{ route('home') }}" class="searchform search-from ajax-search"><input
                    type="text" value="" name="s" class="input-search s" placeholder="Search" autocomplete="off">
                <button class="searchsubmit btn" type="submit"><i class="icon_search"></i></button>
            </form>
        </div>
    </div>
@endpush
