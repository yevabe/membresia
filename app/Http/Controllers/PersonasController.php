<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\User;

use Auth;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::where("id",Auth::id())->first();
      $personas = Persona::with('user')->get();
      return view('personas/index', ['personas' => $personas, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('personas/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(!isset($request->id)){
        $customer_exist = Persona::where('nombres', $request->nombres)->where('apellidos', $request->apellidos)->first();
        if(isset($customer_exist->id)){
          $request->session()->flash('error', 'La persona ya existe');
          return redirect('/personas');
        }
      }

      if($request->id !="" ){
        $user = User::where("id",Auth::id())->first();
        if($user->admin==1){
          $customer = Persona::find($request->id);
        }else{
          $customer = Persona::where('user_id', Auth::id())->find($request->id);
        }
        $message = 'La persona ha sido modificada';
        if(!isset($customer)){
          return redirect('/personas');
        }
      }else{
          $customer = new Persona;
          $message = 'La persona ha sido agregada';
      }
      $customer->nombres = $request->nombres;
      if(isset($request->estado)){
          $customer->estado = $request->estado;
      }
      if ($request->hasFile('foto')) {
        $storagePath = $request->foto->store('imagenes');
        if(basename($storagePath)!=""){
            $customer->foto = basename($storagePath);
        }
      }
      $customer->apellidos = $request->apellidos;
      $customer->direccion = $request->direccion;
      $customer->barrio = $request->barrio;
      $customer->profesion = $request->profesion;
      $customer->fecha_nacimiento = $request->fecha_nacimiento;
      $customer->ciudad = $request->ciudad;
      $customer->tel_casa = $request->tel_casa;
      $customer->celular = $request->celular;
      $customer->correo = $request->correo;
      $customer->user_id = Auth::id();
      $customer->save();

      $request->session()->flash('message', $message);


      return redirect('/personas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::where("id",Auth::id())->first();

      if($user->admin==1){
        $persona = Persona::with('user')->where("id",$id)->first();
      }else{
        $persona = Persona::with('user')->where("id",$id)->where('user_id', $user->id)->first();
      }
      if(isset($persona)){
        return view('personas/add', ['persona' => $persona]);
      }
      return redirect('/personas');
    }
    public function activar($id)
    {

      $user = User::where("id",Auth::id())->first();

      if($user->admin==1){
        $persona = Persona::find($id);
      }else{
        $persona = Persona::where('user_id', $user->id)->find($id)->where("id",$id);
      }
      if(isset($persona)){
        $persona->estado = "Activo";
        $persona->save();
      }
      return redirect('/personas');
    }
    public function inactivar($id)
    {

    $user = User::where("id",Auth::id())->first();

    if($user->admin==1){
      $persona = Persona::find($id);
    }else{
      $persona = Persona::where('user_id', $user->id)->find($id)->where("id",$id);
    }
    if(isset($persona)){
      $persona->estado = "Inactivo";
      $persona->save();
    }
      return redirect('/personas');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
