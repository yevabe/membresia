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
      if($user->admin==1){
        $personas = Persona::with('user')->get();
      }else{
        $personas = Persona::with('user')->where("user_id",Auth::id())->get();
      }

      return view('personas/index', ['personas' => $personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $customer = new Persona;
      $customer->nombres = $request->nombres;
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

      $request->session()->flash('message', 'La persona ha sido agregada');


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
        //
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
