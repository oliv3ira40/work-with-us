<?php

use App\Http\Controllers\Peoples\AdministratorController;
use App\Models\Admin\Calleds\Product;
use App\Models\Admin\Calleds\ProductSeveritie;

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
            
        // personalInformations
            Route::get('informacoes-pessoais/cadastro',
                'Admin\PersoInformation\PersoInforController@new')
                ->name('adm.personal_informations.new');
            Route::post('perso-information/save',
                'Admin\PersoInformation\PersoInforController@save')
                ->name('adm.personal_informations.save');
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