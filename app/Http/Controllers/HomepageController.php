<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facade\PortfolioFacade;

class HomepageController extends Controller{



    public function prohome()
    {


        $homepro = PortfolioFacade::viewhome();

        return view('welcome', ['home' => $homepro]);
    }
}
