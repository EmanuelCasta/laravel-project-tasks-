@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todos') }}" method="POST">
            @csrf
            @if(session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Titulo de la tarea</label>
                <input type="text" class="form-control" name="title">
            </div>
            <button type="submit" class="btn btn-primary">Crear nueva tareaa</button>
        </form>

        <div>
            @if($category->todos->count() > 0)
                <div class="row py-1">
                    <div>
                        <a href="{{ route('',[]) }}"></a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('todos-destroy',[$todo->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            @else

                No hay tareas
            
            @endif
        </div>
    </div>

@endsection