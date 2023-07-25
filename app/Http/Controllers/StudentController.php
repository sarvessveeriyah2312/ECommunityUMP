<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function list() {
        $data['getRecord'] = User::getStudent();
        $data ['header_title'] = "Manage Student";
        return view('admin.student.list', $data);
    }

    public function add() {
        $data ['header_title'] = "Create New Student";
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'matrixid' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->matrixid = trim($request->matrixid);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 3;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imagePath = $image->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }
        $user->save();

        return redirect('admin/student')->with('success', 'Student has been created successfully!');

    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data ['header_title'] = "Update Student";
            return view('admin.student.edit', $data);
        }
        else 
        {
            abort(404);
        }
        
    }
    public function update(Request $request, $id)
{
    
    
    $user = User::find($id);
    $user->name = trim($request->name);
    $user->matrixid = trim($request->matrixid);
    $user->email = trim($request->email);
    if(!empty($request->password))
    {
        $user->password = Hash::make($request->password);
    }
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imagePath = $image->store('profile_images', 'public');
        $user->profile_image = $imagePath;
    }
    $user->save();

    return redirect('admin/student')->with('success', 'Student has been updated successfully!');
}

public function destroy($id)
{
    $user = User::find($id);
    $user->delete();
    // Implement your logic for deleting the user
    return redirect()->back()->with('success', 'Student deleted successfully.');
}
}
