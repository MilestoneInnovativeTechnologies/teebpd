<?php

namespace Milestone\Teebpd\Controller;

use Illuminate\Http\Request;
use Milestone\Teebpd\Model\Product;

class ProductController extends Controller
{
    public function detail(Product $id){
        $Product = $id->load(['Brand','Category','ProductImages']);
        return view('product_details',compact('Product'));
    }
}
