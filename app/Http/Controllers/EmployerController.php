<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function show(){
        return User::all();
    }

}
