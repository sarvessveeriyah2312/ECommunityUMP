<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{

    public function index(Request $request)
    {
        $data['getRecord'] = User::getLecturer();
        $data ['header_title'] = "Manage Lecturer";
        $query = User::query();
    
        // Check if the 'search' parameter exists in the request
        if ($request->has('search') && $request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'LIKE', '%' . $searchTerm . '%'); // Replace 'name' with the column you want to search
        }
        $query->where('user_type', 2);
    
        $getRecord = $query->paginate(10); // You can adjust the number of records per page as needed
    
        return view('admin.lecturer.list', ['getRecord' => $getRecord], $data);
    }


    public function list() {
        $data['getRecord'] = User::getLecturer();
        $data ['header_title'] = "Manage Lecturer";
        return view('admin.lecturer.list', $data);
    }

    public function add() {
        $data ['header_title'] = "Create New Lecturer";
        return view('admin.lecturer.add', $data);
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
        $user->user_type = 2;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imagePath = $image->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }
        $user->save();

        return redirect('admin/lecturer')->with('success', 'Lecturer has been created successfully!');

    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data ['header_title'] = "Update Lecturer";
            return view('admin.lecturer.edit', $data);
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

    return redirect('admin/lecturer')->with('success', 'Lecturer has been updated successfully!');
}

public function destroy($id)
{
    $user = User::find($id);
    $user->delete();
    // Implement your logic for deleting the user
    return redirect()->back()->with('success', 'Lecturer deleted successfully.');
}
    
}
