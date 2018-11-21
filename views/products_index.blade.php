@extends('teebpd::layouts.demonstration')

@php
    $Products = Milestone\Teebpd\Model\Product::with(['Images','Category','Brand'])->where(['type' => 'Public','status' => 'Active']);
    if(!empty(request('s'))){
        $like = "%" . request('s') . "%";
        $Products->where(function($Q)use($like){
            $searchs = ['name','description'];
            foreach($searchs as $search)
                $Q->orWhere($search,'like',$like);
        });
    }
    $Products = $Products->paginate();
@endphp

@push('script') <script type="text/javascript"> var _Products = new Object({}); </script> @endpush
@push('style') <style type="text/css"> .pagination>li.active>span { color:#FFF; background-color: #57bf6d; border-color: #DDD; } </style> @endpush

@section('content')
    <div class="main-archive-product row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="bwp-top-bar top clearfix">
                @if(!empty(request('s'))) <div class="pull-left" style="line-height: 25px; padding-right: 20px"> &lt;&lt; <a href="?s=">Clear Search</a></div>  @endif
                <div class="woocommerce-result-count hidden-sm hidden-xs pull-left">Showing {{ $Products->firstItem() }}–{{ $Products->lastItem() }} of {{ $Products->total() }} item(s)</div>
                <nav class="woocommerce-pagination pull-right">
                    @if(empty(request('s'))) {{ $Products->links() }} @else {{ $Products->appends(['s' => request('s')])->links() }} @endif
                </nav>
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
