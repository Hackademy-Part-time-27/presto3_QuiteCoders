<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontController extends Controller
{
    public function welcome () {
        
        $title = "";
        $announcements = Announcement::where('is_accepted', true)->latest()->take(6)->get();
        
        return view('welcome', compact('title', 'announcements'));
    }

    public function categoryShow(Category $category)
    {
        $announcements = Announcement::where('is_accepted', true)->where('category_id', $category->id)->get();
        return view('categoryShow', compact('category', 'announcements'));
    }

    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
    
        return view('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
