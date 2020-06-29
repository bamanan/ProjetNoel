<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Letter extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['title', 'slug', 'content', 'person_id'];

    protected $dates = ['seen_at'];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function answer()
    {
        return $this->hasOne('App\Answer');
    }

    public function getIsReadedAttribute()
    {
        return $this->readed;
    }

    /**
     * @param Boolean $readed
     */
    public function setAttributeReaded()
    {
        $this->update(['readed' => true]);
    }
}
