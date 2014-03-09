<?php

class AdminUsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$users = User::all();
		$title = Lang::get('admin.navigation.resource.manage', array('resource' => Lang::get('user.resource.singular.uppercase')));

		return View::make('admin/users/index', compact('users', 'title'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$roles = Role::all();
		$permissions = Permission::all();
		$selectedRoles = Input::old('roles', array());
		$selectedPermissions = Input::old('permissions', array());
		$title = Lang::get('admin.navigation.resource.new', array('resource' => Lang::get('user.resource.singular.uppercase')));
		$submitText = Lang::get('general.create');

		return View::make('admin/users/create_edit', compact('roles', 'permissions', 'selectedRoles', 'selectedPermissions', 'title', 'submitText'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		$user = new User;

		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Input::get('password');
		$user->password_confirmation = Input::get('password_confirmation');
		$user->confirmed = Input::get('confirm');

		if ($user->save())
		{
			$user->saveRoles(Input::get('roles'));

			// Redirect to the new user page
			return Redirect::to('admin/users/' . $user->id . '/edit')->with('success', Lang::get('form.create.success', array('resource' => Lang::get('user.resource.singular.lowercase'))));
		}
		else
		{
			$error = $user->errors()->all();

			return Redirect::to('admin/users/create')
				->withInput(Input::except('password'))
				->with('error', $error);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $user
	 * @return Response
	 */
	public function getEdit($user)
	{
		// User exists
		if ($user->id)
		{
			$roles = Role::all();
			$selectedRoles = $user->getRoleIds() ?: array();
			$permissions = Permission::all();
			$title = Lang::get('admin.navigation.resource.update', array('resource' => Lang::get('user.resource.singular.uppercase')));
			$submitText = Lang::get('general.update');

			return View::make('admin/users/create_edit', compact('user', 'roles', 'selectedRoles', 'permissions', 'title', 'submitText'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param $user
	 * @return Response
	 */
	public function postEdit($user)
	{
		// Validate the inputs
		$validator = Validator::make(Input::all(), $user->getUpdateRules());

		if ($validator->passes())
		{
			$oldUser = clone $user;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->confirmed = Input::get('confirm');

			$password = Input::get('password');
			$passwordConfirmation = Input::get('password_confirmation');

			// Update password
			if ( ! empty($password))
			{
				// Confirm password
				if ($password === $passwordConfirmation)
				{
					$user->password = $password;
					$user->password_confirmation = $passwordConfirmation;
				}
				// Confirmation failed
				else
				{
					// Show edit user page with error
					return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('form.password_does_not_match'));
				}
			}
			// Do not update password
			else
			{
				unset($user->password);
				unset($user->password_confirmation);
			}
			
			if ($user->confirmed == null)
			{
				$user->confirmed = $oldUser->confirmed;
			}

			// Update user
			$user->prepareRules($oldUser, $user);
			$user->amend();
			$user->saveRoles(Input::get('roles'));
		}
		else
		{
			// Show edit user page with error
			return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('form.edit.error', array('resource' => Lang::get('user.resource.singular.lowercase'))));
		}

		$error = $user->errors()->all();

		if (empty($error))
		{
			// Show edit user page with success
			return Redirect::to('admin/users/' . $user->id . '/edit')->with('success', Lang::get('form.edit.success', array('resource' => Lang::get('user.resource.singular.lowercase'))));
		}
		else
		{
			// Show edit user page with error
			return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('form.edit.error', array('resource' => Lang::get('user.resource.singular.lowercase'))));
		}
	}

	/**
	 * Remove user page.
	 *
	 * @param $user
	 * @return Response
	 */
	public function getDelete($user)
	{
		$title = Lang::get('admin.navigation.resource.delete', array('resource' => Lang::get('user.resource.singular.uppercase')));;
		return View::make('admin/users/delete', compact('user', 'title'));
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param $user
	 * @return Response
	 */
	public function postDelete($user)
	{
		// Disallow users from deleting themselves
		if ($user->id === Confide::user()->id)
		{
			return Redirect::to('admin/users')->with('error', Lang::get('form.delete.current_user'));
		}

		if ($user->delete())
		{
			return Redirect::to('admin/users')->with('success', Lang::get('form.delete.success', array('resource' => Lang::get('user.resource.singular.lowercase'))));
		}
		else
		{
			return Redirect::to('admin/users')->with('error', Lang::get('form.delete.error', array('resource' => Lang::get('user.resource.singular.lowercase'))));
		}
	}

}