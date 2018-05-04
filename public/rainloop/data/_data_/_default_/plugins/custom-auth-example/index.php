<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class CustomAuthExamplePlugin extends \RainLoop\Plugins\AbstractPlugin
{
	public function Init()
	{
		$this->addHook('filter.login-credentials', 'FilterLoginСredentials');
	}

	/**
	 * @param string $sEmail
	 * @param string $sLogin
	 * @param string $sPassword
	 *
	 * @throws \RainLoop\Exceptions\ClientException
	 */
	public function FilterLoginСredentials(&$sEmail, &$sLogin, &$sPassword)
	{
		// Your custom php logic
		// You may change login credentials
		if (Auth::user()->email === $sEmail)
		{
			$sEmail = Auth::user()->email;
			$sLogin = Auth::user()->email;
			$sPassword = Auth::user()->contra_mail;
		}
		else
		{
			// or throw auth exeption
			throw new \RainLoop\Exceptions\ClientException(\RainLoop\Notifications::AuthError);
			// or
			throw new \RainLoop\Exceptions\ClientException(\RainLoop\Notifications::AccountNotAllowed);
			// or
			throw new \RainLoop\Exceptions\ClientException(\RainLoop\Notifications::DomainNotAllowed);
		}
	}
}
