@extends('layouts.template')

@section('title', '- Editar carrera')

@section('content')
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center fw-bold">Editar carrera: {{ $career->name }}</div>
    
                <div class="card-body">
                    <form action="{{ route('careers.update', $career) }}" method="POST">
                        @method('PUT')
                        @csrf
    
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                            <input type="text" name="name" class="form-control" value="{{ $career->name }}" required>
                        </div>

                        <div class="col-md-4 mx-auto">
                            <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
                            <a href="{{ route('careers.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection