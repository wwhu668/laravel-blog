<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     * 
     * @var string
     */
    protected $table = 'categorys';

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = ['name', 'pid', 'order'];

    public function parentCategory()
    {
        return $this->belongsTo('App\Category', 'pid', 'id');
    }

    public function childrenCategorys()
    {
        return $this->hasMany('App\Category', 'id', 'pid');
    }

    /**
     * articles 关联文章表  对应多个文章
     * 
     * @access public
     * @return void
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * 首页排序
     * 
     * @static
     * @access public
     * @return void
     */
    public static function getSortedCategorys()
    {
        $categories = Category::all();
        $result = array();
        $child = array();
        $parent = array();
        foreach($categories as $category) {
            if ($category->pid == 0)
                $parent[] = $category;
            else 
                $child[] = $category;
        }
        foreach($parent as $category) {
            $result[] = $category;
            foreach($child as $key => $childCategory) {
                if($category->id == $childCategory->pid) {
                    $result[] = $childCategory;
                    unset($child[$key]);
                }
            } 
        } 
        return $result;
    }

    public function scopeGetTopLevel($query)
    {
        return $query->where('pid', 0)->get();
    }

    public static function deleteFind($query)
    {
        App\Category::delete($query);
    }
}
