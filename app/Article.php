<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App
 */
class Article extends Model
{

    public function scopeTrending($query, $take=3){
        return $query->orderBy('reads', 'desc')->take($take)->get();
    }
}
