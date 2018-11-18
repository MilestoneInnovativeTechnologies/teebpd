@extends('teebpd::layouts.demonstration')
@php
$metas = [ 'no' => 'No','code' => 'Product Code','size' => 'Size','detail2' => 'Detail 02','detail3' => 'Detail 03','detail4' => 'Detail 04','detail5' => 'Detail 05' ];
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
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="bwp-single-info col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="summary entry-summary">
                                        <h1 itemprop="name" class="product_title entry-title">{{ $Product->name }}</h1>
                                        <!--<p class="price"> <span class="woocommerce-Price-amount amount"> <span class="woocommerce-Price-currencySymbol">&#36;</span> 259.00 </span> </p>-->
                                        <div itemprop="description" class="description"><p>{!! nl2br($Product->description) !!}</p></div>
                                        <!--<div class="yith-wcwl-add-to-wishlist add-to-wishlist-1060">
                                            <div class="yith-wcwl-add-button show" style="display:block">
                                                <a class="add_to_wishlist"> Add to Wishlist</a>
                                                <img src="http://wpbingosite.com/wordpress/demo_hanata/hanata/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden"/>
                                            </div>
                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="http://wpbingosite.com/wordpress/demo_hanata/hanata/wishlist/" rel="nofollow"> Browse wishlist </a>
                                            </div>
                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="http://wpbingosite.com/wordpress/demo_hanata/hanata/wishlist/" rel="nofollow"> Browse wishlist </a>
                                            </div>
                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                                        </div>-->
                                        <div class="clear"></div>
                                        <div class="product_meta">
                                            @foreach($metas as $meta => $display)
                                            <span class="sku_wrapper">{{ $display }}: <span> {{ $Product->$meta }}</span></span>
                                            @endforeach
                                        </div>
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
