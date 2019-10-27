<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminProfile(){
    	return view('frontView.admin.adminProfile');
    }

    public function editAdminProfile(){
        return view('frontView.admin.adminProfile');
    }

    public function dashboardAdmin(){
    	return view('frontView.admin.dashboardAdmin');
    }

    public function merchantTable(){
    	return view('frontView.admin.merchantTable');
    }

     public function editMerchant(){
        return view('frontView.admin.merchantTable');
    }

    public function ownerTable(){
    	return view('frontView.admin.ownerTable');
    }

     public function editOwner(){
        return view('frontView.admin.ownerTable');
    }

    public function respondentTable(){
    	return view('frontView.admin.respondentTable');
    }

    public function editRespondent(){
        return view('frontView.admin.respondentTable');
    }
}
