<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * This middleware will check if the user is authenticated to access the
     * dashboard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the admin dashboard.
     *
     * @return View
     */
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }
}
