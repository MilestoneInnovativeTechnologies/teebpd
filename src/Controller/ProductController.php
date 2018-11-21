<?php

namespace Milestone\Teebpd\Controller;

use Illuminate\Http\Request;
use Milestone\Teebpd\Model\Product;

class ProductController extends Controller
{
    public function detail($id){
        $Product = Product::find($id)->load(['Brand','Category','Images']);
        $visitor = (new VisitorController)->getCurrentVisitor();
        return view('teebpd::product_details',compact('Product','visitor'));
    }
}
