<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'article_id',
        'username',
        'email',
        'url',
        'parent_id',
        'content',
    ];

    /**
     * article 对应文章表
     * 
     * @access public
     * @return void
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function parentComment()
    {
        return $this->belongsTo('App\Comment', 'parent_id', 'id');
    }

    public function childrenComments()
    {
        return $this->hasMany('App\Comment', 'parent_id', 'id');
    }

    /**
     * getNewComment 近期评论
     * 
     * @static
     * @access public
     * @return void
     */
    public static function getNewComment()
    {
        return Comment::orderBy('updated_at', 'deac')->limit(4)->get();
    }

}
