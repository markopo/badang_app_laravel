<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{

    protected $fillable = [ 'title', 'description', 'time' ];

    protected $hidden = [ 'created_at', 'updated_at' ];
}
