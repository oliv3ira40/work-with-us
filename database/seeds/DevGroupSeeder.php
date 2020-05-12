<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\Group;

class DevGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'hierarchy_level'	=>	'9999',
			'name'				=>	'Desenvolvedor',
			'tag'				=>	'developer',
			'tag_color'			=>	'#b02525',
		];
		if (Group::where('name', '=', $data['name'])->count()) {
			$group = Group::where('name', '=', $data['name'])->first();
			$group->update($data);
			echo "Grupo Desenvolvedor alterado!";
		} else {
			Group::create($data);
			echo "Grupo Desenvolvedor cadastrado!";
		}
    }
}
