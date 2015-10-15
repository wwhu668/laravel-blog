<?php namespace App;
 
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
 
class Article extends Model {
 
    protected $table = 'articles';
 
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id'
    ];

    protected $dates = ['published_at'];
 
    public function setPublishedAtAttribute($date){
        // 未来日期的当前时间
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        
        // 未来日期的0点
        // $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tags() {
        // return $this->belongsToMany('App\Tag', 'article_tag', 'article_id', 'tag_id')->withTimestamps();
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListAttribute(){
        return $this->tags->lists('id');
    }
 
}
