@extends('Admin.layout.layout')
@section('title', 'Lista de meios de divulgação da vaga')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">
                    Lista de meios de divulgação da vaga

                    @if (in_array('adm.mean_of_publ_vag.new', HelpAdmin::permissionsUser()))
                        <a href="{{ route('adm.mean_of_publ_vag.new') }}" class="m-l-5 text-blue">
                            Novo registro
                        </a>
                    @endif
                </h4>

                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Data de cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($means_vagancies as $mean_vagancy)
                            <tr>
                                <td>
                                    {{ $mean_vagancy->id }}
                                </td>
                                <td>
                                    {{ $mean_vagancy->name }}
                                </td>
                                <td>
                                    {{ $mean_vagancy->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    @if (in_array('adm.mean_of_publ_vag.edit', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.mean_of_publ_vag.edit', $mean_vagancy->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>    
                                    @endif

                                    @if (in_array('adm.mean_of_publ_vag.alert', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.mean_of_publ_vag.alert', $mean_vagancy->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>    
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