@extends('Admin.layout.layout')
@section('title', 'Excluindo usuário')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo usuário</h4>

                {!! Form::model($user, ['url'=>route('adm.users.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="first_name" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $user->first_name }}</div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="last_name" class="col-form-label">
                                Sobrenome
                            </label>
                            <div class="form-control">{{ $user->last_name ?? '---' }}</div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email" class="col-form-label">
                                E-mail
                            </label>
                            <div class="form-control">{{ $user->email }}</div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telephone" class="col-form-label">
                                Telefone
                            </label>
                            <div class="form-control">{{ $user->telephone ?? '---' }}</div>
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