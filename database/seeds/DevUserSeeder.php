<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\User;

class DevUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'group_id'=>'1',
			'first_name'=>'Augusto',
			'last_name'=>'Cesar',
			'email'=>'oliv3ira40@hotmail.com',
			'cpf'=>'11869530470',
			'password'=>bcrypt('123')
		];
		if (User::where('email', '=', $data['email'])->count()) {
			$user = User::where('email', '=', $data['email'])->first();
			$user->update($data);
			echo "Usuario alterado!";
		} else {
			User::create($data);
			echo "Usuario cadastrado!";
		}
    }
}
