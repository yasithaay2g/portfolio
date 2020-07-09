<?php

/**
* Author: Spera Labs/(+94)112 144 533
* Email: hello@speralabs.com
* File Name: CampaignFacade.php
* Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
*/

namespace domain\Facade;


use Illuminate\Support\Facades\Facade;

/**
* Class CategoryFacade
* @package domain\Facade
*/
class PortfolioFacade extends Facade
{

    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor()
    {
        return 'domain\portfolio\PortfolioService';
    }
}