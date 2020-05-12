@extends('Admin.layout.layout')
@section('title', 'Novas permissões')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Novas permissões</h4>

                {!! Form::open(['url'=>route('adm.created_permissions.save')]) !!}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="textarea" class="col-form-label">
                                Permissões* <br>
                                <small>Ex: nome1=rota1/nome2=rota2</small>
                                @if ($errors->has('textarea'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('textarea') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::textarea('textarea', null, ['class'=>'form-control', 'id'=>'textarea', 'rows'=>'5', 'maxlength'=>'2000']) !!}
                        </div>
                    </div>

                    @if (in_array('adm.created_permissions.list', HelpAdmin::permissionsUser()))
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