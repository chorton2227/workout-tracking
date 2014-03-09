<?php

use Woodling\Woodling;

class UserControllerTest extends TestCase {

	/**
	 * Test register page.
	 */
	public function testCreate()
	{
		$this->call('GET', 'user/create');
		$this->assertResponseOk();
	}

	/**
	 * Test user creation with valid params.
	 */
	public function testStoreValid()
	{
		$params = array(
			'username'				=> 'user',
			'email'					=> 'user@example.com',
			'password'				=> 'password',
			'password_confirmation' => 'password',
		);

		$this->call('POST', 'user', $params);
		$this->assertRedirectedTo('user/login');
		$this->assertEquals(1, User::where('username', 'user')->count());
	}

	/**
	 * Test user creation with invalid params.
	 */
	public function testStoreInvalid()
	{
		$params = array(
			'username'				=> 'user',
			'email'					=> 'invalid email',
			'password'				=> 'password',
			'password_confirmation' => 'password mismatch',
		);

		$this->call('POST', 'user', $params);
		$this->assertRedirectedTo('user/create');
	}

	/**
	 * Test register page redirection when logged in.
	 */
	public function testCreateRedirect()
	{
		$user = Woodling::retrieve('Admin');

		// Retrieve credentials before saving, for plaintext password
		$params = array(
			'email'		=> $user->email,
			'username'	 => $user->email,
			'password'	 => $user->password,
		);

		$user->save();

		// Login user
		$this->assertTrue(Confide::logAttempt($params));

		// Login page should redirect to home page
		$this->call('GET', 'user/create');
		$this->assertRedirectedTo('/');
	}

	/**
	 * Test login page.
	 */
	public function testLogin()
	{
		$this->call('GET', 'user/login');
		$this->assertResponseOk();
	}

	/**
	 * Test login page redirection when logged in.
	 */
	public function testLoginRedirect()
	{
		$user = Woodling::retrieve('Admin');

		// Retrieve credentials before saving, for plaintext password
		$params = array(
			'email'		=> $user->email,
			'username'	 => $user->email,
			'password'	 => $user->password,
		);

		$user->save();

		// Login user
		$this->assertTrue(Confide::logAttempt($params));

		// Login page should redirect to home page
		$this->call('GET', 'user/login');
		$this->assertRedirectedTo('/');
	}

	/**
	 * Test user login with valid params.
	 */
	public function testDoLoginValid()
	{
		$user = Woodling::retrieve('Admin');

		// Retrieve credentials before saving, for plaintext password
		$params = array(
			'email'		=> $user->email,
			'username'	 => $user->email,
			'password'	 => $user->password,
		);

		$user->save();

		$this->call('POST', 'user/login', $params);
		$this->assertRedirectedTo('/');
	}

	/**
	 * Test user login with invalid params.
	 */
	public function testDoLoginInvalid()
	{
		$params = array(
			'email'		=> 'email@example.com',
			'username'	 => 'username',
			'password'	 => 'password',
		);

		$this->call('POST', 'user/login', $params);
		$this->assertRedirectedTo('user/login');
	}

	/**
	 * Test confirmation page with valid confirmation code.
	 */
	public function testConfirmCodeValid()
	{
		$user = Woodling::saved('Admin');

		$this->call('GET', 'user/confirm/' . $user->confirmation_code);
		$this->assertRedirectedTo('user/login');
		$this->assertSessionHas('notice');
	}

	/**
	 * Test confirmation page with invalid confirmation code.
	 */
	public function testConfirmCodeInvalid()
	{
		$this->call('GET', 'user/confirm/invalid-code');
		$this->assertRedirectedTo('user/login');
		$this->assertSessionHas('error');
	}

	/**
	 * Test forgot password page.
	 */
	public function testForgotPassword()
	{
		$this->call('GET', 'user/forgot_password');
		$this->assertResponseOk();
	}

	/**
	 * Test forgot password page with valid credentials.
	 */
	public function testDoForgotPasswordValid()
	{
		$user = Woodling::saved('Admin');
		$params = array(
			'email' => $user->email,
		);

		$this->call('POST', 'user/forgot_password', $params);
		$this->assertRedirectedTo('user/login');
		$this->assertSessionHas('notice');
	}

	/**
	 * Test forgot password page with invalid credentials.
	 */
	public function testDoForgotPasswordInvalid()
	{
		$params = array(
			'email' => 'email@example.com',
		);

		$this->call('POST', 'user/forgot_password', $params);
		$this->assertRedirectedTo('user/forgot_password');
		$this->assertSessionHas('error');
	}

	/**
	 * Test reset password page.
	 */
	public function testResetPassword()
	{
		$user = Woodling::saved('Admin');
		Confide::forgotPassword($user->email);
		$passwordReminder = PasswordReminders::where('email', $user->email)->first();

		$this->call('GET', 'user/reset_password/' . $passwordReminder->token);
		$this->assertResponseOk();
	}

	/**
	 * Test reset password page with valid credentials.
	 */
	public function testDoResetPasswordValid()
	{
		$user = Woodling::retrieve('Admin');

		// Retrieve credentials before saving, for plaintext password
		$params = array(
			'password'				=> $user->password,
			'password_confirmation' => $user->password,
		);

		$user->save();
		Confide::forgotPassword($user->email);
		$passwordReminder = PasswordReminders::where('email', $user->email)->first();

		$params['token'] = $passwordReminder->token;

		$this->call('POST', 'user/reset_password', $params);
		$this->assertRedirectedTo('user/login');
		$this->assertSessionHas('notice');
	}

	/**
	 * Test reset password page with invalid credentials.
	 */
	public function testDoResetPasswordInvalid()
	{
		$params = array(
			'password'				=> 'password',
			'password_confirmation' => 'password',
			'token'					=> 'token',
		);

		$this->call('POST', 'user/reset_password/', $params);
		$this->assertRedirectedTo('user/reset_password/'.$params['token']);
		$this->assertSessionHas('error');
	}

	/**
	 * Test profile page.
	 */
	public function testProfile()
	{
		$user = Woodling::saved('Admin');
		$this->call('GET', 'profile/'.$user->username);
		$this->assertResponseOk();
	}

	/**
	 * Test profile page.
	 */
	public function testProfileWithInvalidUsername()
	{
		try {
			$this->call('GET', 'profile/invalidusername');

			// Should not be reached
			$this->assertTrue(false);
		}
		catch (Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
			$this->assertTrue(true);
		}
	}

}
