@extends('Admin.layout.layout')
@section('title', 'Excluindo tipo de contrato')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo tipo de contrato</h4>

                {!! Form::model($contract_available, ['url'=>route('adm.type_of_cont_avail.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $contract_available->name }}</div>
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