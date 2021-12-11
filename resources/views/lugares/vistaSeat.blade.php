@extends('layouts.app')

<style>
    body {
        width: 100%;

        background-image: url('../public/img/back.jpg');
        background-size: cover;
    }

    input[type="text"] {
        position: absolute;
        opacity: 0;
        height: 0;
        width: 0;
    }

    #contenedor_seat {
        display: flex;
        padding: 10px;
        width: 100%;

    }

    #conte {
        background-color: rgb(233, 233, 233);
    }

    ::-webkit-scrollbar {
        display: none;
    }

    #letras {
        width: 100%;

    }

    .imgcont {
        margin-bottom: 0;
    }

    td {
        text-align: center;
        width: 50px;
        height: 43px;
    }

    .stri {
        background-color: #cfcfcf;
    }

</style>


@section('contenido')
    {{-- <img src="{{ asset('img/back.jpg') }}" alt=""> --}}
    {{-- <h1>Matricula</h1> --}}
    {{-- <form action="{{ route('verifica') }}" method="POST">
        @csrf
        <input type="text" name="data" id="data" autocomplete="off" required autofocus>
    </form> --}}
    <div class="imgcont"><img src="{{ asset('img/letras.png') }}" alt="" id="letras"></div>

    <div class="shadow-lg border-0 rounded-lg m-1 " id="conte">

        <div id="contenedor_seat">
            <table class="w-100 " id="tabla">
                <tbody>

                    @for ($i = 0; $i < count($lugares); $i++)
                        @if (($i + 1) % 2 != 0)

                            <tr class="stri">

                            @else
                            <tr>

                        @endif
                        @for ($j = 0; $j < $lugares[$i]->limit + 2; $j++)
                            @if ($j === 0 || $j === $lugares[$i]->limit + 1)
                                <td style=" border: 1px solid rgb(175, 175, 175)">
                                    <label class="cont">{{ $lugares[$i]->row_name }}
                                    </label>
                                </td>
                            @else
                                @if (in_array($lugares[$i]->row_name . '-' . $j, $no_asig))
                                    <td id="{{ $lugares[$i]->row_name . '-' . $j }}"
                                        style="background-color:rgb(63, 63, 63) ; color: white;">
                                        <label class="cont">{{ $j }}
                                        </label>
                                    </td>
                                @elseif(in_array($lugares[$i]->row_name.'-'.$j,$ocupados))
                                    <td id="{{ $lugares[$i]->row_name . '-' . $j }}"
                                        style="background-color: rgb(133, 178, 113); color:white;">
                                        <label class="cont">{{ $j }}
                                        </label>
                                    </td>
                                @else
                                    <td id="{{ $lugares[$i]->row_name . '-' . $j }}">
                                        <label class="cont">{{ $j }}

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
        $(function() {

            @if (Session::has('error'))
                Swal.fire({
                icon: 'error',
                title: '<strong>{{ Session::get('error') }}</strong>',
                showConfirmButton: false,
                timer: 3000
                }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                location.reload()
                }
                })
            @endif
            @if (Session::has('success'))
                Swal.fire({
                icon: 'success',
                title: '<strong>BIENVENIDO</strong>',
                html: '<h1>{{ Session::get('success') }}<h1>',
                        showConfirmButton: false,
                        timer: 3000
                        }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload()
                        }
                        })
            
            @endif
        });
    </script>
@endsection