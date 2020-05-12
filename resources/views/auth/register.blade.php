@extends('auth.layout.layout')
@section('title', 'Registre-se')


@section('content')

    <div class="m-t-20 card-box">
        <div class="text-center m-b-10">
            <h4 class="font-bold mb-0">Crie uma conta</h4>
        </div>

        <div class="p-20 p-t-10 p-b-10">
            {!! Form::open(['url'=>route('register'), 'class'=>'form-horizontal mt-0']) !!}
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="first_name">
                            Nome*<br>

                            @if ($errors->has('first_name'))
                                <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                    {{ $errors->first('first_name') }}
                                </small>
                            @endif
                        </label>
                        {!! Form::text('first_name', null, ['class'=>'form-control', 'id'=>'first_name', 'autofocus'=>'true']) !!}
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">
                            Sobrenome<br>
    
                            @if ($errors->has('last_name'))
                                <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                    {{ $errors->first('last_name') }}
                                </small>
                            @endif
                        </label>
                        {!! Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="email">
                            E-mail*<br>

                            @if ($errors->has('email'))
                                <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                    {{ $errors->first('email') }}
                                </small>
                            @endif
                        </label>
                        {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="password">
                            Senha*<br>

                            @if ($errors->has('password'))
                                <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                    {{ $errors->first('password') }}
                                </small>
                            @endif
                        </label>
                        {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation">
                            Confirme sua senha*<br>
    
                            @if ($errors->has('password_confirmation'))
                                <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                    {{ $errors->first('password_confirmation') }}
                                </small>
                            @endif
                        </label>
                        {!! Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) !!}
                    </div>
                </div>

                <div class="form-group text-center m-t-5">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-bordred btn-block waves-effect waves-light" type="submit">
                            Registrar
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Já possui uma conta?
                <a href="{{ route('login') }}" class="text-primary m-l-5">
                    <b>Faça login</b>
                </a>
            </p>
        </div>
    </div>
@endsection