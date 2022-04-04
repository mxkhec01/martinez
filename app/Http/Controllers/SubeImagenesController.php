<?php

namespace App\Http\Controllers;

use App\Models\EvidenciaCaseta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use File;
use Str;

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
    public function destroy($id, $viaje)
    {
        $caseta= EvidenciaCaseta::where("viaje_id",$viaje)
                   ->where("numero_interno",$id)
                   ->first();
        if($caseta){
            $caseta->delete();
            $response = [
                'OK' => 'Registro eliminado'
            ];
            return response($response,200);
        }

        $response = [
            'Error' => 'No se encontró el registro'
        ];
        return response($response,200);

        
    }

    
    public function subeCaseta(Request $request){

        $validator = Validator::make($request->all(), [
            'viaje' =>  'required',
            'caseta' => 'required',
        ]);

        if ($validator->fails()) {

            $response = [
                'Error' => $validator->messages()->first()
            ];
            return response($response, 500);
        }

         //Se busca la caseta para ver si es inserción o actualización
         $caseta = EvidenciaCaseta::where('viaje_id',$request['viaje'])->where('numero_interno',$request['caseta'])->first();

         //Se crea la nueva instancia en caso de que no exista
         if(!$caseta){
             $caseta = new EvidenciaCaseta();
             $caseta->viaje_id = $request['viaje'];
             $caseta->numero_interno = $request['caseta'];
         }

         $response="";

        if ($request->hasFile('image')){
            $this->validate($request,[  'image' => 'required|file|image|mimes:jpeg,png,gif,svg' ]); 
            $name = $request->file('image');
            $response = Storage::disk('public')->put('casetas',$name);
        
            //return response()->json([ 'message'=>'File uploaded', 'data'=> ['file'=>$response] ]); 

        }else{

            $name = '/casetas/'.$request['viaje'].'_'.$request['caseta'].".".Str::random(15)."."."png"; 
            $response = Storage::disk('public')->put($name, base64_decode($request->input('image')),'public'); 
           // return response()->json([ 'message'=>'Archivo Creado', 'data'=> ['file'=>$response] ]); 

        }
        


        if(File::exists(public_path("storage/".$caseta->foto_url))){
            File::delete(public_path("storage/".$caseta->foto_url));
        }

        $caseta->monto = $request['monto'] ?? '';
        $caseta->foto_url = $name ;
        $caseta->observaciones = $request['observaciones'] ?? '';
        $caseta->lugar = $request['lugar'] ?? '';
        $caseta->save();



        return response()->json([ 'message'=>'Archivo Creado', 'data'=> ['file'=>$name] ]); 



    }


  

}
