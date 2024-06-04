<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function redirectTo()
     {
        return route('announcements.create');
     }

     public function createAnnouncement()
     {
        $title = "Crea un annuncio";
        return view('announcements.create');
     }
    public function indexAnnouncement()
    {
        $announcements = Announcement::where('is_accepted', true)->latest()->paginate(6);
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showAnnouncement(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcements)
    {
        //
    }
}
