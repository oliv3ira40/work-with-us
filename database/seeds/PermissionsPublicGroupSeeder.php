<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\CreatedPermission;
use App\Models\Admin\Group;
use App\Models\Admin\Permission;

class PermissionsPublicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $public_group = Group::find(2);
        $data['group_id'] = $public_group->id;

        if ($public_group->Permission->count() == 0) {
            $adm_index_permission = CreatedPermission::where('route', 'adm.index')->first();
            $data['created_permission_id'] = $adm_index_permission->id;
            
            Permission::create($data);
            echo "Permissão adicionada ao grupo Public";
        } else {
            echo "O grupo Public já possuí permissão";
        }
    }
}
