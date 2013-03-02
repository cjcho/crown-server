<?php

class UsersController extends Controller
{

	/**
	 * Registers the user. Is not approved by default.
	 * @author CJ Cho
	 **/
	public function actionSignup(){

		$this->layout = 'dark' ;

		$error = '' ;

		$success = false ;

		if(isset($_POST['signup'])) {

			if($_POST['email'] == ''
			|| $_POST['password'] == ''
			|| $_POST['password-confirmation'] == ''
			|| $_POST['name'] == ''){
				$error = 'Please fill out all fields.' ;
			}
			elseif($_POST['password'] != $_POST['password-confirmation']){
				$error = 'The passwords don\'t match.' ;
			}
			elseif(Users::model()->findByAttributes(array('email' => Yii::app()->request->getPost('email'))) !== null){
				$error = 'This email address is already registered.' ;
			}
			else{

				$user = new Users() ;
				$user->email = Yii::app()->request->getPost('email') ;
				$user->name = Yii::app()->request->getPost('name') ;
				$user->password = Users::hashPassword(Yii::app()->request->getPost('password')) ;

				$user->created_at = date('Y-m-d H:i:s', time()) ;

				$user->save();

				$success = true ;

			}
		}

		$this->render('signup', array(
			'error' => $error,
			'success' => $success
		)) ;

	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{

		$this->layout = 'dark' ;

		$error = null ;

		if(isset($_POST['login'])) {

			if($_POST['user'] == ''
			|| $_POST['password'] == ''){
				$error = true ;
			}
			else{

				$identity = new UserIdentity($_POST['user'], $_POST['password']) ;
				if($identity->authenticate()) {

					Yii::app()->user->login($identity, 0) ;

					header('Location: /') ;

				}
				else{
					$error = true ;
				}

			}
		}

		$this->render('login', array(
			'error' => $error
		));

	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}