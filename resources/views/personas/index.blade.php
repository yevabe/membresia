@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<div class="container">
  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  @if (Session::has('error'))
    <div class="alert alert-warning">{{ Session::get('error') }}</div>
  @endif
<table id="personas" class="display responsive nowrap" style="width:100%">
  <caption><strong><a class="btn btn-primary" href="/home" role="button">Agregar uno nuevo</a>
</caption>
  <thead>
    <tr>
      <th scope="col">NOMBRES</th>
      <th scope="col">APELLIDOS</th>
      <th scope="col">DIRECCION </th>
      <th scope="col">BARRIO</th>
      <th scope="col">CIUDAD</th>
      <th scope="col">TELÉFONO FIJO</th>
      <th scope="col">CELULAR</th>
      <th scope="col">CORREO</th>
      <th scope="col">PROFESIÓN</th>
      <th scope="col">FECHA NACIMIENTO</th>
      <th scope="col">ESTADO</th>
      <th scope="col">USUARIO</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    @foreach($personas as $persona)
    <tr>
        <td>{{$persona->nombres}}
          @if(@$persona['foto']!="")
            <br/><a href="/storage/{{$persona['foto']}}" target="_blank">Ver foto actual</a>
          @endif
        </td>
        <td>{{$persona->apellidos}}</td>
        <td>{{$persona->direccion}}</td>
        <td>{{$persona->barrio}}</td>
        <td>{{$persona->ciudad}}</td>
        <td>{{$persona->tel_casa}}</td>
        <td>{{$persona->celular}}</td>
        <td>{{$persona->correo}}</td>
        <td>{{$persona->profesion}}</td>
        <td>{{$persona->fecha_nacimiento}}</td>
        <td>{{$persona->estado}}</td>
        <td>@if($persona->user){{$persona->user->name}}@endif</td>
        <td>
          @if(@$user->id==@$persona->user_id || $user->admin==1)
            <a href="/personas/edit/{{$persona->id}}" class="btn btn-success">Editar</a>
            @if($persona->estado=="Activo")
              <a href="/personas/desactivar/{{$persona->id}}" class="btn btn-secondary">Desactivar</a>
            @else
              <a href="/personas/activar/{{$persona->id}}" class="btn btn-info">Activar</a>
            @endif
          @endif
        </td>

    </tr>
    @endforeach
  </tbody>
</table>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function() {
    $('#personas').DataTable( {
      responsive: true,
      paging: false,
      searching:false,
      columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 3, targets: 0 },
        { responsivePriority: 2, targets: 12 }
      ],
      info:false,
      @if(@$user->admin==1)
      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      @endif
      "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
      }
    } );
} );
</script>
@endsection
