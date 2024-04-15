<?php

namespace App\Http\Controllers;
use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class Apicontroller extends Controller
{
    
    public function register(Request $request)
    {
        $newuser = new register();
        $newuser->name = $request->name;
        $newuser->email = $request->email;
        $newuser->address = $request->address;
        $newuser->contactnumber = $request->contactnumber;
        $newuser->profileimage = $request->profileimage;
        $newuser->save();
        // return redirect('/new?message="added');
        return response()->Json(['success'=>1,'message'=>'successfully registered','register'=>$newuser]); 
    }
    public function retrivedata()    
    {
       $result=register::get();
    //    return response()->json()
       return response()->json(['result' => $result]);
      
      }
public function edit($id)
{
    $user = register::find($id);

    if ($user) {
        return response()->json(['success' => 1, 'user' => $user]);
    } else {
        return response()->json(['success' => 0, 'message' => 'User not found'], 404);
    }
}


public function update1(Request $request, $id)
{
    $user = register::find($id);

    // Check if the user exists
    if ($user) {
        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->contactnumber = $request->contactnumber;
        
        // Save the changes
        $user->save();

        // Return a JSON response with success message
        return response()->json(['success' => 1, 'message' => 'User updated successfully']);
    } else {
        // Return a JSON response with an error message if the user is not found
        return response()->json(['success' => 0, 'message' => 'User not found'], 404);
    }   


  }
  public function delete($id)
  {
      $user = register::find($id);
  
      if (!$user) {
          return response()->json(['success' => 0, 'message' => 'User not found'], 404);
      }
  
      $user->delete();
  
      return response()->json(['success' => 1, 'message' => 'User deleted successfully']);
  }
}