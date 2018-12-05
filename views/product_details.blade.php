@extends('teebpd::layouts.demonstration')
@php
$metas = ['code' => 'Product Code'];
$relat = ['Brand' => ['Brand','name'], 'Category' => ['Category','name'], 'Size' => ['Size','name']];
$details = ['Brand' => ['Brand','name'], "Product" => "name", "Category" => ['Category','name'], "Code" => "code", "Reference" => "", "Re-Order" => "", "Rack" => "", "Price" => ""];
@endphp
@section('content')
        <div class="contents-detail single-product">
            <div class="main-single-product row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div id="product" class="product">
                        <div class="row">
                            <div class="bwp-single-product product-type-external zoom" data-product_layout_thumb="zoom" data-zoom_scroll="true" data-zoom_contain_lens="true" data-zoomtype="inner" data-lenssize="200" data-lensshape="square" data-lensborder="1" data-bordersize="2" data-bordercolour="#f9b61e" data-popup="true">
                                <div class="bwp-single-image col-md-6 col-sm-12 col-xs-12">
                                    <div class="images vertical">
                                        <figure class="woocommerce-product-gallery woocommerce-product-gallery--with-images images">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div id="image-thumbnail" class="image-thumbnail slick-carousel" data-columns4="5" data-columns3="5" data-columns2="5" data-columns1="5" data-columns="5" data-nav="true" data-vertical=&quot;true&quot; data-verticalswiping=&quot;true&quot;>
                                                        @forelse($Product->Images as $Image)
                                                            <div class="img-thumbnail">
                                                                <a href="{{ $Image->__upload_file_details['image']['url'] }}" data-image="{{ $Image->__upload_file_details['image']['url'] }}" class="img-thumbnail first active" title="">
                                                                    <img width="470" height="594" src="{{ $Image->__upload_file_details['image']['url'] }}" class="attachment-shop_catalog size-shop_catalog" alt="{{ $Product->name }}" title="{{ $Product->name }}" data-zoom-image="{{ $Image->__upload_file_details['image']['url'] }}"/>
                                                                </a>
                                                            </div>
                                                        @empty
                                                            <div class="img-thumbnail">
                                                                <a href="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" data-image="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" class="img-thumbnail first active" title="">
                                                                    <img width="470" height="594" src="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" class="attachment-shop_catalog size-shop_catalog" alt="{{ $Product->name }}" title="{{ $Product->name }}" data-zoom-image="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg"/>
                                                                </a>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="image-additional text-center">
                                                        @if($Product->Images->isNotEmpty())
                                                            @php $url = $Product->Images[0]->__upload_file_details['image']['url'] @endphp
                                                            <div data-thumb="{{ $url }}" class="woocommerce-product-gallery__image">
                                                                <a href="{{ $url }}">
                                                                    <img width="720" height="909" src="{{ $url }}" class="attachment-shop_single size-shop_single wp-post-image" alt="" id="image" title="" data-src="{{ $url }}" data-large_image="{{ $url }}" data-large_image_width="950" data-large_image_height="1200"/>
                                                                </a>
                                                            </div>
                                                            @else
                                                            <div data-thumb="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" class="woocommerce-product-gallery__image">
                                                                <a href="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg">
                                                                    <img width="720" height="909" src="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" class="attachment-shop_single size-shop_single wp-post-image" alt="" id="image" title="" data-src="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" data-large_image="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" data-large_image_width="950" data-large_image_height="1200"/>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="bwp-single-info col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="summary entry-summary">
                                        <div class="product_meta">
                                            @foreach($details as $display => $value)
                                                <span class="sku_wrapper">{{ $display }}:
                                                    @if(is_array($value))
                                                        <span> {{ ($value[0] && $Product->{$value[0]}) ? $Product->{$value[0]}->{$value[1]} : '' }}</span>
                                                    @else
                                                        <span> {{ $value ? $Product->$value : '' }}</span>
                                                    @endif
                                                </span>
                                            @endforeach
                                        </div>
                                        <!--<h1 itemprop="name" class="product_title entry-title">{{ $Product->name }}</h1>-->
                                        <!--<p class="price"> <span class="woocommerce-Price-amount amount"> <span class="woocommerce-Price-currencySymbol">&#36;</span> 259.00 </span> </p>-->
                                        <!--<div itemprop="description" class="description"><p>{!! nl2br($Product->description) !!}</p></div>-->
                                        <h3>Add to Wish List</h3>
                                        @if($visitor)
                                        <div>
                                            <form method="post" id="wishlist_entry" action="{{ route('wishlist.add.product') }}" onsubmit="return validateWLEntry()">
                                                @csrf <input type="hidden" name="product" value="{{ $Product->id }}">
                                                <select name="wishlist" style="width: 100%; height: 50px; background-color: #e5ae49; color: #F2F2F2" onchange="wlchange(this)">
                                                    @if($visitor->Wishlists->count() + $visitor->SharedWishlist->count() !== 1)<option value="">Select Wish List</option>@endif
                                                    @forelse($visitor->Wishlists as $owl) <option value="{{ $owl->id }}" @if($owl->Items->contains('product',$Product->id)) disabled @endif>{{ $owl->name }}@if($owl->Items->contains('product',$Product->id))  - Already in Wish List @endif</option> @empty @endforelse
                                                    @forelse($visitor->SharedWishlist as $vwl) <option value="{{ $vwl->id }} @if($vwl->Items->contains('product',$Product->id)) disabled @endif">{{ $vwl->name }}@if($vwl->Items->contains('product',$Product->id))  - Already in Wish List @endif</option> @empty @endforelse
                                                    <option value="-1">Create New Wish List</option>
                                                </select>
                                                <div class="create margin-top-5" style="display: none">
                                                    <small style="visibility: hidden; color: #900b00; display: block;">Please enter a Name</small>
                                                    <input type="text" name="name" value="" size="40" placeholder="Enter A Name ..." autocomplete="off" class="margin-bottom-1">
                                                    <input type="text" name="description" value="" size="40" placeholder="Enter Description ..." autocomplete="off" class="margin-bottom-1">
                                                </div>
                                                <input type="submit" id="wl_add" style="width: 100%; background-color: #e5ae49; color: #F2F2F2; height: 48px; margin-top: 3px;" value="Add" disabled="disabled">
                                            </form>
                                            @push('script')
                                                <script type="text/javascript">
                                                    $(function(){ wlchange($('[name="wishlist"]')[0]) });
                                                    function wlchange(e) {
                                                        val = e.value; $('#wl_add').prop('disabled',val === "");
                                                        if(val == "-1") $('.create').slideDown(); else $('.create').slideUp();
                                                    }
                                                    function validateWLEntry(){
                                                        if($('[name="wishlist"]').val() !== "-1") return true;
                                                        frm = $('#wishlist_entry'); name = $('[name="name"]',frm).val();
                                                        if(name.trim() == "") { $('small',frm).css('visibility','visible'); return false }
                                                        $('small',frm).css('visibility','hidden'); return true;
                                                    }
                                                </script>
                                            @endpush
                                        </div>
                                        @else
                                            <p class="entry-date">Enter your details to have access to wish lists</p>
                                            <form method="post" id="visitor_entry" action="{{ route('store.visitor') }}" onsubmit="return validateVisitorEntry()">@csrf
                                                <input type="text" name="name" value="" style="width: 90%" placeholder="Enter Your Name ..." autocomplete="off" class="margin-bottom-1">
                                                <input type="email" name="email" value="" style="width: 90%" placeholder="Enter Your Email ..." autocomplete="off" class="margin-bottom-1">
                                                <input type="text" name="number" value="" style="width: 90%" placeholder="Enter Your Number ..." autocomplete="off" class="margin-bottom-1">
                                                <input type="submit" name="set-visitor" value="Submit"><small style="visibility: hidden; color: #900b00; margin-left: 5px">Please fill name and either Mobile or Email</small>
                                                @push('script')
                                                    <script type="text/javascript">
                                                        function validateVisitorEntry(){
                                                            frm = $('#visitor_entry');
                                                            email = $('[name="email"]',frm).val(); number = $('[name="number"]',frm).val(); name = $('[name="name"]',frm).val();
                                                            if((email.trim() == "" && number.trim() == "") || name.trim() == "") { $('small',frm).css('visibility','visible'); return false }
                                                            $('small',frm).css('visibility','hidden'); return true;
                                                        }
                                                    </script>
                                                @endpush
                                            </form>
                                        @endif
                                        <!--<div class="clear"></div>-->
                                        <!--<div class="product_meta">
                                            @foreach($relat as $display => $RelFld)
                                            <span class="sku_wrapper">{{ $display }}: <span> {{ $Product->{$RelFld[0]} ? $Product->{$RelFld[0]}->{$RelFld[1]} : '' }}</span></span>
                                            @endforeach
                                            @foreach($metas as $meta => $display)
                                            <span class="sku_wrapper">{{ $display }}: <span> {{ $Product->$meta }}</span></span>
                                            @endforeach
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

@endsection
