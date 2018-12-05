
<li class="col-lg-3 col-md-4 col-sm-6">
    <div class="products-entry clearfix product-wapper">
        <div class="products-thumb">
            <div class="product-thumb-hover">
                <a href="{{ route('product.detail',['id' => $Product->id]) }}" class="woocommerce-LoopProduct-link">
                    @if($Product->Images && $Product->Images->isNotEmpty())
                        <img width="470" height="594" src="{{ $Product->Images[0]->__upload_file_details['image']['url'] }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="">
                        @if($Product->Images->count()>1)
                            <img width="470" height="594" src="{{ $Product->Images[1]->__upload_file_details['image']['url'] }}" class="hover-image back" alt="">
                        @else
                            <img width="470" height="594" src="{{ $Product->Images[0]->__upload_file_details['image']['url'] }}" class="hover-image back" alt="">
                        @endif
                    @else
                        <img width="470" height="594" src="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="">
                        <img width="470" height="594" src="/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg" class="hover-image back" alt="">
                    @endif
                </a>
            </div>
            <div class="product-button">
                <span class="product-quickview" style="border:1px solid #e5ae49; border-right: none">
                    <a href="#" data-product_id="{{ $Product->id }}" class="quickview quickview-button quickview-{{ $Product->id }}">Quick View <i class="icon_search"></i></a>
                </span>
                <div class="clear"></div>
            </div>
        </div>
        <div class="products-content">
            <h3 class="product-title"><a href="{{ route('product.detail',['id' => $Product->id]) }}">{{ $Product->name }}</a></h3>
        </div>
    </div>
</li>
