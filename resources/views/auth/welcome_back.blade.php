@extends('auth.layout.layout')
@section('title', 'NTSec - Bem vindo de volta')

@section('content')

<div class="m-t-20 card-box">
    <div class="text-center">
        <h4 class="text-uppercase font-bold m-b-0">Bem vindo de volta</h4>
    </div>
    <div class="p-20 pt-0 pb-0">
        {!! Form::open(['url'=>route('login'), 'class'=>'text-center']) !!}
            {!! Form::hidden('email', $user->email) !!}

            <div class="user-thumb">
                <img src="{{ asset(HelpAdmin::getAvatarUser($user)) }}" alt="user-img" title="{{ HelpAdmin::completName($user) }}" class="img-fluid rounded-circle img-thumbnail" alt="thumbnail">
                <p class="text-uppercase font-bold m-b-0">
                    {{ HelpAdmin::completName($user) }}
                </p>
            </div>
            <div class="form-group">
                <p class="text-muted m-t-10">
                    Digite sua senha para acessar.
                </p>
                <div class="input-group m-t-30">
                    <input type="password" class="form-control" placeholder="Senha" required="" autofocus name="password">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary w-sm waves-effect waves-light">
                            Acessar
                        </button>
                    </span>
                    @if ($errors->has('email'))
                        <small class="p-t-10 pl-0 text-danger txt-trans-initial font-12 font-bold">
                            {{ $errors->first('email') }}
                        </small>
                    @endif
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection