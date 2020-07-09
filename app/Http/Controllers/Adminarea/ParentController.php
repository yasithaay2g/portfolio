<?php

namespace App\Http\Controllers\Adminarea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

}