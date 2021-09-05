<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;


class LoginForm extends Model {

    public $email;
    public $password;

    public function rules() {
        return [
            [['email', 'password'], 'trim'],
            [
            ['email', 'password'],
            'required',
            'message' => 'Это поле обязательно для заполнения'
            ],
            ['email', 'email'],
            [['password'], 'string', 'min' => 12],
        ];
    }
    public function attributeLabels() {
        return [
            'username' => 'Имейл',
            'password' => 'Пароль',
        ];
    }

    public static function login() {
        $session = Yii::$app->session;
        $session->open();
        $session->set('auth_site_admin', true);
    }

    public static function logout() {
        $session = Yii::$app->session;
        $session->open();
        if ($session->has('auth_site_admin')) {
            $session->remove('auth_site_admin');
        }
    }
}
