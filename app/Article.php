<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'intro',
        'body',
        'excerpt',
        'published_at'
    ];

    protected $dates = ['published_at'];

    /**
     * setPublishedAtAttribute 设置发布时间
     * 
     * @param mixed $date 
     * @access public
     * @return void
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * user 关联用户表 对应一个用户
     * 
     * @access public
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * category 关联分类表  对应一个类别
     * 
     * @access public
     * @return void
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * tags 关联文章表  多对多
     * 
     * @access public
     * @return void
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * getTagListAttribute 标签列表id
     * 
     * @access public
     * @return void
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }

    /**
     * comments 评论
     * 
     * @access public
     * @return void
     */
    public function comments()
    {
        return $this->hasMany('App\comment');
    }

    /**
     * getNextArticleId 获取下一篇文章id
     * 
     * @param mixed $id 
     * @access public
     * @return void
     */
    public static function getNextArticleId($id)
    {
        return Article::where('id', '>', $id)->min('id');
    }

    /**
     * getPrevArticleId 获取上一篇文章id
     * 
     * @param mixed $id 
     * @static
     * @access public
     * @return void
     */
    public static function getPrevArticleId($id)
    {
        return Article::where('id', '<', $id)->max('id');
    }

    /**
     * getNewArticle 近期文章
     * 
     * @static
     * @access public
     * @return void
     */
    public static function getNewArticle()
    {
        return Article::orderBy('published_at', 'desc')->limit(4)->get();
    }

    /**
     * search 前台搜索
     * 
     * @param mixed $query 
     * @static
     * @access public
     * @return void
     */
    public static function search($query)
    {
        return Article::where('title', 'like', '%'.$query.'%')->published();
    }

}
