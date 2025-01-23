<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class house extends Model
{
    protected $table = "house";
    protected $primaryKey = "hid";
    protected $keyType = "int";
    public $timestamps = false;

    public function own(): HasMany{
        return $this->hasMany(
            Phone::class,
            "hid",
            "hid"
        );
    }
    public function bills(): HasManyThrough{
        return $this->hasManyThrough(
            bill::class,
            phone::class,
            'hid',
            'tel',
            'hid',
            'tel'
        );
    }
}
