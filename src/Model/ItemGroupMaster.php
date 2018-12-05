<?php

namespace Milestone\Teebpd\Model;

use Illuminate\Database\Eloquent\Model;

class ItemGroupMaster extends Model
{
    protected $table = 'item_group_master';

    public function scopeCategory($Q){
        return $Q->where('catecode','01');
    }

    public function scopeBrand($Q){
        return $Q->where('catecode','02');
    }

    public function scopeSize($Q){
        return $Q->where('catecode','03');
    }

    public function scopeColor($Q){
        return $Q->where('catecode','4');
    }
	
	public function CategoryProducts(){
		return $this->hasMany(Product::class,'category_01');
	}

	public function BrandProducts(){
		return $this->hasMany(Product::class,'category_02');
	}

	public function SizeProducts(){
		return $this->hasMany(Product::class,'category_03');
	}

	public function ColorProducts(){
		return $this->hasMany(Product::class,'category_04');
	}
}
