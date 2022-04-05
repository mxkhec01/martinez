<?php

namespace App\Http\Controllers;

use App\Models\EvidenciaCaseta;
use App\Models\EvidenciaCombustible;
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

    public function subeGasolina(Request $request){

        $validator = Validator::make($request->all(), [
            'viaje' =>  'required',
            'tipo' => 'required',
        ]);

        if ($validator->fails()) {

            $response = [
                'Error' => $validator->messages()->first()
            ];
            return response($response, 500);
        }

        //Se busca la caseta para ver si es inserción o actualización
        $registro = EvidenciaCombustible::where('viaje_id',$request['viaje'])->where('numero_interno',$request['tipo'])->first();

        //Se crea la nueva instancia en caso de que no exista
        if(!$registro){
            $registro = new EvidenciaCombustible();
            $registro->viaje_id = $request['viaje'];
            $registro->numero_interno = $request['tipo'];
        }



        if($request->has('image1')){
                    $response_1="";
                   $name_1 = '/combustibles/'.$request['viaje'].'_'.$request['tipo'].".1.".Str::random(15)."."."png";
                   $response_1 = Storage::disk('public')->put($name_1, base64_decode($request->input('image1')),'public');
        }

       if($request->has('image2')){
                    $response_2="";
                   $name_2 = '/combustibles/'.$request['viaje'].'_'.$request['tipo'].".2.".Str::random(15)."."."png";
                   $response_2 = Storage::disk('public')->put($name_2, base64_decode($request->input('image2')),'public');
        }
        if($request->has('image3')){
                    $response_3="";
                   $name_3 = '/combustibles/'.$request['viaje'].'_'.$request['tipo'].".3.".Str::random(15)."."."png";
                   $response_3 = Storage::disk('public')->put($name_3, base64_decode($request->input('image3')),'public');
        }
        if($request->has('image4')){
                    $response_4="";
                   $name_4 = '/combustibles/'.$request['viaje'].'_'.$request['tipo'].".4.".Str::random(15)."."."png";
                   $response_4 = Storage::disk('public')->put($name_4, base64_decode($request->input('image4')),'public');
        }
        if($request->has('image5')){
                    $response_5="";
                   $name_5 = '/combustibles/'.$request['viaje'].'_'.$request['tipo'].".5.".Str::random(15)."."."png";
                   $response_5 = Storage::disk('public')->put($name_5, base64_decode($request->input('image5')),'public');
        }


        for ($i = 1; $i < 6; $i++) {
            if (File::exists(public_path("storage/" . $registro["foto" . $i . "_url"]))) {
                File::delete(public_path("storage/" . $registro["foto" . $i . "_url"]));
            }
        }

        $registro->monto = $request['monto'] ?? '';
        $registro->km = $request['km'] ?? '';
        $registro->litros = $request['litros'] ?? '';
        $registro->convenio = $request['convenio'] ?? '';

        $registro->foto1_url = $name_1 ?? '' ;
        $registro->foto2_url = $name_2 ?? '' ;
        $registro->foto3_url = $name_3 ?? '' ;
        $registro->foto4_url = $name_4 ?? '' ;
        $registro->foto5_url = $name_5 ?? '' ;

        $registro->save();



        return response()->json([ 'message'=>'Archivo Creado',
            'data'=> [
                'file1'=>$name_1 ?? '',
                'file2'=>$name_2 ?? '',
                'file3'=>$name_3 ?? '',
                'file4'=>$name_4 ?? '',
                'file5'=>$name_5 ?? ''
                 ]
        ]);

    }

    public function subeOtros(Request $request){

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
