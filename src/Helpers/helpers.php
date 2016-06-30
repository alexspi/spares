<?php
namespace App\Helpers;

use Alexspi\Spares\Http\Controllers\PrsoCategoryController;
use Alexspi\Spares\Http\Controllers\PrsoProductController;
use Alexspi\Spares\Model\PrsoCategory as PrsoCatecory;
use Alexspi\Spares\Model\PrsoCategory;


class Helper
{
    
    public static function UpdateProductCategori($category_name){
        $val = explode('\\', $category_name);

        $count = count($val);
        dd($count);
        $value = last($val);
        
        if (! $category =  PrsoCategory::where('name',$value)->value('id') ){



            $catnew= new PrsoCategory();
            $catnew->name=$value;
            $catnew->parent_id = null;
            $catnew->save();
            $category = $catnew->id; 
        }



        return $category;
       // dd($category);
    }
    
}