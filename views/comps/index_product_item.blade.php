
<li class="col-lg-3 col-md-4 col-sm-6">
    <div class="products-entry clearfix product-wapper">
        <div class="products-thumb">
            <div class="product-thumb-hover" style="height: 360px;">
                <a href="{{ route('product.detail',['id' => $Product->id]) }}" class="woocommerce-LoopProduct-link">
                    @forelse($Product->Images as $K => $Image)
                        @if($K === 0)
                            <img width="470" height="594" src="{{ $Image->__upload_file_details['image']['url'] }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="">
                        @elseif($K === 1)
                            <img width="470" height="594" src="{{ $Image->__upload_file_details['image']['url'] }}" class="hover-image back" alt="">
                        @endif
                    @empty
                        <img>
                    @endforelse
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
