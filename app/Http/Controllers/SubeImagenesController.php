<?php

namespace App\Http\Controllers;

use App\Models\EvidenciaCaseta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use File;

class SubeImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function subeCaseta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'viaje' =>  'required',
            'caseta' => 'required',

        ]);
        if ($validator->fails()) {

            $response = [
                'Error' => $validator->messages()->first()
            ];
            return response($response, 500);
        }

        if($request['image']){

      
        $uploadFolder = 'casetas';
        $image = $request->file('image');
        $image_uploaded_path = $image->store($uploadFolder, 'public');
        
        $url_foto = $image_uploaded_path;
        $base =  basename($image_uploaded_path);     

        }

        $caseta = EvidenciaCaseta::where('viaje_id',$request['viaje'])->where('numero_interno',$request['caseta'])->first();

        if(!$caseta){
            $caseta = new EvidenciaCaseta();
            $caseta->viaje_id = $request['viaje'];
            $caseta->numero_interno = $request['caseta'];
        }
        $caseta->monto = $request['monto'] ?? '';

        if(!$request['image']) { 
            $response = [ "Estado" => "Registro actualizado" ]; 
        } else {
            if(File::exists(public_path("storage/".$caseta->foto_url))){
                File::delete(public_path("storage/".$caseta->foto_url));
            }
           
            $caseta->foto_url = $url_foto ;
            $response = [
                "image_name" => $base,
                "image_url" => $url_foto,
                "mime" => $image->getClientMimeType()
            ];
        }
        $caseta->observaciones = $request['observaciones'] ?? '';
        $caseta->lugar = $request['lugar'] ?? '';
        $caseta->save();


        return response($response, 200);
    }

    public function subeRestaurante(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'viaje' =>  'required',

        ]);
        if ($validator->fails()) {

            $response = [
                'Error' => $validator->messages()->first()
            ];
            return response($response, 500);
        }
        $uploadFolder = 'casetas';
        $image = $request->file('image');
        $image_uploaded_path = $image->store($uploadFolder, 'public');
        $

        $response = [
            "image_name" => basename($image_uploaded_path),
            "image_url" => Storage::disk('public')->url($image_uploaded_path),
            "mime" => $image->getClientMimeType()
        ];


        return response($response, 200);
    }

}
