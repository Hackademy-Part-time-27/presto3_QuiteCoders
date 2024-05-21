<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontController extends Controller
{
    public function welcome () {
        
        $title = "";
        $announcements = Announcement::latest()->take(6)->get();
        
        return view('welcome', compact('title', 'announcements'));
    }

    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }
}
