@extends('Admin.layout.layout')
@section('title', 'Relatórios criados')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">Relatórios criados</h4>

                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Criado</th>
                            <th>Data de criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auto_reports as $auto_report)
                            <tr>
                                <td>
                                    {{ $auto_report->name }}
                                </td>
                                <td>
                                    {{ HelpAdmin::completName($auto_report->User) }}
                                </td>
                                <td class="font-bold">
                                    {{ $auto_report->created_at->format('d-m-Y H:i') }}
                                </td>
                                <td>
                                    <a href="{{ asset(HelpAdmin::getStorageUrl().$auto_report->path_file) }}" download="{{ $auto_report->name_slug }}" class="my-btn btn btn-xs btn-trans btn-info">
                                        Baixar
                                    </a>
                                    <a href="#" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
                                    {{-- @if (in_array('adm.job_opportunities.alert', HelpAdmin::PermissionsUser()))
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection