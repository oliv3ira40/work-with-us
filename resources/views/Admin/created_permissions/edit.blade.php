@extends('Admin.layout.layout')
@section('title', 'Editando permissão')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Editando permissão</h4>

                {!! Form::model($permission, ['url'=>route('adm.created_permissions.update')]) !!}
                    {!! Form::hidden('id', null) !!}
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">
                                Nome*
                                @if ($errors->has('name'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('name') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="route" class="col-form-label">
                                Rota*
                                @if ($errors->has('route'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('route') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('route', null, ['class'=>'form-control', 'id'=>'route']) !!}
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
                            {!! Form::submit('Atualizar', ['class'=>'btn btn-xs btn-block btn-trans btn-info']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection