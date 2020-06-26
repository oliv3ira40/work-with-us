@extends('Admin.layout.layout')
@section('title', 'Inserir arquivos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Insira os arquivos a serem tratados</h4>
                {!! Form::open(['url'=>route('adm.automated_reporting.get_information_from_files'), 'files'=>'true']) !!}
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="col-form-label">
                                    Nome
                                    @if ($errors->has('name'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('name') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="col-form-label">
                                    Objetivo / Descrição do relatório
                                    @if ($errors->has('description'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('description') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::textarea('description', null, ['class'=>'form-control', 'id'=>'description', 'rows'=>'4']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="files" class="col-form-label">
                                    Arquivos*
                                    @if ($errors->has('files'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('files') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::file('files[]', ['class'=>'form-control', 'id'=>'files', 'multiple']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Enviar arquivos', ['class'=>'btn btn-xs btn-block btn-trans btn-info']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection