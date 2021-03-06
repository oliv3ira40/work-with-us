@extends('Admin.layout.layout')
@section('title', 'Excluindo meio de divulgação da vaga')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo meio de divulgação da vaga</h4>

                {!! Form::model($mean_vagancy, ['url'=>route('adm.mean_of_publ_vag.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $mean_vagancy->name }}</div>
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