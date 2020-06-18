@extends('Admin.layout.layout')
@section('title', 'Lista de escolaridades')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">
                    Lista de escolaridades

                    @if (in_array('adm.schoolings_availables.new', HelpAdmin::permissionsUser()))
                        <a href="{{ route('adm.schoolings_availables.new') }}" class="m-l-5 text-blue">
                            Novo registro
                        </a>
                    @endif
                </h4>

                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Registro composto</th>
                            <th>Nome</th>
                            <th>Data de cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schoolings_availables as $schoolings_availables)
                            <tr>
                                <td>
                                    {{ $schoolings_availables->id }}
                                </td>
                                <td>
                                    {{ $schoolings_availables->compound_register }}
                                </td>
                                <td>
                                    {{ $schoolings_availables->name }}
                                </td>
                                <td>
                                    {{ $schoolings_availables->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    @if (in_array('adm.schoolings_availables.edit', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.schoolings_availables.edit', $schoolings_availables->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>    
                                    @endif

                                    @if (in_array('adm.schoolings_availables.alert', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.schoolings_availables.alert', $schoolings_availables->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>    
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