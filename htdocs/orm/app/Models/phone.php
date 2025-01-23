<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $table = "phone";
    protected $primaryKey = "hid";
    protected $keyType = "int";
    public $timestamps = false;
}
