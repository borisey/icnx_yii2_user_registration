<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\RegisterForm;
use app\models\User;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        $model = new RegisterForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->username = $model->username;
            $user->phone = $model->phone;
            $user->email = $model->email;
            $user->child_birthday = $model->child_birthday;
            $user->agree = $model->agree;
            if ($user->save())
            {
                return $this->render('success_registration');
            }
        }
        return $this->render('register', compact('model'));
    }
}