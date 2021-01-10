<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Gate;

class RoleController extends Controller
{
    /**
     * Show all the roles
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), 403);

        return view('admin.roles.index');
    }

    /**
     * Show the form to create a role
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), 403);

        return view('admin.roles.create');
    }

    /**
     * Create new role
     * 
     * @param App\Http\Requests\StoreRoleRequest $request
     * @return Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());

        return redirect($role->path());
    }

    /**
     * Show the specified role
     * 
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), 403);

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form to edit a role
     * 
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), 403);

        return view('admin.roles.edit');
    }

    /**
     * Update a role
     * 
     * @param App\Http\Requests\UpdateRoleRequest $request
     * @param App\Models\Role $role
     * @return Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return redirect($role->path());
    }

    /**
     * Delete a role
     * 
     * @param App\Models\Role $role
     * @return Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), 403);
        
        $role->delete();
    }
}
