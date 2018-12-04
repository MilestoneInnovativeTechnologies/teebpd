<?php

namespace Milestone\Teebpd\Controller\Interact;

use Illuminate\Http\Request;
use Milestone\Teebpd\Controller\Controller;
use Milestone\Teebpd\Model\ItemGroupMaster;

class itemgroupmasterController extends Controller
{

    public $Model = 'Milestone\Teebpd\Model\ItemGroupMaster';
    public $Fillable = ['refno','catecode','gcode','name','type','status'];
    public $PrimaryTransform = null;
    public $PrimaryTransformMethod = 'getPrimaryValue';
    public $Transforms = [
        'catecode' => 'CATCODE',
        'gcode' => 'CODE',
        'name' => 'NAME',
        'type' => 'TYPE',
        'status' => 'STATUS',
    ];
    public $TransformMethods = [
        'refno' => 'getRefNo',
    ];

    public function getPrimaryValue($data){
        $catecode = $data['CATCODE']; $gcode = $data['CODE']; $refno = implode("/",[$catecode,$gcode]);
        $record = ItemGroupMaster::where(compact('refno'))->first();
        return $record ? $record->id : null;
    }

    public function getRefNo($data){ return implode("/",array_only($data,['CATCODE','CODE'])); }
}
