@extends('Admin.layout.layout')
@section('title', 'Excluindo permissão')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo permissão</h4>

                {!! Form::model($permission, ['url'=>route('adm.created_permissions.delete')]) !!}
                    {!! Form::hidden('id', null) !!}
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $permission->name }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="route" class="col-form-label">
                                Rota
                            </label>
                            <div class="form-control">{{ $permission->route }}</div>
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