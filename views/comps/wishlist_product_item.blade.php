
<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom: 1px solid #F2F2F2">
    <div class="products-entry clearfix product-wapper" style="margin-bottom: 0px;">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                <div class="products-thumb">
                    <div class="product-thumb-hover" style="height: 240px;">
                        <a href="{{ route('product.detail',['id' => $Product->Product->id]) }}" class="woocommerce-LoopProduct-link">
                            @forelse($Product->Product->Images as $K => $Image)
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
                    <!--<div class="product-button">
                        <span class="product-quickview" style="border:1px solid #e5ae49; border-right: none">
                            <a href="#" data-product_id="{{ $Product->product }}" class="quickview quickview-button quickview-{{ $Product->product }}">Quick View <i class="icon_search"></i></a>
                        </span>
                        <div class="clear"></div>
                    </div>-->
                </div>
            </div>
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 text-left">
                <h3 class="entry-title margin-bottom-1">
                    {{ $Product->Product->name }}
                    <form action="{{ route('product.alter') }}" method="post" class="pull-right">@csrf
                        <input type="hidden" name="wishlist" value="{{ $Product->wishlist }}">
                        <input type="hidden" name="product" value="{{ $Product->product }}">
                        <input type="hidden" name="from" value="{{ $Product->product_status }}">
                        @php $params = ['Active' => ['danger','Remove from'],'Inactive' => ['success','Add to']]; @endphp
                        <input type="submit" class="pull-right btn btn-{{ $params[$Product->product_status][0] }}" value="{{ $params[$Product->product_status][1] }} wish list">
                    </form>
                </h3>
                <p class="small" style="height: 40px; overflow: hidden">{!! nl2br($Product->Product->description) !!}</p>
                <ul style="list-style: none; padding-left: 0px; font-size: 14px;">
                    <li><span style="display: inline-block; width: 25%;">Brand</span><span class="entry-date">@if($Product->Product->brand) {{ $Product->Product->Brand->name }} @endif</span></li>
                    <li><span style="display: inline-block; width: 25%;">Category</span><span class="entry-date">@if($Product->Product->category) {{ $Product->Product->Category->name }} @endif</span></li>
                    <li><span style="display: inline-block; width: 25%;">Added By</span><span class="entry-date">@if($Product->added_by) {{ $Product->Added->name }} on {{ date('d/M, H:i',strtotime($Product->added_on)) }} @endif</span></li>
                    @if($Product->product_status === 'Inactive')
                    <li><span style="display: inline-block; width: 25%;">Removed By</span><span class="entry-date">@if($Product->removed_by) {{ $Product->Removed->name }} on {{ date('d/M, H:i',strtotime($Product->removed_on)) }} @endif</span></li>
                    @endif
                </ul>
                <!--<hr style="border:1px solid #e5ae49; margin:0px;">
                <h4 class="margin-bottom-1">Notes</h4>
                <ul style="list-style: none; padding-left: 0px; font-size: 14px;">
                    @forelse($Product->Notes as $Note)
                    <li style="display: flex; border-bottom: 1px solid #DDD"><div><p style="margin: 0px; font-size: 12px;" class="entry-date">{{ $Note->Author->name }} - <small>({{ date('d/m',strtotime($Note->created_at)) }})</small>:</p></div><div class="margin-left-15" style="font-size: 12px;">{{ $Note->note }}</div></li>
                    @empty
                        <li style="border-bottom: 1px solid #DDD"> <small class="entry-date">No Notes </small></li>
                    @endforelse
                    <li>
                        <form action="{{ route('wlp.note') }}" method="post">@csrf <input type="hidden" name="wishlistproduct" value="{{ $Product->id }}"><input type="hidden" name="wishlist" value="{{ $Product->wishlist }}">
                            <textarea name="note" style="width: 90%; height: 40px; margin-top: 3px; font-size: 10px;" placeholder="Your Note ..."></textarea>
                            <input type="submit" style="width: 9%; position: relative; top:-16px; left: 2px; height: 40px;" value="Add">
                        </form>
                    </li>
                </ul>-->
            </div>
        </div>
    </div>
</li>
