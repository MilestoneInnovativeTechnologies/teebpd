<?php

namespace Milestone\Teebpd\Model;

//use Illuminate\Database\Eloquent\Model;
use Milestone\Appframe\Model\Model;

class ProductImage extends Model
{
    public $storage = [
        ['disk' => 'tpi', 'path' => ''],
    ];

    public $files = ['image'];
    protected $table = 'product_images';
}
