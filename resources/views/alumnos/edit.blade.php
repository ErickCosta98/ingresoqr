@extends('layouts.app')

@section('nav')

@endsection

@section('contenido')
<br>
<br>
<div class="container-fluid " >
  <div class="col-sm-6 mx-auto">
<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h1>Editar alumno</h1>
      <form action="{{ route('alumnoUpdate',$alumno ) }}" method="post">
        @csrf
        @method('put')
        <label for="">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre" value="{{$alumno->nombre}}">
        <label for="">Apellido paterno</label>
        <input class="form-control"type="text" name="apelPat" id="apelPat" value="{{$alumno->apelPat}}">
        <label for="">Apellido materno</label>
        <input class="form-control"type="text" name="apelMat" id="apelMat" value="{{$alumno->apelMat}}">
        <label for="auto" class="col-sm-2 control-label">¿Tiene auto?</label>
        <div class="col-sm-10">
        <label class="radio-inline">
        <input type="radio" name="auto" id="auto" value="1" <?php if ($alumno->automovil == 1) echo 'checked'?>>SI
        </label>
        <label class="radio-inline">
        <input type="radio" name="auto" id="auto" value="0" <?php if ($alumno->automovil == 0) echo 'checked'?>>NO
        </label>
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
        <div id="qrcode"></div>
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