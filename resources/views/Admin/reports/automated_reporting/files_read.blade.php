@extends('Admin.layout.layout')
@section('title', 'Arquivos enviados')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::open(['url'=>route('adm.automated_reporting.generate_auto_report'), 'id'=>'form_generate_report']) !!}
                    <h4 class="header-title m-t-0 m-b-0">Cabeçalho</h4>
                    <div class="row m-t-0">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="col-form-label">
                                    Nome
                                    @if ($errors->has('name'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('name') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::text('name', $data['standard_column_auto_report']->name, ['class'=>'form-control', 'id'=>'name']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="report_objective_description" class="col-form-label">
                                    Objetivo / Descrição do relatório
                                    @if ($errors->has('report_objective_description'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('report_objective_description') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::textarea('report_objective_description', $data['standard_column_auto_report']->report_objective_description, ['class'=>'form-control', 'id'=>'report_objective_description', 'rows'=>'4']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clarifications_recommendations" class="col-form-label">
                                    Esclarecimentos e Recomendações
                                    @if ($errors->has('clarifications_recommendations'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('clarifications_recommendations') }}
                                        </small>
                                    @endif
                                </label>
                                {!! Form::textarea('clarifications_recommendations', $data['standard_column_auto_report']->clarifications_recommendations, ['class'=>'form-control', 'id'=>'clarifications_recommendations', 'rows'=>'4']) !!}
                            </div>
                        </div>
                    </div>

                    {{-- Parágrafos adicionais --}}
                    <div class="row m-t-10 m-b-20">
                        <div class="col-md-12">
                            <div id="accordion">
                                <div class="card card_file m-b-5">
                                    <div class="card-header" id="heading-additional_paragraphs">
                                        <h6 class="m-0">
                                            <a href="#additional_paragraphs" class="collapsed text-dark font-600" data-toggle="collapse" aria-expanded="false" aria-controls="additional_paragraphs">
                                                Parágrafos adicionais
                                            </a>
                                            <a id="new_paragraphs" href="#" class="text-dark font-600 pull-right">
                                                Novo parágrafo
                                                <i class="fa fa-plus m-l-5"></i>
                                            </a>
                                        </h6>
                                    </div>
                        
                                    <div id="additional_paragraphs" class="collapse" aria-labelledby="heading-additional_paragraphs" data-parent="#accordion">
                                        <div class="card-body row p-t-10 p-b-10">
                                            @php
                                                $count_paragraphs = 0;
                                            @endphp
                                            @foreach ($data['additional_paragraphs'] as $additional_paragraph)
                                                @php
                                                    $count_paragraphs++;
                                                @endphp
                                                <div class="item_additional_{{ $count_paragraphs }} items_paragraphs col-md-6" data-count_paragraphs="{{ $count_paragraphs }}">
                                                    <div class="form-group">
                                                        <label for="title_{{ $count_paragraphs }}" class="col-form-label">
                                                            Titulo
                                                            <a href="#" class="m-l-10 text-danger remov_paragraph_{{ $count_paragraphs }}">Remover parágrafo</a>
                                                        </label>
                                                        {!! Form::text('additional_paragraphs['.$count_paragraphs.'][title]', $additional_paragraph->title, ['class'=>'form-control', 'id'=>'title_'.$count_paragraphs]) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description_{{ $count_paragraphs }}" class="col-form-label">
                                                            Descrição
                                                        </label>
                                                        {!! Form::textarea('additional_paragraphs['.$count_paragraphs.'][description]', $additional_paragraph->description, ['class'=>'form-control', 'id'=>'description_'.$count_paragraphs, 'rows'=>'4']) !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                            <input type="hidden" id="count_paragraphs" value="{{ $count_paragraphs }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="header-title m-t-0">Informações coletadas dos arquivos</h4>
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

                    <div class="row m-t-10 m-b-20">
                        <div class="col-md-12">
                            <div id="accordion">
                                <div class="card card_file m-b-5">
                                    <div class="card-header" id="heading-topics_marked">
                                        <h6 class="m-0">
                                            <a href="#topics_marked" class="collapsed text-dark font-600" data-toggle="collapse" aria-expanded="false" aria-controls="topics_marked">
                                                Sub-tópicos marcados a cima
                                            </a>
                                        </h6>
                                    </div>
                        
                                    <div id="topics_marked" class="collapse" aria-labelledby="heading-topics_marked" data-parent="#accordion">
                                        <div class="card-body row p-t-10 p-b-10">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row m-t-10">
                        <div class="col-md-12">
                            {!! Form::submit('Gerar relatório', ['class'=>'my-btn btn btn-block btn-primary btn_generate_report disabled']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- Forms --}}
        {!! Form::open([
            'url'=>route('adm.automated_reporting.get_subtopic_status'),
            'id'=>'form_get_subtopic_status'
        ]) !!}
        {!! Form::close() !!}
        {!! Form::open([
            'url'=>route('adm.automated_reporting.update_subtopic_status'),
            'id'=>'form_update_subtopic_status'
        ]) !!}
        {!! Form::close() !!}
        

        {!! Form::open([
            'url'=>route('adm.automated_reporting.get_topic'),
            'id'=>'form_get_topic'
        ]) !!}
        {!! Form::close() !!}
        {!! Form::open([
            'url'=>route('adm.automated_reporting.update_topic'),
            'id'=>'form_update_topic'
        ]) !!}
        {!! Form::close() !!}
    {{-- Forms --}}

    @foreach ($data['files'] as $file)
        @php
            $file_name = substr($file['name'], 0, strpos($file['name'], '.'));
        @endphp
        <div class="file_read" data-file-name="{{ $file_name }}" style="display: none;">
            {{-- <div> --}}
                {!! $file['content'] !!}
        </div>
    @endforeach

@endsection