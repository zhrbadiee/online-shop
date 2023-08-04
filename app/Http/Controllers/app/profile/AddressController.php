<?php

namespace App\Http\Controllers\app\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return view('app.profile.my-addresses');
    }
    
}
