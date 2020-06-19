@extends('Admin.layout.layout')
@section('title', 'Mais detalhes sobre a vaga')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box task-detail">
                <div class="media m-b-20">
                    <div class="media-body">
                        <h3 class="mb-0 mt-0 font-500">
                            Vaga: {{ $job->name }}
                        </h3>
                        {{-- <span class="badge badge-danger">Urgent</span> --}}
                    </div>
                </div>

                <h4 class="font-500 m-b-10">
                    {{ $job->occupation_area }}
                    / {{ $job->State->uf }}
                    - {{ $job->City->name }}
                </h4>

                <p class="text-muted">
                    {!! sprintf($job->description) !!}
                </p>

                <ul class="list-inline task-dates m-b-0 m-t-20">
                    <li>
                        <h5 class="font-600 m-b-5">Data de postagem</h5>
                        <p>
                            {{ $job->created_at->formatLocalized('%d de %B %Y') }}
                            <small class="text-muted">
                                {{ $job->created_at->format('h:i a') }}
                            </small>
                        </p>
                    </li>

                    <li>
                        <h5 class="font-600 m-b-5">Disponível até</h5>
                        <p>
                            {{ $job->created_at->formatLocalized('%d de %B %Y') }}
                            <small class="text-muted">
                                {{ $job->created_at->format('h:i a') }}
                            </small>
                        </p>
                    </li>
                </ul>

                <div class="clearfix"></div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-right m-t-30">
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light font-600">
                                Inscreva-se
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection