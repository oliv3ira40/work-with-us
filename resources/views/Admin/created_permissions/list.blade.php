@extends('Admin.layout.layout')
@section('title', 'Lista de permissões')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">Lista de permissões</h4>
                <p class="text-muted font-14 m-b-30">
                    Nesta lista sera exibido todas as permissões cadastradass
                </p>

                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Rota</th>
                            <th>Data de criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->route }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>
                                    <a href="{{ route('adm.created_permissions.edit', $permission->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>    
                                    <a href="{{ route('adm.created_permissions.alert', $permission->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection