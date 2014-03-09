<?php

class AdminDashboardController extends AdminController {

	/**
	 * Admin dashboard
	 */
	public function getIndex()
	{
		$title = Lang::get('admin.navigation.dashboard');
		$users = User::orderBy('created_at', 'DESC')->take(5)->get();

		return View::make('admin/dashboard', compact('title', 'users'));
	}

}