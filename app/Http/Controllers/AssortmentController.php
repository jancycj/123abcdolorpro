<?php

namespace App\Http\Controllers;

use App\Assortment;
use App\AssortmentShade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class AssortmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = [];
        $categories = [];
        if($request->has('assortment_no')){
            return Assortment::with('assortment_shades')->where('assortment_no',$request->assortment_no)->first();
        }
        return view('v1.colorpro.company.assortment',compact('units','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $assortment = $request->assortment;
            $shop = json_decode($assortment);
            if(isset($shop->id)){
                $assortment =  Assortment::where('id',$shop->id)->first();
                $assortment->customer_id = isset($shop->customer_id)? $shop->customer_id : ''; 
                $assortment->article_no = isset($shop->article_no)? $shop->article_no : ''; 
                $assortment->assortment_no = isset($shop->assortment_no)? $shop->assortment_no : ''; 
                $assortment->assortment_name = isset($shop->assortment_name)? $shop->assortment_name : ''; 
                $assortment->no_of_shades = isset($shop->no_of_shades)? $shop->no_of_shades : ''; 
                $assortment->no_of_box_per_box = isset($shop->no_of_box_per_box)? $shop->no_of_box_per_box : '';
                $image_url = ''; 
                if($request->has('file')){
                    $file = $request->file('file');
                    $file_name = 'assortments'.'/'.time().'file.'.$file->getClientOriginalExtension();
                    Storage::disk('s3')->put($file_name, file_get_contents($request->file('file')), 'public');
                    $image_url = Storage::disk('s3')->url($file_name);
                }
                $assortment->image_url = $image_url; 
                $assortment->save(); 
                $assortment_id = $assortment->id;
                if(isset($shop->assortment_shades)){
                    AssortmentShade::where('assortment_id',$assortment_id)->delete();
                    $shades = $shop->assortment_shades;
                    foreach($shades as $shade){
                        $assortment_shade = new AssortmentShade();
                        $assortment_shade->shade_id = $shade->shade_id;
                        $assortment_shade->assortment_id = $assortment_id;
                        $assortment_shade->save();
                    }
                    
                }

                return response(['message' => 'successfully saved..!'],200);
            } else{
                $assortment = new Assortment();
                $assortment->customer_id = isset($shop->customer_id)? $shop->customer_id : ''; 
                $assortment->article_no = isset($shop->article_no)? $shop->article_no : ''; 
                $assortment->assortment_no = isset($shop->assortment_no)? $shop->assortment_no : ''; 
                $assortment->assortment_name = isset($shop->assortment_name)? $shop->assortment_name : ''; 
                $assortment->no_of_shades = isset($shop->no_of_shades)? $shop->no_of_shades : ''; 
                $assortment->no_of_box_per_box = isset($shop->no_of_box_per_box)? $shop->no_of_box_per_box : '';
                $image_url = ''; 
                if($request->has('file')){
                    $file = $request->file('file');
                    $file_name = 'assortments'.'/'.time().'file.'.$file->getClientOriginalExtension();
                    Storage::disk('s3')->put($file_name, file_get_contents($request->file('file')), 'public');
                    $image_url = Storage::disk('s3')->url($file_name);
                }
                $assortment->image_url = $image_url; 
                $assortment->save(); 
                $assortment_id = $assortment->id;
                if(isset($shop->assortment_shades)){
                    $shades = $shop->assortment_shades;
                    foreach($shades as $shade){
                        $assortment_shade = new AssortmentShade();
                        $assortment_shade->shade_id = $shade->shade_id;
                        $assortment_shade->assortment_id = $assortment_id;
                        $assortment_shade->save();
                    }
                    
                }

                return response(['message' => 'successfully saved..!'],200);
            }

        } catch(Throwable $e){
            return response(['message' => $e],400);

        }

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assortment  $assortment
     * @return \Illuminate\Http\Response
     */
    public function show(Assortment $assortment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assortment  $assortment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assortment $assortment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assortment  $assortment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assortment $assortment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assortment  $assortment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assortment $assortment)
    {
        //
    }
}
