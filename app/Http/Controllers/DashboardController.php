<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {   
        $userId = Auth::user()->id;
        $notesCount = Note::where('user_id', $userId)->count();
        return view("dashboard", [
            "notesCount"=> $notesCount,
        ]);
    }
}

