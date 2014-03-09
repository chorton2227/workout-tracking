<?php

class AdminRolesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$roles = Role::all();
		$title = Lang::get('admin.navigation.resource.manage', array('resource' => Lang::get('role.resource.singular.uppercase')));

		return View::make('admin/roles/index', compact('roles', 'title'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$permissions = Permission::all();
		$selectedPermissions = Input::old('permissions', array());
		$title = Lang::get('admin.navigation.resource.new', array('resource' => Lang::get('role.resource.singular.uppercase')));
		$submitText = Lang::get('general.create');

		return View::make('admin/roles/create_edit', compact('permissions', 'selectedPermissions', 'title', 'submitText'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		// Get the inputs, with some exceptions
		$inputs = Input::except('csrf_token');

		$role = new Role;
		$permission = new Permission;

		$role->name = $inputs['name'];
		

		if ($role->save())
		{
			// Save permissions
			$permissionIds = Input::get('permissions');

			if (is_array($permissionIds))
			{
				$permissionIds = array_keys($permissionIds);
			}
			
			$role->savePermissions($permissionIds);

			// Was the role created?
			if ($role->id)
			{
				// Redirect to the new role page
				return Redirect::to('admin/roles/' . $role->id . '/edit')->with('success', Lang::get('form.create.success', array('resource' => Lang::get('role.resource.singular.lowercase'))));
			}

			// Redirect to the role create page
			return Redirect::to('admin/roles/create')->withInput()->with('error', Lang::get('form.create.error', array('resource' => Lang::get('role.resource.singular.lowercase'))));
		}
		else
		{
			$error = $role->errors()->all();

			// Form validation failed
			return Redirect::to('admin/roles/create')->withInput()->with('error', $error);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $role
	 * @return Response
	 */
	public function getEdit($role)
	{
		$permissions = Permission::all();
		$selectedPermissions = $role->getPermissionIds() ?: array();
		$title = Lang::get('admin.navigation.resource.update', array('resource' => Lang::get('role.resource.singular.uppercase')));
		$submitText = Lang::get('general.update');

		return View::make('admin/roles/create_edit', compact('role', 'permissions', 'selectedPermissions', 'title', 'submitText'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param $role
	 * @return Response
	 */
	public function postEdit($role)
	{
		// Declare the rules for the form validation
		$rules = array(
			'name' => 'required'
		);

		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		// Check if the form validates with success
		if ($validator->passes())
		{
			// Update the role data
			$role->name = Input::get('name');

			// Update permissions
			$permissionIds = Input::get('permissions');

			if (is_array($permissionIds))
			{
				$permissionIds = array_keys($permissionIds);
			}

			$role->savePermissions($permissionIds);

			// Was the role updated?
			if ($role->save())
			{
				// Redirect to the role page
				return Redirect::to('admin/roles/' . $role->id . '/edit')->with('success', Lang::get('form.edit.success', array('resource' => Lang::get('role.resource.singular.lowercase'))));
			}
			else
			{
				// Redirect to the role page
				return Redirect::to('admin/roles/' . $role->id . '/edit')->with('error', Lang::get('form.edit.error', array('resource' => Lang::get('role.resource.singular.lowercase'))));
			}
		}

		// Form validation failed
		return Redirect::to('admin/roles/' . $role->id . '/edit')->withInput()->withErrors($validator);
	}

	/**
	 * Remove role page.
	 *
	 * @param $role
	 * @return Response
	 */
	public function getDelete($role)
	{
		$title = Lang::get('admin.navigation.resource.delete', array('resource' => Lang::get('role.resource.singular.uppercase')));;
		return View::make('admin/roles/delete', compact('role', 'title'));
	}

	/**
	 * Remove the specified role from storage.
	 *
	 * @param $role
	 * @return Response
	 */
	public function postDelete($role)
	{
		if ($role->delete())
		{
			return Redirect::to('admin/roles')->with('success', Lang::get('form.delete.success', array('resource' => Lang::get('role.resource.singular.lowercase'))));
		}
		else
		{
			return Redirect::to('admin/roles')->with('error', Lang::get('form.delete.error', array('resource' => Lang::get('role.resource.singular.lowercase'))));
		}
	}

}