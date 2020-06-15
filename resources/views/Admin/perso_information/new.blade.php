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
                
                {!! Form::open(['url' => route('adm.personal_informations.save'), 'files'=>'true']) !!}
                    <h4 class="m-t-10 mb-0 header-title">Informações pessoais</h4>
                    <div class="form-row m-t-10">
                        <div class="form-group col-md-6">
                            <label for="curriculum" class="col-form-label pt-0 p-b-5">Seu curriculo</label>
                            
                            {!! Form::file('curriculum[path]', [
                                    'class'=>'form-control curriculum',
                                    'id'=>'curriculum',
                                    'data-max-file-size'=>'2M'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="profile_picture" class="col-form-label pt-0 p-b-5">Foto de perfil</label>

                            {!! Form::file('perso_information[profile_picture]', [
                                'class'=>'form-control profile_picture',
                                'id'=>'profile_picture',
                                'data-max-file-size'=>'2M'
                            ]) !!}
                        </div>

                        <div class="form-group col-md-8">
                            <label for="full_name" class="col-form-label pt-0 p-b-5">Nome completo</label>

                            {!! Form::text('perso_information[full_name]', HelpAdmin::completName($data['user']), [
                                'class'=>'form-control',
                                'id'=>'full_name'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_birth" class="col-form-label pt-0 p-b-5">Data de Nascimento</label>
                            
                            {!! Form::date('perso_information[date_of_birth]', null, [
                                'class'=>'form-control',
                                'id'=>'date_of_birth',
                                'placeholder'=>'mm/dd/yyyy'
                            ]) !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="rg" class="col-form-label pt-0 p-b-5">RG</label>

                            {!! Form::text('perso_information[rg]', null, [
                                'class'=>'form-control mask_rg',
                                'id'=>'rg'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf" class="col-form-label pt-0 p-b-5">CPF</label>

                            {!! Form::text('perso_information[cpf]', null, [
                                'class'=>'form-control mask_cpf',
                                'id'=>'cpf'
                            ]) !!}
                        </div>
                    </div>
                    <hr>

                    <h4 class="m-t-10 mb-0 header-title">Informações de contato</h4>
                    <small><b>Usaremos essas informações para entrar em contato com você</b></small>

                    <div class="form-row m-t-10">
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label pt-0 p-b-5">E-mail</label>

                            {!! Form::email('contact_information[email]', $data['user']->email, [
                                'class'=>'form-control',
                                'id'=>'email'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="linkedin" class="col-form-label pt-0 p-b-5">LinkedIn</label>
                            
                            {!! Form::text('contact_information[linkedin]', null, [
                                'class'=>'form-control',
                                'id'=>'linkedin'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-12">
                            <label for="telephone" class="col-form-label pt-0 p-b-5">
                                Telefones
                                <small>DDD + Número (Pressione ENTER para adicionar) Telefones</small>
                            </label>

                            {{-- implement mask_telefone --}}
                            <select multiple data-role="tagsinput" name="phones_for_contacts[]" id="telephone"></select>
                        </div>
                    </div>
                    <hr>
                    
                    <h4 class="m-t-10 mb-0 header-title">Endereço</h4>
                    <div class="form-row m-t-10">
                        <div class="form-group col-md-4">
                            <label for="zip_code" class="col-form-label pt-0 p-b-5">CEP</label>

                            {!! Form::text('address[zip_code]', null, [
                                'class'=>'form-control',
                                'id'=>'zip_code'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state" class="col-form-label pt-0 p-b-5">Estado</label>
                            
                            {!! Form::text('address[state]', null, [
                                'class'=>'form-control',
                                'id'=>'state'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city" class="col-form-label pt-0 p-b-5">Cidade</label>

                            {!! Form::text('address[city]', null, [
                                'class'=>'form-control',
                                'id'=>'city'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="street" class="col-form-label pt-0 p-b-5">Rua</label>

                            {!! Form::text('address[street]', null, [
                                'class'=>'form-control',
                                'id'=>'street'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="neighborhood" class="col-form-label pt-0 p-b-5">Bairro</label>

                            {!! Form::text('address[neighborhood]', null, [
                                'class'=>'form-control',
                                'id'=>'neighborhood'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complement" class="col-form-label pt-0 p-b-5">Complemento</label>

                            {!! Form::text('address[complement]', null, [
                                'class'=>'form-control',
                                'id'=>'complement'
                            ]) !!}
                        </div>
                    </div>
                    <hr>

                    <h4 class="m-t-10 mb-0 header-title">Pretensão salarial</h4>
                    <div class="form-row m-t-10">
                        <div class="form-group col-md-6">
                            <label for="wages_claims" class="col-form-label pt-0 p-b-5">Moeda</label>
                            
                            <select class="form-control select2" name="wages_claims[currencie_available_id]">
                                @php
                                    $default_currency = $data['currencies_availables']->where('code', 'R$')->first();
                                @endphp
                                <option selected value="{{ $default_currency->id }}">
                                    {{ $default_currency->code }} -
                                    {{ $default_currency->currency }}
                                </option>

                                {{-- @foreach ($data['currencies_availables'] as $currency_available)
                                    <option value="{{ $currency_available->id }}">
                                        {{ $currency_available->code }} -
                                        {{ $currency_available->currency }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="value" class="col-form-label pt-0 p-b-5">Valor</label>
                            
                            {!! Form::text('wages_claims[value]', null, [
                                'class'=>'form-control currency',
                                'id'=>'value'
                            ]) !!}
                        </div>
                    </div>
                    <hr>

                    {{--
                        i_dont_have_experience
                        office
                        company
                        currencie_available_id
                        value
                        description
                        starting_month
                        starting_year
                        work_here_currently
                        conclusion_month
                        conclusion_year
                        benefits
                        type_of_contract_id
                    --}}
                    <h4 class="m-t-10 mb-0 header-title">Experiência profissional</h4>
                    <div class="form-row m-t-10">
                        <div class="form-group col-md-6">
                            <label for="office" class="col-form-label pt-0 p-b-5">Cargo</label>
                            
                            {!! Form::text('professionals_experiences[office]', null, [
                                'class'=>'form-control',
                                'id'=>'office'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="company" class="col-form-label pt-0 p-b-5">Empresa</label>
                            
                            {!! Form::text('professionals_experiences[company]', null, [
                                'class'=>'form-control',
                                'id'=>'company'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-12">
                            <div class="custom-control custom-checkbox">
                                {!! Form::checkbox('professionals_experiences[i_dont_have_experience]', 1, false, [
                                    'class'=>'custom-control-input',
                                    'id'=>'i_dont_have_experience'
                                ]) !!}
                                <label class="custom-control-label" for="i_dont_have_experience">
                                    Não possuo experiência
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="m-t-10 mb-0 header-title">Educação</h4>
                    <div class="form-row m-t-10">
                        <div class="form-group col-md-6">
                            <label for="schooling_available_id" class="col-form-label pt-0 p-b-5">Escolaridade</label>

                            <select id="schooling_available_id" class="form-control select2" name="educations[schooling_available_id]">
                                @foreach ($data['schoolchildrens_availables'] as $schoolchildren_available)
                                    <option value="{{ $schoolchildren_available->id }}" data-compound_register="{{ $schoolchildren_available->compound_register }}">
                                        {{ $schoolchildren_available->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="institution" class="col-form-label pt-0 p-b-5">Instituição</label>
                            
                            {!! Form::text('educations[institution]', null, [
                                'class'=>'form-control',
                                'id'=>'institution'
                            ]) !!}
                        </div>
                        <div class="div_compound_register col-md-12" style="display: none;">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="course" class="col-form-label pt-0 p-b-5">Curso</label>
                                    
                                    {!! Form::text('educations[course]', null, [
                                        'class'=>'form-control',
                                        'id'=>'course'
                                    ]) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for="type_of_course_id" class="col-form-label pt-0 p-b-5">Tipo de curso</label>
                                    <select class="form-control select2" name="educations[type_of_course_id]">
                                        <option value="">Selecione...</option>
                                        @foreach ($data['types_of_courses_availables'] as $type_of_course_available)
                                            <option value="{{ $type_of_course_available->id }}">
                                                {{ $type_of_course_available->name }}    
                                            </option>                                
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="starting_month" class="col-form-label pt-0 p-b-5">Mês de início</label>
                                    <select id="starting_month" class="form-control select2" name="educations[starting_month]">
                                        <option value="">Selecione...</option>
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
                                <div class="col-md-3">
                                    <label for="starting_year" class="col-form-label pt-0 p-b-5">Ano de início</label>
                                    <select id="starting_year" class="form-control select2" name="educations[starting_year]">
                                        <option value="">Selecione...</option>
                                        @for ($i = 0; $i <= 80; $i++)
                                            @php
                                                $year = date('Y', strtotime('-'.$i.' year'));
                                            @endphp
        
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="conclusion_month" class="col-form-label pt-0 p-b-5">Mês de conclusão</label>
                                    <select id="conclusion_month" class="form-control select2" name="educations[conclusion_month]">
                                        <option value="">Selecione...</option>
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
                                <div class="col-md-3">
                                    <label for="conclusion_year" class="col-form-label pt-0 p-b-5">Ano de conclusão
                                    </label>
                                    <select id="conclusion_year" class="form-control select2" name="educations[conclusion_year]">
                                        <option value="">Selecione...</option>
                                        @for ($i = -6; $i <= 80; $i++)
                                            @php
                                                $year = date('Y', strtotime('-'.$i.' year'));
                                            @endphp
        
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="m-t-10 mb-0 header-title">Informações adicionais</h4>
                    <div class="form-row m-t-10">
                        <div class="form-group col-md-12">
                            <label for="disability_proven_by_medical_report" class="col-form-label pt-0 p-b-5">
                                Você possui alguma deficiência comprovada por laudo médico?
                            </label>
                            <select id="disability_proven_by_medical_report" class="form-control select2" name="additionals_informations[disability_proven_by_medical_report]">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="medical_report_disab_id" class="col-form-label pt-0 p-b-5">
                                Anexe o seu laudo aqui
                            </label>
                            <input id="medical_report_disab_id" type="file" class="curriculum" name="additionals_informations[medical_report_path]" data-max-file-size="2M"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="mean_public_vacancie_id" class="col-form-label pt-0 p-b-5">
                                Como você ficou sabendo desta vaga?
                            </label>
                            <select id="mean_public_vacancie_id" class="form-control select2" name="additionals_informations[mean_public_vacancie_id]">
                                @foreach ($data['mean_of_publicizing_vagancy'] as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>

                    <button type="submit" class="btn btn-block btn-primary">Salvar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection