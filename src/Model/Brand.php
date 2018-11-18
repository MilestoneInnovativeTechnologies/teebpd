<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    public function Products(){
        return $this->hasMany(Product::class,'brand');
    }
}
