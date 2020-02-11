<?php
namespace App\Helpers;
use Auth;use App\User;
class CustomHelper
{	public static function getAllAdminEmails()	{		$adminData = User::select('id', 'email', 'first_name', 'last_name')->where('role', '1')->where('status', '1')->get();		return $adminData;	}
	
}