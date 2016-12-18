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

        if(Input::hasFile('image')){


            $img = Image::make(Input::file('image'))->resize(300, 400)->save('images/abc.jpg');

            $name = $request->input('name');

            return $name;
        }

        return "No";
    }

}
