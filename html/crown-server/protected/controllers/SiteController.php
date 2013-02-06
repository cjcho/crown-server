<?php

class SiteController extends Controller
{

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions
				'users'=>array('*'),
				'actions'=>array('login')
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny'),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout = 'main' ;
		$this->render('index') ;
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{		
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
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