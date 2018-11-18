@extends('teebpd::layouts.demonstration')

@section('content')
    <div class="main-archive-product row">
        <div id="dokan-primary" class="dokan-single-store col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div id="dokan-content" class="store-page-wrap woocommerce" role="main">
                <div class="profile-frame profile-frame-no-banner">
                    <div class="profile-info-box profile-layout-layout3">
                        <div class="profile-info-summery-wrapper dokan-clearfix">
                            <div class="profile-info-summery">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="profile-info" style="width: auto">
                                            <h2 class="store-name">{{ $WishList->name }}</h2>
                                            <ul class="dokan-store-info">
                                                <li class="dokan-store-address padding-bottom-1" style="float: none; width: 100%"><span class="entry-date">{!! nl2br($WishList->description) !!}</span></li>
                                                <li class="dokan-store-address padding-bottom-1" style="float: none; width: 100%"><span style="width: 120px; display: inline-block">Author</span><span class="entry-date">{{ $WishList->Author->name }}</span></li>
                                                <li class="dokan-store-address padding-bottom-1" style="float: none; width: 100%"><span style="width: 120px; display: inline-block">Created On</span><span class="entry-date">{{ date('Y-m-d',strtotime($WishList->created_at)) }}</span></li>
                                                <li class="dokan-store-address padding-bottom-1" style="float: none; width: 100%"><span style="width: 120px; display: inline-block">Sharing with</span><span class="entry-date">{{ $WishList->Visitors->count() }} Users</span></li>
                                                <li class="dokan-store-address padding-bottom-1" style="float: none; width: 100%"><span style="width: 120px; display: inline-block">Total Products</span><span class="entry-date">{{ $WishList->Products->count() }}</span></li>
                                            </ul>
                                        </div></div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="sharing-info">
                                            <h4 class="store-name">Sharing With</h4>
                                            <ul class="filter_brand_product padding-left-1">
                                                    <li style="width: 100%;"><label class="switch"><input type="checkbox" {{ ($WishList->Vendor && $WishList->Vendor->status == 'Active') ? 'checked' :'' }} onchange="sharingChanged(this)" name="vendor"><span class="slider"></span></label><span style="color: #0a0a0a;">Vendor</span></li>
                                                @forelse($WishList->Visitors as $Visitor)
                                                    <li style="width: 100%;"><label class="switch"><input type="checkbox" {{ $Visitor->pivot->status == 'Active' ? 'checked' : '' }} onchange="sharingChanged(this)" name="{{ $Visitor->id }}"><span class="slider"></span></label><span style="color: #0a0a0a;">{{ $Visitor->name }}</span></li>
                                                @empty
                                                    <li style="width: 100%"><small class="entry-date">No other users</small></li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="margin-top-45">Active Products</h3>
                <div class="seller-items">
                    <ul class="products products-list row grid" data-col="col-lg-3 col-md-4 col-sm-6">
                        @forelse($WishList->Items->filter(function($item){ return $item->product_status == 'Active'; }) as $Product)
                            @component('teebpd::comps.wishlist_product_item',['Product' => $Product]) @endcomponent
                        @empty
                            <li class="entry-date padding-left-15">No Products</li>
                        @endforelse
                    </ul>
                </div>
                <h3 class="margin-top-45">Inactive Products</h3>
                <div class="seller-items">
                    <ul class="products products-list row grid" data-col="col-lg-3 col-md-4 col-sm-6">
                        @forelse($WishList->Items->filter(function($item){ return $item->product_status == 'Inactive'; }) as $Product)
                            @component('teebpd::comps.wishlist_product_item',['Product' => $Product]) @endcomponent
                        @empty
                            <li class="entry-date padding-left-15">No Products</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="dokan-secondary">
            <aside id="dokan-store-menu-2" class="widget dokan-store-menu">
                <div class="bwp-filter-ajax">
                    <div id="bwp_form_filter_product">
                        <div class="bwp-filter1 bwp-filter-brand">
                            <h3 class="entry-title">Share</h3>
                            <form action="{{ route('share') }}" method="post">@csrf <input type="hidden" name="wishlist" value="{{ $WishList->id }}">
                                <ul class="filter_brand_product">
                                    <li style="width: 100%; padding: 1px 0px !important;"><input type="text" style="width: 100%;" name="name" value="" size="" placeholder="Name ..." autocomplete="off"></li>
                                    <li style="width: 100%; padding: 1px 0px !important;"><input type="email" style="width: 100%" name="email" value="" size="" placeholder="Email ..." autocomplete="off"></li>
                                    <li style="width: 100%; padding: 1px 0px !important;"><input type="submit" name="share-wishlist" value="Share"></li>
                                </ul>
                            </form>
                        </div>
                        <div class="bwp-filter1 bwp-filter-brand">
                            <h3 class="entry-title">Notes</h3>
                            <ul class="filter_brand_product">
                                @forelse($WishList->Notes as $Note)
                                    <li style="width: 100%">
                                        <div class="clearfix" style="border-bottom: 1px solid #e5ae49"><small class="entry-date pull-left">{{ $Note->Author->name }}</small> <small class="entry-date pull-right">{{ date('Y-m-d',strtotime($Note->created_at)) }}</small></div>
                                        <p style="padding: 0px 25px; font-size: 14px;">{!! nl2br($Note->note) !!}</p>
                                    </li>
                                @empty
                                    <li style="width: 100%"><small class="entry-date">No Notes yet..</small></li>
                                @endforelse
                                <li style="width: 100%">
                                    <div class="clearfix" style="border-bottom: 1px solid #e5ae49"><small class="entry-date pull-left">add your note</small></div>
                                    <form action="{{ route('add.note') }}" method="post">@csrf
                                        <textarea name="note" rows="3" style="margin: 5px auto; width: 90%" value="" placeholder="Your note ..." class="dokan-form-control" required="required" autocomplete="off"></textarea>
                                        <input type="hidden" name="wishlist" value="{{ $WishList->id }}">
                                        <div style="width: 90%; margin: auto"><input type="submit" name="wlnote" value="Add Note" class="btn btn-xs btn-primary pull-right"></div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .switch {position: relative;display: inline-block;width: 48px;height: 24px; margin-right: 24px !important;}  .switch input {opacity: 0;width: 0;height: 0;}  .slider {position: absolute;cursor: pointer;top: 0;left: 0;right: 0;bottom: 0;background-color: #ccc;-webkit-transition: .4s;transition: .4s;}  .slider:before {position: absolute;content: "";height: 16px;width: 14px;left: 4px;bottom: 4px;background-color: white;-webkit-transition: .4s;transition: .4s;}  input:checked + .slider {background-color: #e5c532;}  input:focus + .slider {box-shadow: 0 0 1px #e5ae49;}  input:checked + .slider:before {-webkit-transform: translateX(26px);-ms-transform: translateX(26px);transform: translateX(26px);}
    </style>
@endpush

@push('script')
    <script type="text/javascript">
        function sharingChanged(e) {
            $.get('{{ route('share.alter') }}',{ wishlist:'{{ $WishList->id }}',status:e.checked,user:e.name })
        }
    </script>
@endpush
