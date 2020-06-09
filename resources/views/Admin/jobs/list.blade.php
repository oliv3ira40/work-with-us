@extends('Admin.layout.layout')
@section('title', 'Lista de Vagas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">Lista de Vagas</h4>

                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Área</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Data de cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td>
                                    {{ $job->name }}
                                </td>
                                <td>
                                    {{ $job->occupation_area }}
                                </td>
                                <td>
                                    {{ $job->State->name }}
                                </td>
                                <td>
                                    {{ $job->City->name }}
                                </td>
                                <td class="font-bold">{{ $job->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    @if (in_array('adm.job_opportunities.edit', HelpAdmin::PermissionsUser()))
                                        <a href="{{ route('adm.job_opportunities.edit', $job->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>
                                    @endif
                                    
                                    @if (in_array('adm.job_opportunities.alert', HelpAdmin::PermissionsUser()))
                                        <a href="{{ route('adm.job_opportunities.alert', $job->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
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