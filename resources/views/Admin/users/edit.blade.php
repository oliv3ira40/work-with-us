@extends('Admin.layout.layout')
@section('title', 'Editando usuário')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Editando usuário</h4>
                {!! Form::model($user, ['url'=>route('adm.users.update')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="first_name" class="col-form-label">
                                Nome*
                                @if ($errors->has('first_name'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('first_name') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('first_name', null, ['class'=>'form-control', 'id'=>'first_name', 'autofocus']) !!}
                        </div>
                        <div class="form-group col-md-3">
                            <label for="last_name" class="col-form-label">
                                Sobrenome
                                @if ($errors->has('last_name'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('last_name') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) !!}
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email" class="col-form-label">
                                E-mail*
                                @if ($errors->has('email'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telephone" class="col-form-label">
                                Telefone
                                @if ($errors->has('telephone'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('telephone') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('telephone', null, ['class'=>'form-control', 'id'=>'telephone']) !!}
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="password" class="col-form-label">
                                Senha*
                                @if ($errors->has('password'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                        </div>
                        <div class="form-group col-md-3">
                            <label for="password_confirmation" class="col-form-label">
                                Confirme a senha*
                                @if ($errors->has('password_confirmation'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('password_confirmation') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="group_id" class="col-form-label">
                                Grupo*
                                @if ($errors->has('group_id'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('group_id') }}
                                    </small>
                                @endif
                            </label>

                            <select id="group_id" name="group_id" class="form-control">
                                @foreach ($groups as $group)
                                    @if ($user->group_id == $group->id)
                                        <option selected value="{{ $group->id }}">{{ $group->name }}</option>
                                    @else
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if (in_array('adm.users.list', HelpAdmin::permissionsUser()))
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

                    <button type="button" class="btn btn-info btn-trans m-b-20" data-toggle="modal" data-target="#myModal">Alterar imagem de perfil</button>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Atualizar', ['class'=>'btn btn-xs btn-block btn-trans btn-info']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    {{-- MODAL --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {!! Form::open(['url' => route('adm.avatars.change_user_avatar')]) !!}
            {!! Form::hidden('user_id', $user->id) !!}
            {!! Form::hidden('avatar_id', null, ['id'=>'input_avatar_id']) !!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Imagens de Perfil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body row pt-0 pb-10" style="height: 400px; overflow: auto;">
                        @foreach ($avatars as $avatar)
                            <div class="col-6 col-sm-4 col-md-3 p-t-10">
                                <img class="avatar" width="100%" src="{{ asset($avatar->path) }}" data-avatar_id="{{ $avatar->id }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-trans" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-trans">Atualizar</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    {{-- MODAL --}}
    
@endsection