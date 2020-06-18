@extends('Admin.layout.layout')
@section('title', 'Excluindo moeda')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo moeda</h4>

                {!! Form::model($currency, ['url'=>route('adm.currency_available.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name" class="col-form-label">
                                Código
                            </label>
                            <div class="form-control">{{ $currency->code }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name" class="col-form-label">
                                Moeda
                            </label>
                            <div class="form-control">{{ $currency->currency ?? '---' }}</div>
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