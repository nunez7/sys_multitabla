@extends('layouts.app')

@section('template_title')
    {{ $libro->name ?? 'Mostrar Libro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Libro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('libros.index') }}"> Retroceder</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong># Libro:</strong>
                            {{ $libro->cve_libro }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $libro->categoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $libro->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
