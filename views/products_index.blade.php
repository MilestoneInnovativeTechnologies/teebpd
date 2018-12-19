@extends('teebpd::layouts.demonstration')

@php
    $Products = Milestone\Teebpd\Model\Product::with(['Images','Category','Brand','Color'])->where(['type' => 'Public','status' => 'Active'])->whereHas('Category',function($Q){ $Q->where('list','Yes'); })->whereHas('Brand',function($Q){ $Q->where('list','Yes'); });
    //dd($Products->get()->pluck('Brand.name','id')->toArray());
    if(!empty(request('brand'))){
        $Products->whereHas('Brand',function($Q){ $Q->where('id',request('brand')); });
    }
    if(!empty(request('s'))){
        $like = "%" . request('s') . "%";
        $Products->where(function($Q)use($like){
            $searchs = ['description'];
            foreach($searchs as $search)
                $Q->orWhere($search,'like',$like);
        });
    }
    $Products = $Products->paginate(request('per_page') ?: 16);
@endphp

@push('script') <script type="text/javascript"> var _Products = new Object({}); </script> @endpush
@push('style') <style type="text/css"> .pagination>li.active>span { color:#FFF; background-color: #57bf6d; border-color: #DDD; } </style> @endpush

@section('content')
    <div class="main-archive-product row">
        <div class="bwp-sidebar sidebar-product col-lg-3 col-md-3 col-sm-12 col-xs-12">
            @component('teebpd::comps.sidebar') @endcomponent
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="bwp-top-bar bottom clearfix margin-bottom-20">
                @if(!empty(request('s'))) <div class="pull-left" style="line-height: 25px; padding-right: 20px"> &lt;&lt; <a href="?s=">Clear Search</a></div>  @endif
                <nav class="woocommerce-pagination" style="padding-left: 5% !important;">
                    @php if(!empty(request('s'))) $Products->appends(['s' => request('s')]); if(!empty(request('brand'))) $Products->appends(['brand' => request('brand'), '_bn' => request('_bn')]); @endphp
                    {{ $Products->links() }}
                </nav>
                <div class="woocommerce-result-count hidden-sm hidden-xs pull-left" style="padding-right: 5% !important;">
                    Showing {{ $Products->firstItem() }}–{{ $Products->lastItem() }} of {{ $Products->total() }} item(s)
                </div>
            </div>
            @if(  $Products->isEmpty())
                <p class="woocommerce-info">No products were found.</p>
            @else
                <ul class="products products-list row grid" data-col="col-lg-3 col-md-4 col-sm-6">
                    @foreach($Products as $Product)
                        @component('teebpd::comps.index_product_item',compact('Product')) @endcomponent
                        @push('script') <script type="text/javascript"> _Products['{{ $Product->id }}'] = {!! $Product !!}; </script> @endpush
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
