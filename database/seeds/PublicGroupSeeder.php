<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\CreatedPermission;
use App\Models\Admin\Group;
use App\Models\Admin\Permission;

class PublicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'hierarchy_level'	=>	'1',
			'name'				=>	'Public',
			'tag'				=>	'public',
			'tag_color'			=>	'#109e84',
		];
		if (Group::where('name', '=', $data['name'])->count()) {
			$group = Group::where('name', '=', $data['name'])->first();
			$group->update($data);
			echo "Grupo Public alterado!";
		} else {
			Group::create($data);
			echo "Grupo Public cadastrado!";
		}
    }
}
