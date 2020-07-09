<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'id',
        'Thumb_id',
        'banner_id',

        'title',
        'requirment',
        'solution',
        'impact',
        'description'


    ];

    public function image()
    {

        return $this->belongsTo('App\Image','Thumb_id');
    }


}
