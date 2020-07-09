<?php

namespace App\Http\Controllers\Adminarea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use domain\Facade\PortfolioFacade;
use App\Http\Requests\PortRequest;

class PortfolioController extends ParentController
{
    /**
     * PortIndex
     *
     * @return void
     */
    public function PortIndex()
    {


        return view('Adminarea.Pages.Portfolio.add');
    }



    /**
     * PortStore
     *
     * @param  mixed $request
     * @return void
     */
    public function PortStore(PortRequest $request)

    {

        PortfolioFacade::Store($request);


        return redirect('/admin/showPort')->with('success', ' Create successfully');
    }

    /**
     * show
     *
     * @return void
     */
    public function PortShow()
    {
        $pack =  PortfolioFacade::Show();

        return view('Adminarea.Pages.Portfolio.show', compact('pack'));
    }




    /**
     * PortEdit
     *
     * @param  mixed $id
     * @return void
     */
    public function PortEdit($id)
    {
        $packedi =  PortfolioFacade::Edit($id);
        return view('Adminarea.Pages.Portfolio.edit')->with('pro', $packedi);
    }



    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function PortUpdate(Request $request, $id)
    {

        PortfolioFacade::Update($request, $id);
        return redirect('/admin/showPort')->with('success', ' Update successfully');
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function PortDelete($id)
    {
        PortfolioFacade::Delete($id);

        return redirect('/admin/showPort')->with('success', ' Deleted successfully');
    }


    /**
     * changePortStatus
     *
     * @param  mixed $request
     * @return void
     */
    public function changePortStatus(Request $request)
    {

        PortfolioFacade::Status($request);

        return response()->json(['success' => 'Status change successfully.']);
    }




}
