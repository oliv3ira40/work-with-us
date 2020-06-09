@extends('Admin.layout.layout')
@section('title', 'Nova Vaga')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Nova Vaga</h4>
                {!! Form::open(['url'=>route('adm.job_opportunities.save')]) !!}
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="occupation_area" class="col-form-label">
                                    Área*
                                    @if ($errors->has('occupation_area'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('occupation_area') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::text('occupation_area', null, ['class'=>'form-control', 'id'=>'occupation_area']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state_id" class="col-form-label">
                                    Estado*
                                    @if ($errors->has('state_id'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('state_id') }}
                                        </small>
                                    @endif
                                </label>
                                
                                <select id="state_id" name="state_id" class="form-control select2">
                                    <option selected disabled value="null">Selecione...</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city_id" class="col-form-label">
                                    Cidade*
                                    @if ($errors->has('city_id'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('city_id') }}
                                        </small>
                                    @endif
                                </label>

                                <select id="city_id" name="city_id" class="form-control select2">
                                    <option selected disabled value="null">Selecione...</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="col-form-label">
                                    Descricao*
                                    @if ($errors->has('description'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('description') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::textarea('description', null, ['class'=>'form-control elm1', 'id'=>'description']) !!}
                            </div>
                        </div>
                    </div>

                    @if (in_array('adm.groups.list', HelpAdmin::permissionsUser()))
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

    {{-- Forms --}}
        {!! Form::open(['url' => route('adm.job_opportunities.get_cities_by_state'), 'id' => 'get_cities_by_state']) !!}
        {!! Form::close() !!}
    {{-- Forms --}}

@endsection