<?php

namespace App\Http\Controllers\Adminarea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    public function AdminareaIndex(){

        return view('Adminarea.Pages.adminHome');
    }
}