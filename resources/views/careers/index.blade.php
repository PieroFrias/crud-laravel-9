@extends('layouts.template')

@section('title', '- Carreras')

@section('content')
    {{-- Botón de Añadir     --}}
    <div class="row mt-4">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCareers">
                    <i class="fa-solid fa-circle-plus mr-4"></i> Añadir
                </button>
            </div>
        </div>
    </div>

    {{-- Tabla de Carreras añadidas --}}
    <div class="row mt-4">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead align="center"><tr><th>#</th> <th>Carrera</th> <th>Editar</th> <th>Eliminar</th></tr></thead>

                    <tbody class="table-group-divider">
                        @php $num = 1; @endphp

                        @foreach ($careers as $career)
                            <tr align="center">
                                <td>{{ $num++ }}</td>
                                <td>{{ $career->name }}</td>
                                <td><a href="{{ route('careers.edit', $career) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('careers.destroy', $career) }}" method="POST">
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
    <div class="modal fade" id="modalCareers" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal-title">Añadir carrera</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <form action="{{ route('careers.store') }}" id="frmCareers" method="POST">
                    <div class="modal-body">                    
                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Nombre de la carrera" value="{{ old('name') }}" required>
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