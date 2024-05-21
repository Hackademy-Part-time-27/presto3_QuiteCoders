<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Announcement;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)-> first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcent $announcement)
    {
        $announcemet->setAccepted(true);
        return redirect()->back()->with('message', 'complimenti, hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcent $announcement)
    {
        $announcemet->setAccepted(false);
        return redirect()->back()->with('message', 'complimenti, hai rifiutato l\'annuncio');
    }


    
}

