<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	public function authenticate(){

		$user = Users::model()->findByAttributes(array('email' => $this->username)) ;

		$enc = new bCrypt() ;

		if($user == null){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
			return false ;
		} 
		elseif (!$enc->verify($this->password, $user->password)) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
			return false ;
		}
		else{
			$this->errorCode = self::ERROR_NONE;

			$this->setState('id', $user->id);
			$this->setState('name', $user->name);
			$this->setState('email', $user->email);

			return true ;
		}

	}
}