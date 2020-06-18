@extends('Admin.layout.layout')
@section('title', 'Excluindo moeda')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo moeda</h4>

                {!! Form::model($schooling, ['url'=>route('adm.schoolings_availables.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">
                                Registro composto
                            </label>
                            <div class="form-control">{{ $schooling->compound_register }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $schooling->name ?? '---' }}</div>
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