<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class userinfo extends Model
{
    protected $table = "userinfo";
    protected $primaryKey = "uid";
    protected $keyType = "string";
    public $timestamps = false;

    function lives(): BelongsToMany{
        return $this->belongsToMany(
            House::class,
            'live',
            'uid', //live.uid
            'hid' //live.hid
            
        );
    }
}
