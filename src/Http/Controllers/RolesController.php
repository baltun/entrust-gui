<?php namespace Acoustep\EntrustGui\Http\Controllers;

use Acoustep\EntrustGui\Gateways\RoleGateway;
use Illuminate\Config\Repository as Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * This file is part of Entrust GUI,
 * A Laravel 5 GUI for Entrust.
 *
 * @license MIT
 * @package Acoustep\EntrustGui
 */
class RolesController extends ManyToManyController
{
    /**
     * Create a new RolesController instance.
     *
     * @param Request $request
     * @param Config $config
     * @param RoleGateway $gateway
     *
     * @return void
     */
    public function __construct(Request $request, Config $config, RoleGateway $model)
    {
        parent::__construct($request, $config, $model, 'roles', 'permission');
    }

    public function users($id)
    {
        $model = $this->gateway->find($id);
        $roleDisplayName = $model->display_name;
//        dd($roleDisplayName);
        $roleUsersModel = DB::select(
            DB::raw(
                "SELECT users.id, users.name, users.email, departments.name as 'department_name' from users
                INNER JOIN role_user ON users.id = role_user.user_id
                LEFT JOIN departments ON users.department_id = departments.id
                WHERE (role_user.role_id = $id)"
            )
        );

//        dd($roleUsersModel);

        return view('entrust-gui::roles.users', compact('roleUsersModel', 'roleDisplayName'));
    }

}
