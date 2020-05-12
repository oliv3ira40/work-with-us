@extends('Admin.layout.layout')
@section('title', 'Excluindo Grupo')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo Grupo</h4>
                @if ($users > 0)
                    <h4 class="m-t-0">
                        <small class="text-white">
                            Atualmente {{ $users }} usuário(s) estão vinculados a este grupo, caso prossiga com a exclusão desde grupo eles serão transferidos para o grupo "Publico".
                        </small>
                    </h4>
                @endif
                {!! Form::model($group, ['url'=>route('adm.groups.delete')]) !!}
                    {!! Form::hidden('id', null) !!}
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="hierarchy_level" class="col-form-label">
                                Nível hierárquico*
                                @if ($errors->has('hierarchy_level'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('hierarchy_level') }}
                                    </small>
                                @endif
                            </label>
                            <div class="form-control">
                                {{ $group->hierarchy_level }}
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name" class="col-form-label">
                                Nome*
                                @if ($errors->has('name'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('name') }}
                                    </small>
                                @endif
                            </label>
                            <div class="form-control">
                                {{ $group->name }}
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tag" class="col-form-label">
                                Tag*
                                @if ($errors->has('tag'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('tag') }}
                                    </small>
                                @endif
                            </label>
                            <div class="form-control">
                                {{ $group->tag }}
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tag" class="col-form-label">
                                Permissões
                                @if ($errors->has('tag'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('tag') }}
                                    </small>
                                @endif
                            </label>
                            <div class="form-control">
                                {{ $group->Permission->count() }}
                            </div>
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