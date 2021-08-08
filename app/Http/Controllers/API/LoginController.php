<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth.basic.once');
    }
    public function login()
    {
        $Accesstoken = Auth::user()->createToken('Access Token')->accessToken;

        return Response(['User' => new UserResource(Auth::user()), 'Access Token' => $Accesstoken]);
    }
}
