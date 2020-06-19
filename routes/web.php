<?php

use App\Http\Controllers\Peoples\AdministratorController;
use App\Models\Admin\Calleds\Product;
use App\Models\Admin\Calleds\ProductSeveritie;
use App\Models\Admin\Jobs\JobOpportunity;

Route::group(['middleware' => 'VerifyUserPermissions'], function(){

        Route::get('/', 'Admin\AdminController@index')->name('adm.index');

        // CreatedPermissions
            Route::get('/permissoes-criadas/lista', 'Admin\CreatedPermissionController@list')->name('adm.created_permissions.list');
                
            Route::get('/permissoes-criadas/nova', 'Admin\CreatedPermissionController@new')->name('adm.created_permissions.new');
            Route::post('/permissoes-criadas/salvar', 'Admin\CreatedPermissionController@save')->name('adm.created_permissions.save');
            
            Route::get('/permissoes-criadas/editar/{id}', 'Admin\CreatedPermissionController@edit')->name('adm.created_permissions.edit');
            Route::post('/permissoes-criadas/atualizar', 'Admin\CreatedPermissionController@update')->name('adm.created_permissions.update');
            
            Route::get('/permissoes-criadas/alerta/{id}', 'Admin\CreatedPermissionController@alert')->name('adm.created_permissions.alert');
            Route::post('/permissoes-criadas/deletar', 'Admin\CreatedPermissionController@delete')->name('adm.created_permissions.delete');
        // CreatedPermissions

        // Groups
            Route::get('/grupos/lista', 'Admin\GroupController@list')->name('adm.groups.list');
            
            Route::get('/grupos/novo', 'Admin\GroupController@new')->name('adm.groups.new');
            Route::post('/grupos/salvar', 'Admin\GroupController@save')->name('adm.groups.save');
            
            Route::get('/grupos/editar/{id}', 'Admin\GroupController@edit')->name('adm.groups.edit');
            Route::post('/grupos/atualizar', 'Admin\GroupController@update')->name('adm.groups.update');
            
            Route::get('/grupos/alerta/{id}', 'Admin\GroupController@alert')->name('adm.groups.alert');
            Route::post('/grupos/deletar', 'Admin\GroupController@delete')->name('adm.groups.delete');
        // Groups

        // User
            Route::get('/usuarios/lista', 'Admin\UserController@list')->name('adm.users.list');
            
            Route::get('/usuarios/novo', 'Admin\UserController@new')->name('adm.users.new');
            Route::post('/usuarios/salvar', 'Admin\UserController@save')->name('adm.users.save');
            
            Route::get('/usuarios/editar/{id}', 'Admin\UserController@edit')->name('adm.users.edit');
            Route::post('/usuarios/atualizar', 'Admin\UserController@update')->name('adm.users.update');
            
            Route::get('/usuarios/alerta/{id}', 'Admin\UserController@alert')->name('adm.users.alert');
            Route::post('/users/delete', 'Admin\UserController@delete')->name('adm.users.delete');

            Route::get('/usuarios/restaurar/{id}', 'Admin\UserController@toRestore')->name('adm.users.to_restore');

            Route::get('/usuarios/alerta-exclusao-definitiva/{id}', 'Admin\UserController@definitiveExclusionAlert')->name('adm.users.definitive_exclusion_alert');
            Route::post('/users/definitive-exclusion', 'Admin\UserController@definitiveExclusion')->name('adm.users.definitive_exclusion');
        // User

        // UserSetting
            Route::post('/user/update_dark_mode', 'Admin\UserSettingController@updateDarkMode')->name('adm.user.update_dark_mode');
        // UserSetting
            
        // Avatar
            Route::post('/avatars/change_user_avatar', 'Admin\AvatarController@changeUserAvatar')->name('adm.avatars.change_user_avatar');
        // Avatar

        // JobOpportunity
            Route::get('vagas-disponiveis',
                'Admin\Jobs\JobOpportunityController@list')
                ->name('adm.job_opportunities.list');

            Route::get('vagas-cadastro',
                'Admin\Jobs\JobOpportunityController@new')
                ->name('adm.job_opportunities.new');
            Route::post('vagas-save',
                'Admin\Jobs\JobOpportunityController@save')
                ->name('adm.job_opportunities.save');
            Route::match(['get', 'post'], 'vagas-get-cities-by-state',
                'Admin\Jobs\JobOpportunityController@getCitiesByState')
                ->name('adm.job_opportunities.get_cities_by_state');

            Route::get('vagas-edicao/{id}',
                'Admin\Jobs\JobOpportunityController@edit')
                ->name('adm.job_opportunities.edit');
            Route::post('vagas-update',
                'Admin\Jobs\JobOpportunityController@update')
                ->name('adm.job_opportunities.update');

            Route::get('vagas-alerta/{id}',
                'Admin\Jobs\JobOpportunityController@alert')
                ->name('adm.job_opportunities.alert');
            Route::post('vagas-delete',
                'Admin\Jobs\JobOpportunityController@delete')
                ->name('adm.job_opportunities.delete');

            Route::get('vagas-detalhes/{id}',
                'Admin\Jobs\JobOpportunityController@detail')
                ->name('adm.job_opportunities.detail');
        // JobOpportunity

        // ApplicationOfVacancie
        // ApplicationOfVacancie

        // personalInformations
            Route::get('informacoes-pessoais/cadastro',
                'Admin\PersoInformation\PersoInforController@new')
                ->name('adm.personal_informations.new');
            Route::post('perso-information/save',
                'Admin\PersoInformation\PersoInforController@save')
                ->name('adm.personal_informations.save');

            // CurrencyAvailable
                Route::get('moedas-disponiveis',
                'Admin\PersoInformation\CurrencyAvailableController@list')
                ->name('adm.currency_available.list');

                Route::get('moedas-cadastro',
                    'Admin\PersoInformation\CurrencyAvailableController@new')
                    ->name('adm.currency_available.new');
                Route::post('moedas-save',
                    'Admin\PersoInformation\CurrencyAvailableController@save')
                    ->name('adm.currency_available.save');

                Route::get('moedas-edicao/{id}',
                    'Admin\PersoInformation\CurrencyAvailableController@edit')
                    ->name('adm.currency_available.edit');
                Route::post('moedas-update',
                    'Admin\PersoInformation\CurrencyAvailableController@update')
                    ->name('adm.currency_available.update');

                Route::get('moedas-alerta/{id}',
                    'Admin\PersoInformation\CurrencyAvailableController@alert')
                    ->name('adm.currency_available.alert');
                Route::post('moedas-delete',
                    'Admin\PersoInformation\CurrencyAvailableController@delete')
                    ->name('adm.currency_available.delete');
            // CurrencyAvailable

            // SchoolingsAvailables
                Route::get('niveis-escolares-lista',
                    'Admin\PersoInformation\SchoolingAvailableController@list')
                    ->name('adm.schoolings_availables.list');

                Route::get('niveis-escolares-cadastro',
                    'Admin\PersoInformation\SchoolingAvailableController@new')
                    ->name('adm.schoolings_availables.new');
                Route::post('niveis-escolares-save',
                    'Admin\PersoInformation\SchoolingAvailableController@save')
                    ->name('adm.schoolings_availables.save');

                Route::get('niveis-escolares-edicao/{id}',
                    'Admin\PersoInformation\SchoolingAvailableController@edit')
                    ->name('adm.schoolings_availables.edit');
                Route::post('niveis-escolares-update',
                    'Admin\PersoInformation\SchoolingAvailableController@update')
                    ->name('adm.schoolings_availables.update');

                Route::get('niveis-escolares-alerta/{id}',
                    'Admin\PersoInformation\SchoolingAvailableController@alert')
                    ->name('adm.schoolings_availables.alert');
                Route::post('niveis-escolares-delete',
                    'Admin\PersoInformation\SchoolingAvailableController@delete')
                    ->name('adm.schoolings_availables.delete');
            // SchoolingsAvailables

            // MeanOfPublicizingVagancy
                Route::get('publicacao-de-vagas-lista',
                    'Admin\PersoInformation\MeanOfPublVagController@list')
                    ->name('adm.mean_of_publ_vag.list');

                Route::get('publicacao-de-vagas-cadastro',
                    'Admin\PersoInformation\MeanOfPublVagController@new')
                    ->name('adm.mean_of_publ_vag.new');
                Route::post('publicacao-de-vagas-save',
                    'Admin\PersoInformation\MeanOfPublVagController@save')
                    ->name('adm.mean_of_publ_vag.save');

                Route::get('publicacao-de-vagas-edicao/{id}',
                    'Admin\PersoInformation\MeanOfPublVagController@edit')
                    ->name('adm.mean_of_publ_vag.edit');
                Route::post('publicacao-de-vagas-update',
                    'Admin\PersoInformation\MeanOfPublVagController@update')
                    ->name('adm.mean_of_publ_vag.update');

                Route::get('publicacao-de-vagas-alerta/{id}',
                    'Admin\PersoInformation\MeanOfPublVagController@alert')
                    ->name('adm.mean_of_publ_vag.alert');
                Route::post('publicacao-de-vagas-delete',
                    'Admin\PersoInformation\MeanOfPublVagController@delete')
                    ->name('adm.mean_of_publ_vag.delete');
            // MeanOfPublicizingVagancy

            // TypeOfContractAvailable
                Route::get('tipos-contratos-disponiveis',
                    'Admin\PersoInformation\TypeOfContAvailController@list')
                    ->name('adm.type_of_cont_avail.list');

                Route::get('tipos-contratos-cadastro',
                    'Admin\PersoInformation\TypeOfContAvailController@new')
                    ->name('adm.type_of_cont_avail.new');
                Route::post('tipos-contratos-save',
                    'Admin\PersoInformation\TypeOfContAvailController@save')
                    ->name('adm.type_of_cont_avail.save');

                Route::get('tipos-contratos-edicao/{id}',
                    'Admin\PersoInformation\TypeOfContAvailController@edit')
                    ->name('adm.type_of_cont_avail.edit');
                Route::post('tipos-contratos-update',
                    'Admin\PersoInformation\TypeOfContAvailController@update')
                    ->name('adm.type_of_cont_avail.update');

                Route::get('tipos-contratos-alerta/{id}',
                    'Admin\PersoInformation\TypeOfContAvailController@alert')
                    ->name('adm.type_of_cont_avail.alert');
                Route::post('tipos-contratos-delete',
                    'Admin\PersoInformation\TypeOfContAvailController@delete')
                    ->name('adm.type_of_cont_avail.delete');
            // TypeOfContractAvailable

            // TypeOfCourseAvailable
                Route::get('tipos-cursos-disponiveis',
                    'Admin\PersoInformation\TypeCoursAvailController@list')
                    ->name('adm.type_cours_avail.list');

                Route::get('tipos-cursos-cadastro',
                    'Admin\PersoInformation\TypeCoursAvailController@new')
                    ->name('adm.type_cours_avail.new');
                Route::post('tipos-cursos-save',
                    'Admin\PersoInformation\TypeCoursAvailController@save')
                    ->name('adm.type_cours_avail.save');

                Route::get('tipos-cursos-edicao/{id}',
                    'Admin\PersoInformation\TypeCoursAvailController@edit')
                    ->name('adm.type_cours_avail.edit');
                Route::post('tipos-cursos-update',
                    'Admin\PersoInformation\TypeCoursAvailController@update')
                    ->name('adm.type_cours_avail.update');

                Route::get('tipos-cursos-alerta/{id}',
                    'Admin\PersoInformation\TypeCoursAvailController@alert')
                    ->name('adm.type_cours_avail.alert');
                Route::post('tipos-cursos-delete',
                    'Admin\PersoInformation\TypeCoursAvailController@delete')
                    ->name('adm.type_cours_avail.delete');
            // TypeOfCourseAvailable
        // personalInformations

    });	/*Fecha grupo de verificação de permissões*/
        
    Route::get('/sem-permissao', 'Admin\AdminController@withoutPermission')->name('adm.withoutPermission');

    Auth::routes();
    
    Route::post('check_email', 'Auth\LoginCOntroller@checkEmail')->name('adm.check_email');
    Route::get('bem-vindo-de-volta/{id}', 'Auth\LoginController@welcomeBack')->name('adm.welcome_back');
    
    Route::get('novo-candidato/{email}', 'Auth\LoginController@newCandidate')->name('adm.new_candidate');
    Route::post('save-candidate', 'Auth\LoginController@saveCandidate')->name('adm.save_candidate');

    // AUTH
        Route::get('esqueci-a-senha', 'Admin\ResetPasswordController@resetPassword')->name('adm.reset_password');
        Route::post('send-new-password', 'Admin\ResetPasswordController@sendNewPassword')->name('adm.send_new_password');
    // AUTHv