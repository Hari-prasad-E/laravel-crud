<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\register;

class Homecontroller extends Controller
{
    //create and store data
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:userdetail,email',
            'address' => 'required|string|max:255',
            'contactnumber' => 'required|min:10|max:12',
            'profileimage' => 'required',

        ];
        $message = [];
        //validate the request data
        $validate = Validator::make($request->all(), $rules, $message);

        //Check if validation fails
        if ($validate->fails()) {
            return redirect('/register')
                ->withErrors($validate)
                ->withInput();
        }
        $newuser = new register();
        $newuser->name = $request->name;
        $newuser->email = $request->email;
        $newuser->address = $request->address;
        // $newuser->contactnumber=$request->contact->contactnumber;
        $newuser->contactnumber = $request->contactnumber;
        $newuser->profileimage = $request->profileimage;
        $newuser->save();
        return redirect('/retrive');
    }

    //retriving data
    public function retrivedata()
    {
        $result = register::get();
        return view('retrive', ['result' => $result]);
    }

    //get the details for edit
    public function edit($id)
    {
        $user = register::find($id);
        return view('update', compact('user'));
    }

    //update the edited details
    public function update1(Request $request, $id)
    {
        $user = register::find($id);

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->contactnumber = $request->contactnumber;
            $user->save();
            return redirect("/retrive?message=updated");
        } else {
            return redirect("/retrive?message=user-notfound");
        }
    }

    //delete a particular user
    public function delete($id)
    {
        $user = register::find($id);
        $user->delete();
        return redirect("/retrive");
    }

    //delete the multiple user
    public function mulSelect(Request $request)
    {
        $selectedItems = $request->selecteditems;
        register::whereIn('id',($selectedItems))->delete();
        return redirect("/retrive");
    }
}
