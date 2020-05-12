@extends('Admin.layout.layout')
@section('title', 'Lista de Grupos')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">Lista de Grupos</h4>
                <p class="text-muted font-14 m-b-30">
                    Nesta lista sera exibido todos os grupos cadastrados
                </p>

                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Permissões</th>
                            <th>Usuários</th>
                            <th>Data de cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>
                                    <span style="background-color: {{ $group->tag_color }};" class="badge badge-primary">
                                        {{ $group->name }}
                                    </span>
                                </td>
                                <td>
                                    {{ $group->Permission->count() }}
                                </td>
                                <td>
                                    {{ $group->User->count() }}
                                </td>
                                <td class="font-bold">{{ $group->created_at }}</td>
                                <td>
                                    @if (in_array('adm.groups.edit', HelpAdmin::PermissionsUser()))
                                        <a href="{{ route('adm.groups.edit', $group->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>
                                    @endif
                                    
                                    @if (in_array('adm.groups.alert', HelpAdmin::PermissionsUser())
                                        AND !HelpAdmin::isAProtectedGroup($group))
                                        <a href="{{ route('adm.groups.alert', $group->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection