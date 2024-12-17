<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // SiteSettings verisini al
      
        return view('admin.dashboard');
    }
}