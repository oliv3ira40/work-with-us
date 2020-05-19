@extends('Admin.layout.layout')
@section('title', 'Portal do Candidato')

@section('content')
    <style>
        .dropify-wrapper {
            height: 100px;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {{-- <p class="text-muted m-b-30 font-13">
                    You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                </p> --}}
                
                {!! Form::open(['url' => route('adm.personal_informations.save')]) !!}
                    <h4 class="m-t-10 mb-0 header-title">Informações pessoais</h4>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Seu curriculo</label>
                            <input type="file" class="curriculum" data-max-file-size="2M"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Foto de perfil</label>
                            <input type="file" class="profile_picture" data-max-file-size="2M"/>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="inputEmail4" class="col-form-label pt-0 p-b-5">Nome completo</label>

                            {!! Form::text('full_name', HelpAdmin::completName($data['user']), ['class'=>'form-control', 'id'=>'full_name']) !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Data de Nascimento</label>
                            
                            {!! Form::date('full_name', null, ['class'=>'form-control', 'id'=>'full_name', 'placeholder'=>'mm/dd/yyyy']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">RG</label>

                            {!! Form::text('rg', null, ['class'=>'form-control', 'id'=>'full_name']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">CPF</label>

                            {!! Form::text('cpf', null, ['class'=>'form-control', 'id'=>'full_name']) !!}
                        </div>
                    </div>

                    <h4 class="m-t-10 mb-0 header-title">Informações de contato</h4>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label pt-0 p-b-5">E-mail</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">LinkedIn</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">
                                Telefones
                                <small>DDD + Número (Pressione ENTER para adicionar) Telefones</small>
                            </label>
                            <select multiple data-role="tagsinput">
                            </select>
                        </div>
                    </div>
                    
                    <h4 class="m-t-10 mb-0 header-title">Endereço</h4>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4" class="col-form-label pt-0 p-b-5">CEP</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Bairro</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Estado</label>
                            <select class="form-control select2">
                                <option value="HI">Selecione</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Cidade</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                    </div>

                    <h4 class="m-t-10 mb-0 header-title">Pretensão salarial</h4>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label pt-0 p-b-5">Moeda</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Valor</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                    </div>

                    <h4 class="m-t-10 mb-0 header-title">Experiência profissional</h4>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label pt-0 p-b-5">Cargo</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Empresa</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                    </div>

                    <h4 class="m-t-10 mb-0 header-title">Educação</h4>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="col-form-label pt-0 p-b-5">Escolaridade</label>
                            <select class="form-control select2">
                                <option value="HI">Selecione</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Instituição</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Curso</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Tipo de curso</label>
                            <select class="form-control select2">
                                <option value="HI">Selecione</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Mês de início</label>
                            <select class="form-control select2">
                                <option value="Janeiro">Janeiro</option>
                                <option value="fevereiro">fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>

                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Ano de início</label>
                            <select class="form-control select2">
                                <option value="HI">Selecione</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Mês de conclusão</label>
                            <select class="form-control select2">
                                <option value="Janeiro">Janeiro</option>
                                <option value="fevereiro">fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>

                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">Ano de conclusão
                            </label>
                            <select class="form-control select2">
                                <option value="HI">Selecione</option>
                            </select>
                        </div>
                    </div>

                    <h4 class="m-t-10 mb-0 header-title">Informações adicionais</h4>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4" class="col-form-label pt-0 p-b-5">
                                Você possui alguma deficiência comprovada por laudo médico?
                            </label>
                            <select class="form-control select2">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">
                                Anexe o seu laudo aqui
                            </label>
                            <input type="file" class="curriculum" data-max-file-size="2M"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4" class="col-form-label pt-0 p-b-5">
                                Como você ficou sabendo desta vaga?
                            </label>
                            <select class="form-control select2">
                                <option value="HI">Selecione</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Salvar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection