<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ParentController extends Controller
{
    public function list() {
        $data['getRecord'] = User::getAdmin();
        $data ['header_title'] = "Manage Administrator";
        return view('admin.admin.list', $data);
    }
}
