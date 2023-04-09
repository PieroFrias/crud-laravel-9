@extends('layouts.template')

@section('title', '- Editar alumno')

@section('content')
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white text-center fw-bold">Editar alumno: {{ $student->name }}</div>
    
                <div class="card-body">
                    <form action="{{ route('students.update', $student) }}" method="POST">
                        @method('PUT')
                        @csrf
    
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                            <input type="text" name="email" class="form-control" value="{{ $student->email }}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>

                            <select name="id_career" class="form-select" required>
                                <option value="" disabled>--- Selecione una carrera ---</option>
                                @foreach ($careers as $career)
                                    @if ($career->id == $student->id_career)
                                        <option value="{{ $career->id }}" selected>{{ $career->name }}</option>
                                    @else
                                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mx-auto">
                            <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection