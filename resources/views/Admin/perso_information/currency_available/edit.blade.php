@extends('Admin.layout.layout')
@section('title', 'Editando moeda')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Editando moeda</h4>
                {!! Form::model($currency, ['url'=>route('adm.currency_available.update')]) !!}
                    {!! Form::hidden('id', null) !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="code" class="col-form-label">
                                Código*
                                @if ($errors->has('code'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('code') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('code', null, ['class'=>'form-control', 'id'=>'code', 'autofocus']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="currency" class="col-form-label">
                                Moeda*
                                @if ($errors->has('currency'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('currency') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('currency', null, ['class'=>'form-control', 'id'=>'currency']) !!}
                        </div>
                    </div>

                    @if (in_array('adm.currency_available.list', HelpAdmin::permissionsUser()))
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