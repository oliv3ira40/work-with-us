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
        // JobOpportunity

        // personalInformations
            Route::get('informacoes-pessoais/cadastro',
                'Admin\PersoInformation\PersoInforController@new')
                ->name('adm.personal_informations.new');
            Route::post('perso-information/save',
                'Admin\PersoInformation\PersoInforController@save')
                ->name('adm.personal_informations.save');

            // CurrencyAvailable
                Route::get('moedas-disponiveis',
                'Admin\Jobs\CurrencyAvailableController@list')
                ->name('adm.currency_available.list');

                Route::get('moedas-cadastro',
                    'Admin\Jobs\CurrencyAvailableController@new')
                    ->name('adm.currency_available.new');
                Route::post('moedas-save',
                    'Admin\Jobs\CurrencyAvailableController@save')
                    ->name('adm.currency_available.save');

                Route::get('moedas-edicao/{id}',
                    'Admin\Jobs\CurrencyAvailableController@edit')
                    ->name('adm.currency_available.edit');
                Route::post('moedas-update',
                    'Admin\Jobs\CurrencyAvailableController@update')
                    ->name('adm.currency_available.update');

                Route::get('moedas-alerta/{id}',
                    'Admin\Jobs\CurrencyAvailableController@alert')
                    ->name('adm.currency_available.alert');
                Route::post('moedas-delete',
                    'Admin\Jobs\CurrencyAvailableController@alert')
                    ->name('adm.currency_available.delete');
            // CurrencyAvailable

            // Education
                Route::get('moedas-disponiveis',
                    'Admin\Jobs\EducationController@list')
                    ->name('adm.education.list');

                Route::get('moedas-cadastro',
                    'Admin\Jobs\EducationController@new')
                    ->name('adm.education.new');
                Route::post('moedas-save',
                    'Admin\Jobs\EducationController@save')
                    ->name('adm.education.save');

                Route::get('moedas-edicao/{id}',
                    'Admin\Jobs\EducationController@edit')
                    ->name('adm.education.edit');
                Route::post('moedas-update',
                    'Admin\Jobs\EducationController@update')
                    ->name('adm.education.update');

                Route::get('moedas-alerta/{id}',
                    'Admin\Jobs\EducationController@alert')
                    ->name('adm.education.alert');
                Route::post('moedas-delete',
                    'Admin\Jobs\EducationController@alert')
                    ->name('adm.education.delete');
            // Education
            
            // MeanOfPublicizingVagancy
                Route::get('moedas-disponiveis',
                    'Admin\Jobs\MeanOfPublVagController@list')
                    ->name('adm.mean_of_publ_vag.list');

                Route::get('moedas-cadastro',
                    'Admin\Jobs\MeanOfPublVagController@new')
                    ->name('adm.mean_of_publ_vag.new');
                Route::post('moedas-save',
                    'Admin\Jobs\MeanOfPublVagController@save')
                    ->name('adm.mean_of_publ_vag.save');

                Route::get('moedas-edicao/{id}',
                    'Admin\Jobs\MeanOfPublVagController@edit')
                    ->name('adm.mean_of_publ_vag.edit');
                Route::post('moedas-update',
                    'Admin\Jobs\MeanOfPublVagController@update')
                    ->name('adm.mean_of_publ_vag.update');

                Route::get('moedas-alerta/{id}',
                    'Admin\Jobs\MeanOfPublVagController@alert')
                    ->name('adm.mean_of_publ_vag.alert');
                Route::post('moedas-delete',
                    'Admin\Jobs\MeanOfPublVagController@alert')
                    ->name('adm.mean_of_publ_vag.delete');
            // MeanOfPublicizingVagancy
            
            // TypeOfContractAvailable
                Route::get('moedas-disponiveis',
                    'Admin\Jobs\TypeOfContAvailController@list')
                    ->name('adm.type_of_cont_avail.list');

                Route::get('moedas-cadastro',
                    'Admin\Jobs\TypeOfContAvailController@new')
                    ->name('adm.type_of_cont_avail.new');
                Route::post('moedas-save',
                    'Admin\Jobs\TypeOfContAvailController@save')
                    ->name('adm.type_of_cont_avail.save');

                Route::get('moedas-edicao/{id}',
                    'Admin\Jobs\TypeOfContAvailController@edit')
                    ->name('adm.type_of_cont_avail.edit');
                Route::post('moedas-update',
                    'Admin\Jobs\TypeOfContAvailController@update')
                    ->name('adm.type_of_cont_avail.update');

                Route::get('moedas-alerta/{id}',
                    'Admin\Jobs\TypeOfContAvailController@alert')
                    ->name('adm.type_of_cont_avail.alert');
                Route::post('moedas-delete',
                    'Admin\Jobs\TypeOfContAvailController@alert')
                    ->name('adm.type_of_cont_avail.delete');
            // TypeOfContractAvailable
            
            // TypeOfCourseAvailable
                Route::get('moedas-disponiveis',
                    'Admin\Jobs\TypeCoursAvailController@list')
                    ->name('adm.type_cours_avail.list');

                Route::get('moedas-cadastro',
                    'Admin\Jobs\TypeCoursAvailController@new')
                    ->name('adm.type_cours_avail.new');
                Route::post('moedas-save',
                    'Admin\Jobs\TypeCoursAvailController@save')
                    ->name('adm.type_cours_avail.save');

                Route::get('moedas-edicao/{id}',
                    'Admin\Jobs\TypeCoursAvailController@edit')
                    ->name('adm.type_cours_avail.edit');
                Route::post('moedas-update',
                    'Admin\Jobs\TypeCoursAvailController@update')
                    ->name('adm.type_cours_avail.update');

                Route::get('moedas-alerta/{id}',
                    'Admin\Jobs\TypeCoursAvailController@alert')
                    ->name('adm.type_cours_avail.alert');
                Route::post('moedas-delete',
                    'Admin\Jobs\TypeCoursAvailController@alert')
                    ->name('adm.type_cours_avail.delete');
            // TypeOfCourseAvailable
        // personalInformations
        
    });	/*Fecha grupo de verificação de permissões*/
        
    Route::get('/sem-permissao', 'Admin\AdminController@withoutPermission')->name('adm.withoutPermission');

    Auth::routes();
    Route::post('check_email', 'Auth\LoginCOntroller@checkEmail')->name('adm.check_email');
    
    Route::get('bem-vindo-de-volta/{id}', 'Auth\LoginCOntroller@welcomeBack')->name('adm.welcome_back');

    // AUTH
        Route::get('esqueci-a-senha', 'Admin\ResetPasswordController@resetPassword')->name('adm.reset_password');
        Route::post('send-new-password', 'Admin\ResetPasswordController@sendNewPassword')->name('adm.send_new_password');
    // AUTHv