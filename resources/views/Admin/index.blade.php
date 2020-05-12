@extends('Admin.layout.layout')
@section('title', 'Página inicial')

@section('content')

    @if (isset($data))
        <div class="row">
            <a href="{{ route('adm.users.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10">Usuários</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0">{{ $data['count_users'] }}</h2>
                            <p class="text-muted m-b-20">cadastrados</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('adm.groups.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10">Grupos</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0">{{ $data['count_groups'] }}</h2>
                            <p class="text-muted m-b-20">disponíveis</p>
                        </div>
                        <div class="progress progress-bar-primary-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('adm.created_permissions.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10">Permissões</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0">{{ $data['count_permissions'] }}</h2>
                            <p class="text-muted m-b-20">cadastrados</p>
                        </div>
                        <div class="progress progress-bar-warning-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endif

    {{-- <div class="row">
        <div class="col-lg-4 col-xs-12">
            <a href="{{ route('adm.users.list') }}">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim">{{ $data['users']->total() }}</span></span>
                                            <span class="weight-500 uppercase-font block font-13">Usuários</span>
                                        </div>
                                        <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-xs-12">
            <a href="{{ route('adm.groups.list') }}">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim">{{ $data['groups']->total() }}</span></span>
                                            <span class="weight-500 uppercase-font block">Grupos</span>
                                        </div>
                                        <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-xs-12">
            <a href="{{ route('adm.created_permissions.list') }}">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter"><span class="counter-anim">{{ $data['created_permissions']->count() }}</span></span>
                                            <span class="weight-500 uppercase-font block">Permissões criadas</span>
                                        </div>
                                        <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-list data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div> --}}

    {{-- 
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Usuários</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap mt-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Grupo</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['users'] as $user)
                                            <tr>
                                                <td style="color:{{ ($user->deleted_at != null) ? 'red' : '' }}">
                                                    {{ $user->id }}
                                                </td>
                                                <td style="color:{{ ($user->deleted_at != null) ? 'red' : '' }}">
                                                    {{ HelpAdmin::completName($user) }}
                                                </td>
                                                <td style="color:{{ ($user->deleted_at != null) ? 'red' : '' }}">
                                                    {{ $user->email }}
                                                </td>
                                                <td style="color:{{ ($user->deleted_at != null) ? 'red' : $user->Group->tag_color }}" class="weight-500">
                                                    {{ $user->Group->name }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('adm.users.edit', $user->id) }}" class="mr-25" data-toggle="tooltip" data-original-title="Editar">
                                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                    </a>
                                                    @if ($user->deleted_at != null)
                                                        <a href="{{ route('adm.users.to_restore', $user->id) }}" data-toggle="tooltip" data-original-title="Restaurar">
                                                            <i class="fa fa-refresh text-primary"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('adm.users.alert', $user->id) }}" data-toggle="tooltip" data-original-title="Excluir">
                                                            <i class="fa fa-close text-danger"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <ul class="col-md-12 pagination pagination-sm mt-0 mb-0 pr-0 text-right">
                                    {!! $data['users']->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Grupos</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap mt-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Tag</th>
                                        <th>Permissões</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['groups'] as $group)
                                            <tr>
                                                <td>
                                                    {{ $group->id }}
                                                </td>
                                                <td style="color: {{ $group->tag_color }}">
                                                    {{ $group->name }}
                                                </td>
                                                <td>
                                                    {{ $group->tag }}
                                                </td>
                                                <td>
                                                    {{ count($group->Permission) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('adm.groups.edit', $group->id) }}" class="mr-25" data-toggle="tooltip" data-original-title="Editar">
                                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                    </a>
                                                    <a href="{{ route('adm.groups.alert', $group->id) }}" data-toggle="tooltip" data-original-title="Excluir">
                                                        <i class="fa fa-close text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                <ul class="col-md-12 pagination pagination-sm mt-0 mb-0 pr-0 text-right">
                                    {!! $data['groups']->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection