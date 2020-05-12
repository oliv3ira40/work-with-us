@extends('auth.layout.layout')
@section('title', 'Esqueci a senha')


@section('content')

    <div class="m-t-20 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold mb-0">Esqueci a senha</h4>
        </div>
        <div class="p-20 p-t-10 p-b-10">
            {!! Form::open(['url'=>route('adm.send_new_password'), 'class'=>'form-horizontal mt-0']) !!}
                <div class="form-group pt-0">
                    <div class="col-xs-12">
                        <label for="email">
                            E-mail<br>
                            
                            @if ($errors->has('email'))
                                <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                    {{ $errors->first('email') }}
                                </small>
                            @endif
                        </label>
                        {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email', 'autofocus']) !!}
                    </div>
                </div>

                <div class="form-group text-center m-t-5">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                            Avançar
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
                    <b>Faça Login</b>
                </a>
            </p>
        </div>
    </div>
@endsection