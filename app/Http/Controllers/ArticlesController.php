<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 2016-11-15
 * Time: 20:47
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController
{



    public function create(Request $request) {



        return view('articles.create');
    }


    public function store(Request $request) {

        $name = $request->get("name");
        $body = $request->get("body");



      //  echo dd([ $name, $body, $tjolahopp ]);

    }

}