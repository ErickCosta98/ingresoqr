@extends('layouts.app')

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
#letras{
  width: 100%;

}
.imgcont{
  margin-bottom: 0;
}

    </style>    


@section('contenido')
{{-- <img src="{{ asset('img/back.jpg') }}" alt=""> --}}
    {{-- <h1>Matricula</h1> --}}
        <form action="{{ route('verifica') }}" method="POST">
            @csrf
            <input type="text" name="data" id="data" autocomplete="off" required autofocus>
        </form>
   <div class="imgcont"><img src="{{ asset('img/letras.png') }}" alt="" id="letras"></div>

        <div class="shadow-lg border-0 rounded-lg m-1 "  id="cont">
                     
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
                              <td id="{{$lugares[$i]->row_name.'-'.$j}}" style="background-color:rgb(11,52,56) ; color: white;">
                                <label class="cont">{{$j}}
                                </label>
                            </td> 
                            @elseif(in_array($lugares[$i]->row_name.'-'.$j,$ocupados))
                            <td id="{{$lugares[$i]->row_name.'-'.$j}}" style="background-color: rgb(17, 68, 63); color:white;">
                              <label class="cont" >{{$j}}
                              </label>
                          </td> 
                              @else
                              <td id="{{$lugares[$i]->row_name.'-'.$j}}">
                                <label class="cont">{{$j}}
                                  
                                </label>
                            </td> 
                                  
                              @endif
                             
                              @endif
                              
                              @endfor
                                              
                            @endfor
                            </tr>
                              
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