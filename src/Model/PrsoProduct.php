<?php

namespace Alexspi\Spares\Model;

use Illuminate\Database\Eloquent\Model;
use Request;


class PrsoProduct extends Model 
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'category_id',  'price', 'description', 'number','status', 'artikul', 'views', 'show', 'ostatok','complected', 'complect_id'
    ];


    public function setSlugAttribute($slug)
    {

        if($slug=='') $slug = str_slug(Request::get('name'));
        if($cat= self::where('slug',$slug)->first()){
            $idmax=self::max('id')+1;
            if(isset($this->attributes['id']))
            {
                if ($this->attributes['id'] != $cat->id ){
                    $slug=$slug.'_'.++$idmax;
                }
            }
            else
            {
                if (self::where('slug',$slug)->count() > 0)
                    $slug=$slug.'_'.++$idmax;
            }
        }
        $this->attributes['slug']=$slug;
    }

    public function categories()
    {
        return $this->belongsToMany('Alexspi\Spares\Model\PrsoCategory');
    }

    public function parentCategories()
    {
        return $this->belongsToMany('Alexspi\Spares\Model\PrsoCategory');
    }

    public function setCategoriesAttribute($categories)
    {
        // перепрописываем отношения с таблицей категорий
        $this->categories()->detach();
        if ( ! $categories) return;
        if ( ! $this->exists) $this->save();
        $this->categories()->attach($categories);
    }

    public function getCategoriesAttribute($categories)
    {
        return array_pluck($this->categories()->get()->toArray(), 'id');
    }

}