@extends('Admin.layout.layout')
@section('title', 'Lista de tipos de contratos')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">
                    Lista de tipos de contratos

                    @if (in_array('adm.type_of_cont_avail.new', HelpAdmin::permissionsUser()))
                        <a href="{{ route('adm.type_of_cont_avail.new') }}" class="m-l-5 text-blue">
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
                        @foreach ($contracts_availables as $contract)
                            <tr>
                                <td>
                                    {{ $contract->id }}
                                </td>
                                <td>
                                    {{ $contract->name }}
                                </td>
                                <td>
                                    {{ $contract->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    @if (in_array('adm.type_of_cont_avail.edit', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.type_of_cont_avail.edit', $contract->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>    
                                    @endif

                                    @if (in_array('adm.type_of_cont_avail.alert', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.type_of_cont_avail.alert', $contract->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>    
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