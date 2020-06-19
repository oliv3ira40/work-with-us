@extends('Admin.layout.layout')
@section('title', 'Página inicial')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Vagas disponíveis</h4>
            <table class="datatable table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Área</th>
                        <th>Região</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['jobs'] as $job)
                        <tr>
                            <td>
                                {{ $job->name }}
                            </td>
                            <td>
                                {{ $job->occupation_area }}
                            </td>
                            <td>
                                {{ $job->State->uf }} -
                                {{ $job->City->name }}
                            </td>
                            <td>
                                @if (in_array('adm.job_opportunities.detail', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.job_opportunities.detail', $job->id) }}" class="my-btn btn btn-xs btn-trans btn-info">Detalhes</a>
                                @endif
                                    <a href="{{ route('adm.groups.edit', $job->id) }}" class="my-btn btn btn-xs btn-trans btn-success">Inscreva-se</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection