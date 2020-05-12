<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\CreatedPermission;

class CreatedPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [
            [
                'name'=>'Página inicial - Admin',
                'route'=>'adm.index',
            ],
            [
                'name'=>'Usuário desenvolvedor',
                'route'=>'developer',
            ],

            // CreatedPermissions
                [
                    'name'=>'lista - Permissões criadas',
                    'route'=>'adm.created_permissions.list',
                ],

                [
                    'name'=>'Nova - Permissões criadas',
                    'route'=>'adm.created_permissions.new',
                ],
                [
                    'name'=>'Salvar - Permissões criadas',
                    'route'=>'adm.created_permissions.save',
                ],

                [
                    'name'=>'Editar - Permissões criadas',
                    'route'=>'adm.created_permissions.edit',
                ],
                [
                    'name'=>'Atualizar - Permissões criadas',
                    'route'=>'adm.created_permissions.update',
                ],

                [
                    'name'=>'Alerta de exclusão - Permissões criadas',
                    'route'=>'adm.created_permissions.alert',
                ],
                [
                    'name'=>'Excluir - Permissões criadas',
                    'route'=>'adm.created_permissions.delete',
                ],
            // CreatedPermissions

            // Groups
                [
                    'name'=>'Lista - Grupos',
                    'route'=>'adm.groups.list',
                ],

                [
                    'name'=>'Novo - Grupos',
                    'route'=>'adm.groups.new',
                ],
                [
                    'name'=>'Salvar - Grupos',
                    'route'=>'adm.groups.save',
                ],

                [
                    'name'=>'Editar - Grupos',
                    'route'=>'adm.groups.edit',
                ],
                [
                    'name'=>'Atualizar - Grupos',
                    'route'=>'adm.groups.update',
                ],

                [
                    'name'=>'Alerta de exclusão - Grupos',
                    'route'=>'adm.groups.alert',
                ],
                [
                    'name'=>'Excluir - Grupos',
                    'route'=>'adm.groups.delete',
                ],
            // Groups

            // User
                [
                    'name'=>'Lista - Usuários',
                    'route'=>'adm.users.list',
                ],

                [
                    'name'=>'Novo - Usuários',
                    'route'=>'adm.users.new',
                ],
                [
                    'name'=>'Salvar - Usuários',
                    'route'=>'adm.users.save',
                ],

                [
                    'name'=>'Editar - Usuários',
                    'route'=>'adm.users.edit',
                ],
                [
                    'name'=>'Atualizar - Usuários',
                    'route'=>'adm.users.update',
                ],

                [
                    'name'=>'Alerta de exclusão - Usuários',
                    'route'=>'adm.users.alert',
                ],
                [
                    'name'=>'Excluir - Usuários',
                    'route'=>'adm.users.delete',
                ],
                
                [
                    'name'=>'Restaurar - Usuários',
                    'route'=>'adm.users.to_restore',
                ],

                [
                    'name'=>'Alerta de exclusao definitiva',
                    'route'=>'adm.users.definitive_exclusion_alert',
                ],
                [
                    'name'=>'Exclusao definitiva - Usuários',
                    'route'=>'adm.users.definitive_exclusion',
                ],

                [
                    'name'=>'Editar grupo - Usuários',
                    'route'=>'adm.users.edit_group',
                ],
                [
                    'name'=>'Editar outros usuários - Usuários',
                    'route'=>'adm.users.edit_other_users',
                ],
            // User

            // Menus
                [
                    'name'=>'Menu - Grupos',
                    'route'=>'adm.menu_groups',
                ],
                [
                    'name'=>'Menu - Permissões criadas',
                    'route'=>'adm.menu_created_permissions',
                ],
                [
                    'name'=>'Menu - Usuários',
                    'route'=>'adm.menu_users',
                ],
                [
                    'name'=>'Menu - desenvolvedor',
                    'route'=>'adm.menu_developer',
                ],
            // Menus
            
            // UserSetting
                [
                    'name'=>'Atualizar modo escuro - Configuração do usuário',
                    'route'=>'adm.user.update_dark_mode',
                ],
            // UserSetting
            
            // Avatar
                [
                    'name'=>'Alterar avatar do usuário - Avatar',
                    'route'=>'adm.avatars.change_user_avatar',
                ],
            // Avatar
        ];

        if (CreatedPermission::all()->count() == 0) {
            
            $n = 0;
            foreach ($arrays as $key => $array) {
                CreatedPermission::create($array);
                echo ++$n . " - Permissão cadastrada!";
            }

        }
    }
}