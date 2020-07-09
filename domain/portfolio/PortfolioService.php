<?php

namespace domain\portfolio;

use App\GalleryImage;
use App\Image;
use App\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use infrastructure\Facades\ImagesFacade;

class PortfolioService
{
    protected $portfolio;
    protected $galleryImg;
    protected $Img;


    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->portfolio = new Portfolio();
        $this->galleryImg = new GalleryImage();
        $this->Img = new Image();
    }




    public function Store($request)
    {



        if ($request->has('thumb')) {
            $Thumb = ImagesFacade::up($request->file('thumb'), [2, 12, 9, 10, 13, 14]);
        }

        if ($request->has('banner')) {
            $banner = ImagesFacade::up($request->file('banner'), [2, 12, 9, 10, 13, 14]);
        }


        if ($request->has('multi')) {
            $multiple= ImagesFacade::up($request->file('multi'), [2, 12, 9, 10, 13, 14]);
        }

        $data = array();

           $data['Thumb_id']=$Thumb->id;
            $data['banner_id']=$banner->id;
            $data['title']=$request->title;
            $data['solution']= $request->solution;
            $data['impact']=$request->impact;
            $data['requirment']=$request->requirment;
            $data['description']=$request->description;

            $port=$this->portfolio->create($data);


            $this->galleryImg ->portfolio_id=$port->id;
            $this->galleryImg ->image_id = $multiple->id;

            $this->galleryImg->save();

            foreach ($request->file('multi') as $index => $item) {
            $path = $request->files[$index]->store('name');
        }

                    /*$input=$request->all();
        $multi=array();

        if($files=$request->file('multi')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('mult',$name);
                $multi[]=$name;
            }
        }/*




       /* $this->Img ->insert( [
            'name'=>  implode("|",$multi),


        ]);*/


    }

    public function Show()
    {

        return $this->portfolio->get();
    }

    public function Edit($id)
    {
        return  $this->portfolio->find($id);
    }


    public function Update(Request $request, $id)
    {


        $id=$request->id;
        $this->product = portfolio::find($id);

        if($request->has('thumb')){
            $Thumb=ImagesFacade::up($request->file('thumb'),[2,12,9,10,13,14]);
        }

        $this->product = portfolio::find($id);

        if($request->has('banner')){
            $banner=ImagesFacade::up($request->file('banner'),[2,12,9,10,13,14]);
        }



        $pro = $this->portfolio->find($id);

        $pro->Thumb_id = $Thumb->id;
        $pro->banner_id = $banner->id;


        $pro->title = $request->title;
        $pro->solution = $request->solution;
        $pro->impact = $request->impact;
        $pro->requirment  = $request->requirment;
        $pro->description  = $request->description;


        $pro->update();
    }


    public function Delete($id)
    {
        $this->portfolio->find($id)->delete();
    }

    public function Status($request)
    {
        $pro = $this->portfolio->find($request->id);
        $pro->status = $request->status;
        $pro->save();
    }



    public function viewhome()
    {

        return $this->portfolio->where('status', '=', '1')->get();
    }
}
