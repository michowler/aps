<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin.admin');
    }

    public function adminProfile()
    {
        return view('Admin.adminProfile');
    }

    public function merchantTable()
    {
        return view('Admin.merchantTable');
    }

      public function ownerTable()
      {
        return view('Admin.ownerTable');
    }

     public function respondentTable(){
        return view('Admin.respondentTable');
    }
}
