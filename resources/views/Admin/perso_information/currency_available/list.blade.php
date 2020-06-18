@extends('Admin.layout.layout')
@section('title', 'Lista de moedas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">
                    Lista de moedas

                    @if (in_array('adm.currency_available.new', HelpAdmin::permissionsUser()))
                        <a href="{{ route('adm.currency_available.new') }}" class="m-l-5 text-blue">
                            Novo registro
                        </a>
                    @endif
                </h4>

                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Moeda</th>
                            <th>Data de cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($currency_availables as $currency)
                            <tr>
                                <td>
                                    {{ $currency->id }}
                                </td>
                                <td>
                                    {{ $currency->code }}
                                </td>
                                <td>
                                    {{ $currency->currency }}
                                </td>
                                <td>
                                    {{ $currency->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    @if (in_array('adm.currency_available.edit', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.currency_available.edit', $currency->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>    
                                    @endif

                                    @if (in_array('adm.currency_available.alert', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.currency_available.alert', $currency->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>    
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