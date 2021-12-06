@extends('layouts.app')

<style>

    
    /* .centrado {
        margin: 0;
        padding: 0;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    } */
    input[type="text"]{
         position: absolute;
         opacity: 0;
         height: 0;
         width: 0;
    }
    #contenedor_seat{
        margin: 10px;
        padding: 10px;
        margin-top: 100px;
    /* overflow-x: visible;
    overflow-y: auto;
    -webkit-overflow-scrolling: auto; */
  }
  #tabla {
  border-collapse: collapse;
  /* border-radius: 1em; */
  overflow: hidden; 
  }

/* #tabla td, #tabla th {
  border: 1px solid #ddd;
  padding: 5px;
}

#tabla tr:nth-child(even){background-color: #f2f2f2;}

#tabla tr:hover {background-color: #ddd;} */

/* #tabla th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
} */
#cont{
    /* width: 100%; */
    background-color: rgb(233, 233, 233);
}
::-webkit-scrollbar {
    display: none;
}
    </style>    


@section('contenido')
    {{-- <h1>Matricula</h1> --}}
   
        <form action="{{ route('verifica') }}" method="get">
            {{-- @csrf --}}
            <input type="text" name="data" id="data" autocomplete="off" required autofocus>
        </form>
        <div class="shadow-lg border-0 rounded-lg  m-1 "  id="cont">
                      {{-- <div>
                        <label for="">Nombre del alumno</label>
                        <input class="form-control" type="text" name="alumnoName" id="alumnoName" placeholder="Nombre del alumno" required>            
                      </div> --}}
                      {{-- <div style="margin-top: 100px;">

                      </div> --}}
                      <div  id="contenedor_seat">
                        <table class="table table-striped w-100 ml-1" id="tabla">
                          <tbody>
                            
                            @for ($i = 0; $i < count($lugares); $i++)
                            <tr>
                              @for ($j = 0; $j < $lugares[$i]->limit+2; $j++)
                              @if ($j === 0 || $j === $lugares[$i]->limit+1)
                              <td style=" border: 1px solid rgb(175, 175, 175)">
                                <label class="cont">{{$lugares[$i]->row_name}}          
                                </label>
                            </td>    
                              @else
                              @if(in_array($lugares[$i]->row_name.'-'.$j,$no_asig))
                              <td id="{{$lugares[$i]->row_name.'-'.$j}}" style="background-color: rgb(224, 56, 56); color: white;">
                                <label class="cont">{{$j}}
                                  {{-- <input type="checkbox" name="lugares[]" value="{{$lugares[$i]->row_name.'-'.$j}}" id="{{$lugares[$i]->row_name.'-'.$j}}"  disabled>
                                  <span class="checkmark"></span> --}}
                                </label>
                            </td> 
                            @elseif(in_array($lugares[$i]->row_name.'-'.$j,$ocupados))
                            <td id="{{$lugares[$i]->row_name.'-'.$j}}" style="background-color: #025441; color:white;">
                              <label class="cont" >{{$j}}
                                {{-- <input type="checkbox" name="lugares[]" value="{{$lugares[$i]->row_name.'-'.$j}}" id="{{$lugares[$i]->row_name.'-'.$j}}" checked='checked' disabled>
                                <span class="checkmark" style="background-color: #025441 #00adfd;"></span> --}}
                              </label>
                          </td> 
                              @else
                              <td id="{{$lugares[$i]->row_name.'-'.$j}}">
                                <label class="cont">{{$j}}
                                  {{-- <input type="checkbox" name="lugares[]" value="{{$lugares[$i]->row_name.'-'.$j}}" id="{{$lugares[$i]->row_name.'-'.$j}}">
                                  <span class="checkmark"></span> --}}
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
          </div>

@endsection

@section('js')
<script>
    $(function(){
    
        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: '<strong>Error</strong>',
            showConfirmButton: false,
            timer: 2000
        }).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    location.reload()
  }
})
        @endif
        @if(Session::has('success'))
        Swal.fire({
        icon: 'success',
        title: '<strong>BIENVENIDO</strong>',
        html: '<h1>Asiento:{{ Session::get("success") }}<h1>',
        showConfirmButton: false,
        timer: 2000
    }).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    location.reload()
  }
})
    
    @endif
    });
    </script>
@endsection