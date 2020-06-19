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
			// dd($action);

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

					// Vagas
					[
						'permission'=>'adm.menu_jobs',
						'label'=>'Vagas',
						'url'=>'#',
						'link_btn'=>'jobs_id',
						'icon'=>'fa fa-th-large',
	
						'a-active'=>(in_array($action, [
							'adm.job_opportunities.list',
							'adm.job_opportunities.new',
							'adm.job_opportunities.edit',
							'adm.job_opportunities.alert'
						])) ? 'active' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.job_opportunities.list',
								'active_page'=>(in_array($action, ['adm.job_opportunities.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Nova vaga',
								'url'=>'adm.job_opportunities.new',
								'active_page'=>(in_array($action, ['adm.job_opportunities.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],

					// Config
					[
						'permission'=>'adm.user_registration',
						'label'=>'Registro de usuários',
						'url'=>'#',
						'link_btn'=>'user_registration_id',
						'icon'=>'fa fa-gear',
	
						'a-active'=>(in_array($action, [
							'adm.currency_available.list',
							'adm.schoolings_availables.list',
							'adm.mean_of_publ_vag.list',
							'adm.type_of_cont_avail.list',
							'adm.type_cours_avail.list'
						])) ? 'active' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Moedas disponíveis',
								'url'=>'adm.currency_available.list',
								'active_page'=>(in_array($action, ['adm.currency_available.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Escolararidades disponíveis',
								'url'=>'adm.schoolings_availables.list',
								'active_page'=>(in_array($action, ['adm.schoolings_availables.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Conhecimento da vaga',
								'url'=>'adm.mean_of_publ_vag.list',
								'active_page'=>(in_array($action, ['adm.mean_of_publ_vag.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Tipos de contrato',
								'url'=>'adm.type_of_cont_avail.list',
								'active_page'=>(in_array($action, ['adm.type_of_cont_avail.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Tipos de curso',
								'url'=>'adm.type_cours_avail.list',
								'active_page'=>(in_array($action, ['adm.type_cours_avail.list'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
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
					],
				];

			} elseif (HelpAdmin::IsUserCandidate())
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
					],

					// Vagas
					[
						'permission'=>'adm.menu_jobs',
						'label'=>'Vagas',
						'url'=>'#',
						'link_btn'=>'jobs_id',
						'icon'=>'fa fa-th-large',

						'a-active'=>(in_array($action, [
							'adm.job_opportunities.list',
						])) ? 'active' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.job_opportunities.list',
								'active_page'=>(in_array($action, ['adm.job_opportunities.list'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
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
					],
				];
			}
		}
	}