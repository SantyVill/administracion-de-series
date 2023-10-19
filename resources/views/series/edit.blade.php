<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <title>Registrar Serie</title>
</head>
<body class="bg-info">
    <section class="m-0-auto  text-center">
        <form method="POST" action="{{route('series.update',$serie)}}" class=" mt-5 bg-white col-8 mx-auto rounded-3 align-items-center bg-form border border-2 border-dark justify-content-center">
            <legend class="bg-dark" style="color:rgb(150 150 150)">Registrar Equipo</legend>
            @csrf @method('PATCH')
            <div class="row mx-auto col-11">
                <div class="col-6">
                    <label for="titulo" class="form-label">Título: </label>
                    <input type="text" class="form-control border-dark" name="titulo" value="{{ old('titulo',$serie->titulo)}}" maxlength="{{config('tam_numSerie')}}">
                    {!!$errors->first('titulo','<small>:message</small><br>')!!}<br>
                </div>
                
                <div class="col-6">
                    <label for="genero" class="form-label">Género: </label>
                    <select class="form-select border-dark" id="genero" name="genero" aria-label="Default select example" {{-- required --}}>
                        <option value="">Seleccionar Género</option>
                        <option value="Accion" {{old('genero',$serie->genero)=='Accion'?'selected':''}}>Acción</option>
                        <option value="Comedia" {{old('genero',$serie->genero)=='Comedia'?'selected':''}}>Comedia</option>
                        <option value="Drama" {{old('genero',$serie->genero)=='Drama'?'selected':''}}>Drama</option>
                        <option value="Terror" {{old('genero',$serie->genero)=='Terror'?'selected':''}}>Terror</option>
                        <option value="Ciencia Ficcion" {{old('genero',$serie->genero)=='Ciencia Ficcion'?'selected':''}}>Ciencia Ficción</option>
                    </select>
                    {!!$errors->first('genero','<small>:message</small><br>')!!}<br>
                </div>
            </div>
            <div class="row mb-0 justify-content-center">
                <div class="col-8">
                    <label for="descripcion" class="form-label">Descripción: </label><br>
                    <textarea name="descripcion"  class="form-control border-dark" cols="10" rows="4">{{ old('descripcion',$serie->descripcion)}}</textarea>
                    {!!$errors->first('descripcion','<small>:message</small><br>')!!}<br>
    
                </div>
            </div>
            <div class="row mx-auto col-11">
                <div class="col-6">

                    <label for="estrellas" class="form-label">Estrellas:</label>
                    <input type="number" name="estrellas" class="form-control border-dark" value="{{ old('estrellas',$serie->estrellas)}}">
                    {!!$errors->first('estrellas','<small>:message</small><br>')!!}<br>
                    
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <div class="col-6">
                        <label for="fecha_estreno" class="form-label">Fecha de Estreno: </label>
                        <input type="date" class="form-control border-dark" name="fecha_estreno" value="{{ old('fecha_estreno',$serie->fecha_estreno)}}" maxlength="{{config('tam_fecha_estreno')}}">
                        {!!$errors->first('fecha_estreno','<small>:message</small><br>')!!}<br>
                    </div>
                </div>
            </div>
            <div class="row mx-auto col-11">
                <div class="col-6">
                    <label for="precio_alquiler" class="form-label">Precio de Alquiler:</label>
                    <input type="number" name="precio_alquiler" class="form-control border-dark" value="{{ old('precio_alquiler',$serie->precio_alquiler)}}"step=".01">
                    {!!$errors->first('precio_alquiler','<small>:message</small><br>')!!}<br>
                </div>
                <div class="justify-content-center mt-4 col-6 d-inline-flex p-0 bd-highlight form-check form-switch d-inline-flex bd-highlight">
                    <input class="form-check-input" id="atp" type="checkbox" name="atp">
                    <label class="form-check-label" for="atp">Apta para todo público:</label>
                </div>
            </div>
            
            <div class="row mb-0 justify-content-center mb-2">
                <div class="col-1">
                    <button type="submit" class="p-1 w-auto rounded border border-dark text-success rounded-circle" style="background-color: rgb(232, 240, 247)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </button>
                </div>
                <div class="col-1 ">
                    <button type="button" class="p-1 w-auto rounded border border-dark text-danger rounded-circle" style="background-color: rgb(232, 240, 247)">
                        <a class="text-danger" href="{{ route('series.index') }}" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                        </a>
                    </button>
                </div>
            </div>
        </form>
    </section>
    @if (session()->has('message'))
    <div class="alert alert-warning alert-dismissible" role="alert" id="error">
        <strong>{{ session()->get('message') }}</strong> {{ session('success') }}
    </div>
    @endif
</body>
</html>