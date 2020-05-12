@extends('Admin.layout.layout')
@section('title', 'Novo Grupo')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Novo Grupo</h4>
                {!! Form::open(['url'=>route('adm.groups.save')]) !!}
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hierarchy_level" class="col-form-label">
                                    Nível hierárquico*
                                    @if ($errors->has('hierarchy_level'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('hierarchy_level') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::text('hierarchy_level', null, ['class'=>'form-control', 'id'=>'hierarchy_level', 'autofocus']) !!}
                            </div>
                            <div class="form-group">
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
                            <div class="form-group">
                                <label for="tag" class="col-form-label">
                                    Tag*
                                    @if ($errors->has('tag'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('tag') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::text('tag', null, ['class'=>'form-control', 'id'=>'tag']) !!}
                            </div>
                            <div class="form-group">
                                <label for="tag_color" class="col-form-label">
                                    Cor*
                                    @if ($errors->has('tag_color'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('tag_color') }}
                                        </small>
                                    @endif
                                </label>
                                {{-- {!! Form::text('tag_color', '#000000', ['class'=>'form-control colorpicker-rgba', 'id'=>'tag_color', 'data-color-format'=>'rgba']) !!} --}}
                                <div data-color-format="rgb" data-color="#000000" class="colorpicker-default input-group">
                                    <input type="text" name="tag_color" readonly="readonly" value="#000000" class="form-control">
                                    <span class="input-group-append add-on">
                                        <button class="btn btn-primary" type="button">
                                            <i style="background-color: #000000;margin-top: 2px;"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permissions" class="col-form-label">
                                    Permissões*
                                    @if ($errors->has('permissions'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('permissions') }}
                                        </small>
                                    @endif
                                </label>
                                <select id="my_multi_select3" name="permissions[]" class="multi-select" multiple>
                                    @foreach ($created_permissions as $permission)
                                        <option value='{{ $permission->id }}'>
                                            {{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>
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

@endsection