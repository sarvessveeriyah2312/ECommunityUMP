<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list() {
        $data ['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }

    public function add() {
        $data ['header_title'] = "Create New Admin";
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $user = new User;
        $user->name = trim($request->name);
        $user->matrixid = trim($request->matrixid);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imagePath = $image->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }
        $user->save();

        return redirect('admin/admin')->with('success', 'Admin has been created successfully!');

    }
}

