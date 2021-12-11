@extends('layouts.app')

@section('style')
<style>
   body {
        width: 100%;
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* background-size: 100% 100%; */
        /* background: rgb(2,84,65); */
        background-image: url('../public/img/back.jpg') ;
        background-size: cover;
        /* background: linear-gradient(0deg, rgba(2,84,65,1) 0%, rgba(253,187,45,1) 100%) fixed; */
  }
 #contenedor_seat{
    margin: 10px;
        padding: 10px;
    /* overflow-x: visible;
    overflow-y: auto;
    -webkit-overflow-scrolling: auto; */
  }
  /* td{
    background-color: blue;
  } */

 /* Customize the label (the container) */
.cont {
  display: block;
  position: relative;
  padding-left: 17px;
  margin-bottom: 6px;
  cursor: pointer;
  font-size: 12px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox  pass 020819*/
 input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 12px;
  width: 12px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
input[type="checkbox"]:hover ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.cont input:checked ~ .checkmark {
  background-color: #025441;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.cont input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.cont .checkmark:after {
  left: 4px;
  top: 0px;
  width: 4px;
  height: 9px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.cont {
  display: block;
  position: relative;
  padding-left: 17px;
  margin-bottom: 6px;
  cursor: pointer;
  font-size: 11px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}


</style>  
@endsection
@section('contenido')

<div class=" shadow-lg border-0 rounded-lg  bg-light m-1  " >
  <h1 class="m-2">Asignar asientos</h1>
        <form action="{{ route('lugaresRegistro') }}" method="post">
            @csrf
            <div class="m-1">
              <label for="">Nombre del alumno</label>
              <input class="form-control" type="text" name="alumnoName" id="alumnoName" placeholder="Nombre del alumno" required>            
            </div>
            <div style="" id="contenedor_seat">
              <table class="table table-striped w-100 ml-1 table-responsive" id="tabla">
                <tbody>
                  
                  @for ($i = 0; $i < count($lugares); $i++)
                  <tr>
                    @for ($j = 0; $j < $lugares[$i]->limit+2; $j++)
                    @if ($j === 0 || $j === $lugares[$i]->limit+1)
                    <td >
                      <label class="cont">{{$lugares[$i]->row_name}}          
                      </label>
                  </td>    
                    @else
                    @if(in_array($lugares[$i]->row_name.'-'.$j,$no_asig))
                    <td id="{{$lugares[$i]->row_name.'-'.$j}}" style="background-color: red; color:white;">
                      <label class="cont" >{{$j}}
                        {{-- <input type="checkbox" name="lugares[]" value="{{$lugares[$i]->row_name.'-'.$j}}" id="{{$lugares[$i]->row_name.'-'.$j}}"  disabled>
                        <span class="checkmark"></span> --}}
                      </label>
                  </td> 
                  @elseif(in_array($lugares[$i]->row_name.'-'.$j,$ocupados))
                  <td id="{{$lugares[$i]->row_name.'-'.$j}}" style="background-color: #025441; color:white;">
                    <label class="cont">{{$j}}
                      {{-- <input type="checkbox" name="lugares[]" value="{{$lugares[$i]->row_name.'-'.$j}}" id="{{$lugares[$i]->row_name.'-'.$j}}" checked='checked' disabled>
                      <span class="checkmark"></span> --}}
                    </label>
                </td> 
                    @else
                    <td id="{{$lugares[$i]->row_name.'-'.$j}}">
                      <label class="cont">{{$j}}
                        <input type="checkbox" name="lugares[]" value="{{$lugares[$i]->row_name.'-'.$j}}" id="{{$lugares[$i]->row_name.'-'.$j}}">
                        <span class="checkmark"></span>
                      </label>
                  </td> 
                        
                    @endif
                   
                    @endif
                    
                    @endfor
                                    
                  @endfor
                  </tr>
                    
                        {{-- @foreach ($numSeat as $item)
                        <tr>
                        <td scope="row">{{$lugares->row_name}}</td>
                        <td></td>
                        <td>
                            
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="lugares[]" value="" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                              </div>
                        </td>

                            
                        @endforeach --}}
                </tbody>
            </table>
            </div>
            <div>
              <label style="margin-left: 10%;"><strong> Disponibles:{{$count-($noAsigcount+$Asigcount)}}</strong></label>
              <label style="margin-left: 50%;"><strong>Asignados:{{$Asigcount}}</strong></label>

            </div>
            <div class="text-center">
              <input class="btn btn-primary mb-5"   type="submit" value="Guardar">
            </div>
            
        </form>
</div>
@endsection