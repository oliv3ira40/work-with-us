<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Admin\Group;
use App\Models\Admin\CreatedPermission;
use App\Models\Admin\Permission;
use App\Models\Admin\UserSetting;

class VerifyUserPermissions
{
    public function handle($request, Closure $next)
    {
        $action = \Request::route()->action['as'] ?? '';
        if (\Auth::user())
        {
            $group_id = \Auth::user()->group_id;
            if ($group_id == null) return redirect()->route('adm.withoutPermission');

            $routes_user = Permission::where('group_id', $group_id)->get();
            foreach ($routes_user as $value) {
                $permissions_user[] = $value->CreatedPermission->route;
            }
            
            if (!in_array('developer', $permissions_user))
            {
            
                if (!in_array($action, $permissions_user))
                {
                    return redirect()->route('adm.withoutPermission');
                }
            }
        }
        
        return $next($request);
    }
}