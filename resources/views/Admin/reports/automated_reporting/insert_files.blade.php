@extends('Admin.layout.layout')
@section('title', 'Inserir arquivos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::open(['url'=>route('adm.automated_reporting.get_information_from_files'), 'files'=>'true']) !!}
                    <h4 class="header-title m-t-0 m-b-0">Cabeçalho</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="col-form-label">
                                    Nome*
                                    @if ($errors->has('name'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('name') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::text('name', $data['standard_column_auto_report']->name, ['class'=>'form-control', 'id'=>'name']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="report_objective_description" class="col-form-label">
                                    Objetivo / Descrição do relatório*
                                    @if ($errors->has('report_objective_description'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('report_objective_description') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::textarea('report_objective_description', $data['standard_column_auto_report']->report_objective_description, ['class'=>'form-control', 'id'=>'report_objective_description', 'rows'=>'4']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clarifications_recommendations" class="col-form-label">
                                    Esclarecimentos e Recomendações*
                                    @if ($errors->has('clarifications_recommendations'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('clarifications_recommendations') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::textarea('clarifications_recommendations', $data['standard_column_auto_report']->clarifications_recommendations, ['class'=>'form-control', 'id'=>'clarifications_recommendations', 'rows'=>'4']) !!}
                            </div>
                        </div>
                    </div>

                    <h4 class="header-title m-t-0 m-b-0">Insira os arquivos a serem tratados</h4>
                    <div class="row">
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