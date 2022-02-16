@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('categories.store') }}" method="post" class="form-horizontal">
        @csrf
            @if(session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('name')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" name="color">
            </div>
            <button type="submit" class="btn btn-primary">Crear nueva categoria</button>
        </form>
        <div>
            @foreach ($categories as $category)
                <div class="row py-1 mt-3">
                    <div class="col-md-9 d-flex aling-items-center">
                        <a class="d-flex aling-items-center gap-2" href="{{ route('categories.show', [ 'category' => $category->id ]) }}" >       
                            {{ $category->name }}<span class="color-container" style="background-color: {{ $category->color }} "></span> 
                        </a>
                    </div>
                    
                </div>
                <div>
                        <form action="{{ route('categories.destroy',['category'=>$category->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

                        </form>
                    </div>
            @endforeach
        </div>
    </div>

@endsection