@extends('Admin.layout.layout')
@section('title', 'Excluindo relatório')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo relatório</h4>

                {!! Form::model($auto_report, ['url'=>route('adm.automated_reporting.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $auto_report->name }}</div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name" class="col-form-label">
                                Criado
                            </label>
                            <div class="form-control">{{ HelpAdmin::completName($auto_report->User) }}</div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email" class="col-form-label">
                                Data de criação
                            </label>
                            <div class="form-control">{{ $auto_report->created_at->format('d-m-Y H:i') }}</div>
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