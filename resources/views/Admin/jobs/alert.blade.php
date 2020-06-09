@extends('Admin.layout.layout')
@section('title', 'Excluindo vaga')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo vaga</h4>

                {!! Form::model($job, ['url'=>route('adm.job_opportunities.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="first_name" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $job->name }}</div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="last_name" class="col-form-label">
                                Área
                            </label>
                            <div class="form-control">{{ $job->occupation_area ?? '---' }}</div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email" class="col-form-label">
                                Estado
                            </label>
                            <div class="form-control">{{ $job->State->name }}</div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telephone" class="col-form-label">
                                Cidade
                            </label>
                            <div class="form-control">{{ $job->City->name ?? '---' }}</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Excluir', ['class'=>'btn btn-xs btn-block btn-trans btn-danger']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection