@php
$visitor = (new Milestone\Teebpd\Controller\VisitorController)->getCurrentVisitor();
@endphp
<div id="quickview-container-main">
    <div class="quickview-container woocommerce"><a href="#" class="quickview-close" data-product_id=""></a>
        <div itemscope="" class="product single-product product-type-simple">
            <div class="product_detail">
                <div class="col-lg-6 col-md-6 col-sm-6 img-quickview">
                    <div class="slider_img_productd">
                        <div id="quickview-slick-carousel">
                            <div class="quickview-slick" data-nav="true" data-dots="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 bwp-single-info">
                    <div class="content_product_detail entry-summary">
                        <h1 itemprop="name" class="product_title entry-title"></h1>
                        <div itemprop="description" class="product_description description"><p></p></div>
                        <div class="meta"><span><b>Category:</b> </span><span class="product_category"></span></div>
                        <div class="meta"><span><b>brand:</b> </span><span class="product_brand"></span></div>
                        <!--<div class="price"></div>-->
                        <h3>Add to Wish List</h3>
                        @if($visitor)
                            <div>
                                <form method="post" id="wishlist_entry" action="{{ route('wishlist.add.product') }}" onsubmit="return validateWLEntry()">
                                    @csrf <input type="hidden" name="product" value="">
                                    <select name="wishlist" style="width: 100%; height: 50px; background-color: #e5ae49; color: #F2F2F2" onchange="wlchange(this)">
                                        @if($visitor->Wishlists->count() + $visitor->SharedWishlist->count() !== 1)<option value="">Select Wish List</option>@endif
                                        @forelse($visitor->Wishlists as $owl) <option data-products="{{ $owl->Items->pluck('product') }}" value="{{ $owl->id }}">{{ $owl->name }}</option> @empty @endforelse
                                        @forelse($visitor->SharedWishlist as $vwl) <option data-products="{{ $vwl->Items->pluck('product') }}" value="{{ $vwl->id }}">{{ $vwl->name }}</option> @empty @endforelse
                                        <option value="-1">Create New Wish List</option>
                                    </select>
                                    <div class="create margin-top-5" style="display: none">
                                        <small style="visibility: hidden; color: #900b00; margin-left: 5px">Please enter a Name</small>
                                        <input type="text" name="name" value="" style="width: 90%" placeholder="Enter A Name ..." autocomplete="off" class="margin-bottom-1">
                                        <input type="text" name="description" value="" style="width: 90%" placeholder="Enter Description ..." autocomplete="off" class="margin-bottom-1">
                                    </div>
                                    <input type="submit" id="wl_add" style="width: 100%; background-color: #e5ae49; color: #F2F2F2; height: 48px; margin-top: 3px;" value="Add" disabled="disabled">
                                </form>
                                @push('script')
                                    <script type="text/javascript">
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
                                <input type="text" name="name" value="" size="40" placeholder="Enter Your Name ..." autocomplete="off" class="margin-bottom-1">
                                <input type="email" name="email" value="" size="40" placeholder="Enter Your Email ..." autocomplete="off" class="margin-bottom-1">
                                <input type="text" name="number" value="" size="40" placeholder="Enter Your Number ..." autocomplete="off" class="margin-bottom-1">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@push('script') <script type="text/javascript">(function ($) {
        "use strict";

        function _load_slick_carousel($element) {
            $element.slick({
                arrows: $element.data("nav") ? true : false,
                dots: $element.data("dots") ? true : false,
                prevArrow: '<i class="slick-arrow fa fa-long-arrow-left"></i>',
                nextArrow: '<i class="slick-arrow fa fa-long-arrow-right"></i>',
                slidesToShow: $element.data("columns") || 1,
                asNavFor: $element.data("asnavfor") ? $element.data("asnavfor") : false,
                vertical: $element.data("vertical") ? true : false,
                verticalSwiping: $element.data("verticalswiping") ? $element.data("verticalswiping") : false,
                rtl: ($("body").hasClass("rtl") && !$element.data("vertical")) ? true : false,
                centerMode: $element.data("centermode") ? $element.data("centermode") : false,
                focusOnSelect: $element.data("focusonselect") ? $element.data("focusonselect") : false,
                responsive: [{
                    breakpoint: 1200,
                    settings: {slidesToShow: $element.data("columns1") || 1,}
                }, {breakpoint: 1024, settings: {slidesToShow: $element.data("columns2") || 1,}}, {
                    breakpoint: 768,
                    settings: {slidesToShow: $element.data("columns3") || 1, vertical: false, verticalSwiping: false,}
                }, {
                    breakpoint: 480,
                    vertical: false,
                    verticalSwiping: false,
                    settings: {slidesToShow: $element.data("columns4") || 1, vertical: false, verticalSwiping: false,}
                }]
            });
        }

        _click_quickview_button();

        function _click_quickview_button() {
            $('.quickview-button').on("click", function (e) {
                e.preventDefault();
                var product_id = $(this).data('product_id');
                var product = _Products[product_id];
                $(".quickview-" + product_id).addClass("loading");
                $(".quickview-close").attr('data-product_id',product_id);
                _populate_quickview_data(product);
                _load_slick_carousel($('.quickview-slick'));
                _close_quickview();
                $('.bwp-quick-view').addClass("active");
                $(".quickview-" + product_id).removeClass("loading");
            });
        }

        function _populate_quickview_data(product) {
            $('.product_title.entry-title').text(product.name);
            $('.product_category').text(product.category ? product.category.name : '');
            $('.product_brand').text(product.brand ? product.brand.name : '');
            $('.product_description p').html(product.description);
            $('.product_add_to_wishlist,.yith-wcwl-wishlistaddedbrowse,.yith-wcwl-wishlistexistsbrowse,.yith-wcwl-wishlistaddresponse').attr('data-product_id',product.id);
            $('[name="product"]').val(product.id);
            var qvs = $('.quickview-slick').empty();
            $.each(product.images,function(k,image){
                var img = image.__upload_file_details;
                qvs.append($('<div class="item">').html($('<img>').attr({ 'class':'attachment-shop_single size-shop_single wp-post-image','src':img.image.url,'style':'height:"390px"' })))
            });
            $('[name="wishlist"] option').each(function(i,option){
                var prds = $(option).attr('data-products');
                $(option).text($(option).text().replace(' - Already in this Wish List',''));
                if(prds && prds.indexOf(product.id) > -1) $(option).text($(option).text() + ' - Already in this Wish List'); })
            $('[name="wishlist"]').trigger('change')
        }

        function _close_quickview() {
            $('.quickview-close').on("click", function (e) {
                e.preventDefault();
                $('.quickview-slick').slick('unslick').removeClass(['slick-initialized','slick-slider']);
                $('.bwp-quick-view').removeClass("active");
            });
        }
    })(jQuery);</script>
@endpush
