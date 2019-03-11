@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  @if(isset($persona))
                    Editar a {{ $persona['nombres'] }}
                  @else
                    {{ __('Registrar una nueva persona') }}
                  @endif

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save_personas') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ @$persona['nombres'] }}" required autofocus>

                                @if ($errors->has('nombres'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ @$persona['apellidos'] }}" required autofocus>

                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ @$persona['direccion'] }}" autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barrio" class="col-md-4 col-form-label text-md-right">{{ __('Barrio') }}</label>

                            <div class="col-md-6">
                                <input id="barrio" type="text" class="form-control{{ $errors->has('barrio') ? ' is-invalid' : '' }}" name="barrio" value="{{ @$persona['barrio'] }}" autofocus>

                                @if ($errors->has('barrio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('barrio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <input id="ciudad" type="text" class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" name="ciudad" value="{{ @$persona['ciudad'] }}" autofocus>

                                @if ($errors->has('ciudad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel_casa" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono fijo') }}</label>

                            <div class="col-md-6">
                                <input id="tel_casa" type="text" class="form-control{{ $errors->has('tel_casa') ? ' is-invalid' : '' }}" name="tel_casa" value="{{ @$persona['tel_casa'] }}" autofocus>

                                @if ($errors->has('tel_casa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel_casa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ @$persona['celular'] }}" autofocus>

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}" name="correo" value="{{ @$persona['correo'] }}" >

                                @if ($errors->has('correo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <div class='input-group date' id='datetimepicker1'>
                                      <input type='text' name="fecha_nacimiento" class="form-control" value="{{@$persona['fecha_nacimiento']}}" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profesion" class="col-md-4 col-form-label text-md-right">{{ __('Profesión') }}</label>

                            <div class="col-md-6">
                                <input id="profesion" type="text" class="form-control{{ $errors->has('profesion') ? ' is-invalid' : '' }}" name="profesion" value="{{ @$persona['profesion'] }}" autofocus>

                                @if ($errors->has('profesion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profesion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fotografía') }}
                            @if(@$persona['foto']!="")
                              <br/><a href="/storage/{{$persona['foto']}}" target="_blank">Ver foto actual</a>
                            @endif
                              <br/>

                            </label>

                            <div class="col-md-6">
                              <input type='file' name="foto" class="form-control"/>
                            </div>
                        </div>
                        @if(isset($persona))
                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Activo') }}</label>

                            <div class="col-md-6">
                                <select name="estado" class="form-control">
                                  @if(!isset($persona))
                                    <option selected>Activo</option>
                                    <option>Inactivo</option>
                                  @else
                                  <option @if($persona['estado']=='Activo') selected @endif)>Activo</option>
                                  <option @if($persona['estado']=='Inactivo') selected @endif)>Inactivo</option>
                                  @endif
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                        @if(isset($persona))
                            <input type="hidden" name="id" value="{{ @$persona['id'] }}" required>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" src="/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-datepicker.es.min.js"></script>
<link id="bs-css" href="/css/bootstrap-datepicker.min.css" rel="stylesheet">

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1 input').datepicker({
        format: "yyyy-mm-dd",
        language: 'es'
    });
    });
</script>
@endsection
