<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait as HasMediaTrait;

class Answer extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['title', 'slug', 'content', 'letter_id'];

    public function letter()
    {
        return $this->belongsTo('App\Letter');
    }

}
