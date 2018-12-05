    <aside id="woocommerce_product_categories-9" class="widget woocommerce widget_product_categories">
        <h3 class="widget-title margin-bottom-3">Brands</h3>
        <input type="text" id="bfinp" name="name" value="{{ request('_bn') }}" placeholder="Filter brands" class="margin-bottom-20" onkeyup="flbnd(this.value)">
        @if(request('brand')) <a href="?brand=" class="btn btn-xs pull-right margin-top-6">clear</a> @endif
        <style type="text/css"> ul.product-categories > li:nth-child(n+10) { display:none; } </style>
        <script type="text/javascript">
                @php $Brands = \Milestone\Teebpd\Model\ItemGroupMaster::brand()->withCount('BrandProducts')->orderBy('brand_products_count','desc')->get(); @endphp
            var __brands = {!! $Brands->map(function($brnd){ return array_values($brnd->only(['id','name','brand_products_count'])); }) !!}, __tm = 0;
            $(function(){ $('#bfinp').trigger('onkeyup') });
            function flbnd(val){ clearTimeout(__tm); __tm = setTimeout(flbnd2,250,val); }
            function flbnd2(val){ ppbnds(srtbrnd(__brands,val)); }
            function srtbrnd(__brands,val){
                if(val == "") return __brands;
                TTL = __brands.length; lval = val.toLowerCase();
                indexof = (a) => a[1].toLowerCase().indexOf(lval);
                return __brands.sort((a) => (indexof(a) === -1) ? TTL : indexof(a) - TTL);
            }
            function ppbnds(bnds){
                $UL = $('ul.product-categories').empty();
                _.each(bnds,function(ary,i){
                    $A = $('<a>').text(ary[1]+'('+ary[2]+')');
                    if(ary[0] == '{{ request('brand') }}') $A.attr('style','color: #e5ae49 !important');
                    $A.attr({ 'href':((ary[2] > 0) ? '?_bn='+ary[1]+'&brand=' + ary[0] : '#') });
                    $('<li class="cat-item cat-item-'+ary[0]+'">').html($A).appendTo($UL);
                });
            }
        </script>
        <ul class="product-categories"></ul>
    </aside>
