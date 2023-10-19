<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <title>Administración de Series</title>
</head>
<body class="bg-info">
    <h1 class="text-center">Lista de Series</h1>
    
    @if (session()->has('message'))
    <div class="alert alert-warning alert-dismissible" role="alert" id="error">
        <strong>{{ session()->get('message') }}</strong> {{ session('success') }}
    </div>
    @endif
    <a href="{{route('series.create')}}" class="ms-5 my-2 btn btn-success btn-sm border-dark">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
        </svg>
        Nuevo
    </a>
    
    <div class="table-responsive mx-3">
        <table class="table p-0 m-0 w-100 table-responsive table-primary table-hover table-striped table-bordered border-2 border-dark shadow rounded">
            <thead class="table-light">
                <tr>
                    <th>Título</th>
                    <th>Descripcion</th>
                    <th>Fecha de estreno</th>
                    <th class="col-1">Estrellas</th>
                    <th>Genero</th>
                    <th>Precio de Alquiler</th>
                    <th class="text-center px-0 mx-0">ATP</th>
                    <th class="text-center px-0 mx-0">Estado</th>
                    <th class="col-1" colspan="3">Acciones</th>
                </tr>
            </thead>
                <tbody class="table-group-divider">
                    @if (!isset($serie))
                        
                    @forelse($series as $serie)
                    <tr class="table-primary" >
                        <td scope="row">{{$serie->titulo}}</td>
                        <td>{{$serie->descripcion}}</td>
                        <td>{{$serie->fecha_estreno}}</td>
                        {{-- <td>{{$serie->estrellas}}</td> --}}
                        <td class=" table-content text-nowrap text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                            @if ($i<=$serie->estrellas)
                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color: yellow">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>    
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color: yellow">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                            @endif
                            @endfor
                        </td>
                        <td>{{$serie->genero}}</td>
                        <td>${{$serie->precio_alquiler}}</td>
                        <td class="text-center">{{$serie->apta()}}</td>
                        <td class="text-center">{{$serie->estado}}</td>
                        <td class="table-content text-nowrap">
                            <button type="button" class="py-0 w-auto rounded border border-dark text-success rounded-circle" style="background-color: rgb(255, 248, 153)" title="Editar">
                                <a class="text-success" href="{{ route('series.edit',$serie) }}" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </a>
                            </button>
                        </td>
                        <td>
                                
                            <button type="button" class="p-1 w-auto rounded border border-dark text-danger rounded-circle" style="background-color: rgb(255, 248, 153)" title="Anular">
                                <a class="text-danger" href="{{ route('series.anular',$serie) }}" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </button>
                        </td>
                        <td>
                                
                            <form method="POST" action="{{route('series.destroy',$serie)}}" class="">
                                <button type="submit" class="p-1 w-auto rounded border border-dark text-danger rounded-circle" style="background-color: rgb(255, 248, 153)" title="Eliminar"onclick="return confirm('¿Está seguro que desea eliminar la serie {{$serie->titulo}}?')">
                                @csrf @method('DELETE')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td class="text-center h5" colspan="9">No se registraron series</td>
                    @endforelse
                        
                    @else
                    <td class="text-center h5" colspan="9">No se registraron series</td>
                        
                    @endif
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </div>
        
</body>
</html>