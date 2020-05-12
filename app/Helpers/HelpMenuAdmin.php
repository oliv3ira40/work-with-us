<?php

	namespace App\Helpers;
	
	use App\Helpers\HelpAdmin;

	/**
	* HelpMenuAdmin
	*/
	class HelpMenuAdmin
	{
		public static function SideMenu()
		{
			$action = \Request::route()->action['as'] ?? '';
			$auth_user = \Auth::user();

			if (HelpAdmin::IsUserDeveloper())
			{
				
				return [
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
	
					// MENU Desenvolvedor
					[
						'permission'=>'adm.menu_developer',
						'name_menu'=>'Desenvolvedor',
					],
					// Usuários
					[
						'permission'=>'adm.menu_users',
						'label'=>'Usuários',
						'url'=>'#',
						'link_btn'=>'user_id',
						'icon'=>'fa fa-users',
	
						'a-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.users.list',
								'active_page'=>(in_array($action, ['adm.users.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo usuário',
								'url'=>'adm.users.new',
								'active_page'=>(in_array($action, ['adm.users.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Grupo
					[
						'permission'=>'adm.menu_groups',
						'label'=>'Grupo',
						'url'=>'#',
						'link_btn'=>'group_id',
						'icon'=>'fa fa-th-large',
	
						'a-active'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.groups.list',
								'active_page'=>(in_array($action, ['adm.groups.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo grupo',
								'url'=>'adm.groups.new',
								'active_page'=>(in_array($action, ['adm.groups.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Permissões
					[
						'permission'=>'adm.menu_created_permissions',
						'label'=>'Permissões',
						'url'=>'#',
						'link_btn'=>'permi_id',
						'icon'=>'fa fa-list',
	
						'a-active'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.created_permissions.list',
								'active_page'=>(in_array($action, ['adm.created_permissions.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novas permissões',
								'url'=>'adm.created_permissions.new',
								'active_page'=>(in_array($action, ['adm.created_permissions.new'])) ? 'active-page' : '',
							],
						],
						'line'=>true,
					],
				];

			} elseif (HelpAdmin::IsUserAdministrator())
			{
				
				return [
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
				];

			} else
			{
				return [
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
				];
			}
		}
	}