<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorDashboardController extends Controller
{
    public function authorDashboard(){
        return view('backend.content.authorDashboard');
    }
}
