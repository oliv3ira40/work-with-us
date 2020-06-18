@extends('Admin.layout.layout')
@section('title', 'Editando tipo de contrato')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Editando tipo de contrato</h4>
                {!! Form::model($contract_available, ['url'=>route('adm.type_of_cont_avail.update')]) !!}
                    {!! Form::hidden('id', null) !!}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name" class="col-form-label">
                                Nome*
                                @if ($errors->has('name'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('name') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'autofocus']) !!}
                        </div>
                    </div>

                    @if (in_array('adm.type_of_cont_avail.list', HelpAdmin::permissionsUser()))
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                    <label for="checkbox2">
                                        Permanecer na página
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Salvar', ['class'=>'btn btn-xs btn-block btn-trans btn-info']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection