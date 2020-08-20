<?php namespace Acoustep\EntrustGui\Http\Controllers;

use App\Departments;
use Illuminate\Routing\Controller as Controller;
use Acoustep\EntrustGui\Gateways\UserGateway;
use Illuminate\Http\Request;
use Watson\Validating\ValidationException;
use Illuminate\Config\Repository as Config;

/**
 * This file is part of Entrust GUI,
 * A Laravel 5 GUI for Entrust.
 *
 * @license MIT
 * @package Acoustep\EntrustGui
 */
class DepartmentsController extends Controller
{

//    protected $gateway;
//    protected $request;
//    protected $role;
//    protected $config;

    /**
     * Create a new UsersController instance.
     *
     * @param Request $request
     * @param UserGateway $gateway
     * @param Config $config
     *
     * @return void
     */
//    public function __construct(Request $request, UserGateway $gateway, Config $config)
//    {
//        $this->config = $config;
//        $this->request = $request;
//        $this->gateway = $gateway;
//        $role_class = $this->config->get('entrust.role');
//        $this->role = new $role_class;
//    }

    /**
     * Display a listing of the resource.
     * GET /roles
     *
     * @return Response
     */
    public function index()
    {
        $departments = Departments::all();

        return view(
            'entrust-gui::departments.index',
            compact(
                'departments'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     * GET /roles/create
     *
     * @return Response
     */
    public function create()
    {
//        $user_class = $this->config->get('auth.providers.users.model');
//        $user = new $user_class;
//        $roles = $this->role->pluck('name', 'id');
        $department = new Departments();

        return view(
            'entrust-gui::departments.create',
            compact(
//                'user',
//                'roles'
                'department'
            )

        );
    }

    /**
     * Store a newly created resource in storage.
     * POST /roles
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $department = new Departments();
            $department->name = $request->name;
            $department->save();
        } catch (ValidationException $e) {
            return redirect(route('entrust-gui::users.create'))
                ->withErrors($e->getErrors())
                ->withInput();
        }
        return redirect(route('entrust-gui::departments.index'))
            ->withSuccess(trans('entrust-gui::departments.created'));
  
    }

    /**
     * Show the form for editing the specified resource.
     * GET /roles/{id}/edit
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $department = Departments::where('id', $id)->first();

        return view(
            'entrust-gui::departments.edit',
            compact(
                'department'
            )
        );
  
    }

    /**
     * Update the specified resource in storage.
     * PUT /roles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $department = Departments::find($id);
            $department->name = $request->name;
            $department->save();
        } catch (ValidationException $e) {
            return back()->withErrors($e->getErrors())->withInput();
        }
        return redirect(route('entrust-gui::departments.index'))
            ->withSuccess(trans('entrust-gui::departments.updated'));
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /roles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $department = Departments::find($id);
        $department->delete();

        return redirect(route('entrust-gui::departments.index'))
            ->withSuccess(trans('entrust-gui::departments.destroyed'));
    }
}
