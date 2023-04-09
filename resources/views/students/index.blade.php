@extends('layouts.template')

@section('title', '- Alumnos')

@section('content')
    {{-- Botón de Añadir     --}}
    <div class="row mt-4">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalStudents">
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
            </div>
        </div>
    </div>

    {{-- Tabla de Alumnos añadidos --}}
    <div class="row mt-4">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <tr><th>#</th> <th>Nombre</th> <th>Email</th> <th>Carrera</th> <th>Editar</th> <th>Eliminar</th></tr>
                    </thead>

                    <tbody class="table-group-divider">
                        @php $num = 1; @endphp

                        @foreach ($students as $student)
                            <tr align="center">
                                <td>{{ $num++ }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->id_career }}</td>
                                <td><a href="{{ route('students.edit', $student) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST">
                                        @method("DELETE")
                                        @csrf

                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modalStudents" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal-title">Añadir estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <form action="{{ route('students.store') }}" id="frmStudents" method="POST">
                    <div class="modal-body">                    
                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Nombre del alumno" value="{{ old('name') }}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="Email del alumno" value="{{ old('email') }}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>

                            <select name="id_career" class="form-select" required>
                                <option value="" selected disabled>--- Selecione una carrera ---</option>
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection