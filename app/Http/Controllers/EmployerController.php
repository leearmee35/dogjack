<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class EmployerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function getUser($id){

        $user = User::find($id);

        return response()->json(compact('user'));
    }

    public function storeProfile(Request $request){

        $name = $request->input('name');
        $imagepath = $name;
        $longtitude = $request->input('longtitude');
        $latitude = $request->input('latitude');
        $aboutus = $request->input('aboutus');
        $user = User::find($request->input('id'));

        if(!$request->input('name')){
            $name = "kkk";
        }

        if(Input::hasFile('image')){


            $img = Image::make(Input::file('image'))->resize(300, 400)->save('images/abc.jpg');

        }



        $user->name = $name;
        $user->imagepath = $imagepath;
        $user->longtitude = $longtitude;
        $user->latitude = $latitude;
        $user->aboutus = $aboutus;
        $user->save();

        return response()->json(compact('user'));
    }

}
