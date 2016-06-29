<?php

namespace Alexspi\Spares\Model;

//use Illuminate\Database\Eloquent\Model;

use Baum\Node;

class PrsoCategory extends Node
{

//    protected $fillable = [
//        'name', 'slug',  'note', 'desc', 'showtop', 'showside', 'showbottom', 'showcontent',
//    ];
    public static $productPerPage = 30;

    public function products()
    {
        return $this->belongsToMany('Alexspi\Spares\Model\PrsoProduct');
    }

}