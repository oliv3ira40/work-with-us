@extends('Admin.layout.layout')
@section('title', 'Arquivos enviados')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">Informações coletadas</h4>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">
                                {{ $data['name'] }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="col-form-label">
                                Objetivo / Descrição do relatório
                            </label>
                            <div class="form-control">
                                {{ $data['description'] }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="accordion">
                            @foreach ($data['files'] as $key => $file)
                                @php
                                    $file_name = substr($file['name'], 0, strpos($file['name'], '.'));
                                @endphp
                                <div class="card card_file m-b-5">
                                    <div class="card-header" id="heading{{ $key }}">
                                        <h6 class="m-0">
                                            <a href="#{{ $file_name }}" class="collapsed text-dark font-600" data-toggle="collapse" aria-expanded="false" aria-controls="{{ $file_name }}">
                                                {{ $file_name }}
                                            </a>
                                        </h6>
                                    </div>
                        
                                    <div id="{{ $file_name }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
                                        <div class="card-body row">

                                            {{-- conteudo via js --}}

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {!! Form::open(['url'=>route('adm.automated_reporting.generate_auto_report'), 'id'=>'form_generate_report']) !!}
                    {!! Form::hidden('name', $data['name']) !!}
                    {!! Form::hidden('description', $data['description']) !!}
                    
                    <div class="row m-t-10">
                        <div class="col-md-12">
                            {!! Form::submit('Gerar relatório', ['class'=>'my-btn btn btn-block btn-primary btn_generate_report disabled']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @foreach ($data['files'] as $file)
        @php
            $file_name = substr($file['name'], 0, strpos($file['name'], '.'));
        @endphp
        <div class="file_read" data-file-name="{{ $file_name }}" style="display: none;">
            <div>
                {!! $file['content'] !!}
        </div>    
    @endforeach

@endsection






{{-- <div class="row">
    <div class="col-md-12">
        <p class="font-600 m-b-5">
            Uptime
            <span class="text-success pull-right">OK</span>
        </p>
        <div class="progress progress-bar-success-alt progress-sm m-b-20">
            <div class="progress-bar progress-bar-success wow" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; visibility: visible;">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <p class="font-600 m-b-5">
            Free Disk Space
            <span class="text-danger pull-right">WARNING</span>
            <p>
                Free Disk Space Critical - /var/log 99% full.
                Check if any partition listed above can be cleaned up to free up disk space.
                Please see sk60080 for further assistance freeing up disk space.
            </p>
        </p>
        <div class="progress progress-bar-danger-alt progress-sm m-b-20">
            <div class="progress-bar progress-bar-danger wow" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; visibility: visible;">
            </div>
        </div>
    </div>
</div> --}}