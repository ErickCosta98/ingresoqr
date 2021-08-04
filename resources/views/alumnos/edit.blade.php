@extends('layouts.app')


@section('contenido')
<br>
<br>
<div class="container-fluid " >
  <div class="col-sm-6 mx-auto">
<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h1>Editar alumno</h1>
      <form action="{{ route('alumnoUpdate', $alumno ) }}" method="post">
        @csrf
        @method('put')
        <label for="">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre" value="{{$alumno->nombre}}">
        <label for="">Apellido paterno</label>
        <input class="form-control"type="text" name="apelPat" id="apelPat" value="{{$alumno->apelPat}}">
        <label for="">Apellido materno</label>
        <input class="form-control"type="text" name="apelMat" id="apelMat" value="{{$alumno->apelMat}}">
        <div class="col-sm-10">
          <label for="">¿Tiene auto?</label>
          <label class="radio-inline">
        <input type="radio" name="auto" id="auto" value="1" <?php if ($alumno->automovil == 1) echo 'checked'?>>SI
        </label>
        <label class="radio-inline">
        <input type="radio" name="auto" id="auto" value="0" <?php if ($alumno->automovil == 0) echo 'checked'?>>NO
        </label>
        </div>
        <div class="form-group">
          <label for="">Grupos</label>
          <select class="form-control" name="grupo" id="grupo">
              @foreach (DB::select('select * from grupos') as $item)
                  <option value="{{ $item->id }}" <?php if($item->id == $gid)echo 'selected';?>>{{ $item->nombreGrupo }}</option>
              @endforeach
          </select>
      </div>
        <input class="btn btn-primary" type="submit" value="Guardar">
    </form>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h1>Codigo qr</h1>
      <div>
        <input id="text" type="hidden" value="{{$alumno->matricula}}" style="width:80%" /><br />
        <div id="qrcode">
          
        </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection

@section('js')

<script>
    $(document).ready(function() {
        var qrcode = new QRCode("qrcode");

function makeCode () {    
    var elText = document.getElementById("text");
  
  if (!elText.value) {
    alert("Input a text");
    elText.focus();
    return;
  }
  
  qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
  on("blur", function () {
    makeCode();
  }).
  on("keydown", function (e) {
    if (e.keyCode == 13) {
      makeCode();
    }
  });
    });
    

</script>
    
@endsection