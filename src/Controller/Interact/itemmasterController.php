<?php

namespace Milestone\Teebpd\Controller\Interact;

use Illuminate\Http\Request;
use Milestone\Teebpd\Controller\Controller;
use Milestone\Teebpd\Model\Product;
use Milestone\Teebpd\Model\ItemGroupMaster;

class itemmasterController extends Controller
{

    public $Model = 'Milestone\Teebpd\Model\Product';
    public $Fillable = ['name','code','description','narration','narration2','narration3','narration4','narration5','narration6','narration7','narration8','narration9','narration10','refno','ref2no','itemserial','type','category_01','category_02','category_03','category_04','category_05','category_06','category_07','category_08','category_09','category_10','status'];
    public $PrimaryTransform = null;
    public $PrimaryTransformMethod = 'getPrimaryValue';
    public $Transforms = [
        'name' => 'NAME',
        'code' => 'CODE',
        'description' => 'NARRATION',
        'narration' => 'NARRATION',
        'narration2' => 'NARRATION2',
        'narration3' => 'NARRATION3',
        'narration4' => 'NARRATION4',
        'narration5' => 'NARRATION5',
        'narration6' => 'NARRATION6',
        'narration7' => 'NARRATION7',
        'narration8' => 'NARRATION8',
        'narration9' => 'NARRATION9',
        'narration10' => 'NARRATION10',
        'refno' => 'REFNO',
        'ref2no' => 'REF2NO',
        'itemserial' => 'ITEMSERIAL',
        'status' => 'STATUS'
    ];
    public $TransformMethods = [
        'category_01' => 'getCategory01',
        'category_02' => 'getCategory02',
        'category_03' => 'getCategory03',
        'category_04' => 'getCategory04',
        'category_05' => 'getCategory05',
        'category_06' => 'getCategory06',
        'category_07' => 'getCategory07',
        'category_08' => 'getCategory08',
        'category_09' => 'getCategory09',
        'category_10' => 'getCategory10',
    ];

    public function getPrimaryValue($data){
        $record = Product::where('code',$data['CODE'])->first();
        return $record ? $record->id : null;
    }

    public function getCategory01($data){ return $this->getCategory($data,'01'); }
    public function getCategory02($data){ return $this->getCategory($data,'02'); }
    public function getCategory03($data){ return $this->getCategory($data,'03'); }
    public function getCategory04($data){ return $this->getCategory($data,'04'); }
    public function getCategory05($data){ return $this->getCategory($data,'05'); }
    public function getCategory06($data){ return $this->getCategory($data,'06'); }
    public function getCategory07($data){ return $this->getCategory($data,'07'); }
    public function getCategory08($data){ return $this->getCategory($data,'08'); }
    public function getCategory09($data){ return $this->getCategory($data,'09'); }
    public function getCategory10($data){ return $this->getCategory($data,'10'); }

    private function getCategory($data,$num){
        $catecode = $data['CATCODE_' . $num]; $gcode = $data['GCODE_' . $num];
        return $this->getCategoryCode($catecode,$gcode);
    }

    private function getCategoryCode($catecode,$gcode){
        $refno = implode("/",[$catecode,$gcode]);
        $record = ItemGroupMaster::where(compact('refno'))->first();
        return ($record) ? $record->id : null;
    }

}
