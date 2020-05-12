<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\CreatedPermission;
use App\Models\Admin\Group;
use App\Models\Admin\Permission;

class PermissionsDevGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev_group = Group::find(1);
        $data['group_id'] = $dev_group->id;

        if ($dev_group->Permission->count() == 0) {
            $developer_permission = CreatedPermission::where('route', 'developer')->first();
            $data['created_permission_id'] = $developer_permission->id;
            
            Permission::create($data);
            echo "Permissão adicionada ao grupo Desenvolvedor";
        } else {
            echo "O grupo Desenvolvedor já possuí permissão";
        }
    }
}
