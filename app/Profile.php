<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ["favourite", "strongest", "weakest", "bio"];

    protected $table = "profiles";
}
