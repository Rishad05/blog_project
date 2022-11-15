<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Throwable;

class UserManagementController extends Controller
{
    public function userManagement(){

        $user = User::all();
        return view('backend.content.userManagement.userList', compact('user'));
    }

    public function create(Request $request){
    //     $file_name='';
    //     if($request->hasFile('author_image')){
    //         $file=$request->file('author_image');
    //         if($file->isValid()){
    //             $file_name = date('Ymdhms').'.'.$file->getClientOriginalExtension();
    //             $file->move('users/', $file_name);
    //         }

    // }


    $request->validate([
        'name' => 'required',
        'email' => 'email|required|unique:users',
        'password' => 'required|min:6',

    ]);

    // dd($request->all());
//     User::create([
//         // 'name' => $request->name,
//         // 'email' => $request->email,
//         // // dd($file_name),
//         // // 'image' => $file_name,
//         // 'role' => $request->role,

//         // 'password' => bcrypt($request->password),


// ]);

$user = new User;

$user->name = $request->name;

      $user->email = $request->email;
        // dd($file_name),
        // 'image' => $file_name,
       $user->role = $request->role;
       $user->password = bcrypt($request->password);
       $user->save();

    return redirect()->back()->with('success','User created successfully');
}


public function delete($id){
    $deleteUser = User::find($id);

    try{
        $deleteUser->delete();
        return redirect()->route('userManagement')->with('error-message','User deleted successfully');
    }
    catch(Throwable $e){
        if($e->getCode()=='23000'){
            return redirect()->back()->with('error-message','Under this table have a relation with other table');
        }
    }
}


public function editUser($id)
{

    $editUser = User::find($id);
    return view('backend.content.userManagement.userEdit', compact('editUser'));
}


public function updateUser(Request $request, $id)
{
   $editUser= User::find($id);

//    $request->validate([
//     'name' => 'required',
//     'email' => 'email|required|unique:users',

// ]);




$editUser->name = $request->name;
 $editUser->email = $request->email;
        // dd($file_name),
        // 'image' => $file_name,
$editUser->role = $request->role;
$editUser->save();



//    $editUser->update([
//         'name' => $request->name,
//         'email' => $request->email,
//         'role' => $request->role,

// ]);
    return redirect()->route('userManagement')->with('success','User updated successfully');
}
}







