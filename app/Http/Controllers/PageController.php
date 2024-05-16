<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PageController extends Controller
{

    public function welcome()
    {
        $title = config('app.name');

        return view('welcome', compact('title'));

    }

    public function aboutMe()
    {
        $name = 'Giuseppe';

        return view('pages.about-me', [
            'title' => $name,
            'description' => 'Laravel<br>Teacher',
        ]);
    }

   

    
}