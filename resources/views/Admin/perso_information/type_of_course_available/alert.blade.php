@extends('Admin.layout.layout')
@section('title', 'Excluindo tipo de curso')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo tipo de curso</h4>

                {!! Form::model($type_course, ['url'=>route('adm.type_cours_avail.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $type_course->name }}</div>
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