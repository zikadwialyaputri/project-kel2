<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    // Dashboard untuk Admin
    public function index()
    {
        return view('admin.dashboard');
    }

    // Dashboard untuk Staff
    public function staffDashboard()
    {
        return view('staff.dashboard');
    }
}
