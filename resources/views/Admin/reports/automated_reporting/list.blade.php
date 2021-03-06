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
                            <th>#</th>
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

@endsection