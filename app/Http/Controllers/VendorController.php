<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use App\Advertisement;

class VendorController extends Controller
{
    public function index(){
        $advertisements = Advertisement::orderBy('id', 'DESC')->where('user_id', Auth::id())->get();
        return view('vendor.home')->with('advertisements', $advertisements);
    }

    public function createVendor(){
        return view('vendor.create');
    }

    public function storeVendor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|min:2|max:255',
            'email' => 'email|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }

        $user = new User([
            'name' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => 2,
        ]);
        $user->save();

        if($user){
            return redirect()->route('admin')
                ->with('success','Vendor has been created!');
        }
        else{
            return redirect()->route('home')
                ->with('danger','Soryy, Vendor doesn`t created!');
        }
    }

    public function deleteVendor($id){
        dd($id);
    }
}
