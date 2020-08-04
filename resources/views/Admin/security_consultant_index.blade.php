@extends('Admin.layout.layout')
@section('title', 'Página inicial - '.\Auth::user()->Group->name)

@section('content')

    @if (isset($data))
        <div class="row">
            <a href="{{ route('adm.automated_reporting.insert_files') }}" class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-success">Novo relatório</h4>

                    <div class="widget-box-2">
                        <div class="progress progress-bar-success-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('adm.automated_reporting.list') }}" class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-primary">Lista de relatórios</h4>

                    <div class="widget-box-2">
                        <div class="progress progress-bar-primary-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Relatórios criados</h4>
    
                    <table class="datatable table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Criado</th>
                                <th>Data de criação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['auto_reports'] as $auto_report)
                                <tr>
                                    <td>
                                        {{ $auto_report->id }}
                                    </td>
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
                                        @if ($auto_report->path_file_pdf)
                                            <a href="{{ asset(HelpAdmin::getStorageUrl().$auto_report->path_file_pdf) }}" download="{{ $auto_report->name_slug }}.pdf" class="my-btn btn btn-xs btn-trans btn-success">
                                                PDF
                                            </a>
                                        @endif
                                        @if ($auto_report->path_file_docx)
                                            <a href="{{ asset(HelpAdmin::getStorageUrl().$auto_report->path_file_docx) }}" download="{{ $auto_report->name_slug }}.docx" class="my-btn btn btn-xs btn-trans btn-primary">
                                                DOCX
                                            </a>
                                        @endif
                                        @if (in_array('adm.automated_reporting.alert', HelpAdmin::PermissionsUser()))
                                            <a href="{{ route('adm.automated_reporting.alert', $auto_report->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">
                                                Excluir
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

@endsection