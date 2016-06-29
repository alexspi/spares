<?php

namespace Alexspi\Spares\Model;

use Alexspi\Spares\Model\PrsoProduct;
use Request;


class PrsoProductUpdate extends PrsoProduct 
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'prso_products';
    protected $guarded = ['id'];
}