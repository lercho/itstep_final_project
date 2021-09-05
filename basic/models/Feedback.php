<?php

namespace app\models;
use yii\base\Model;

class Feedback extends Model {

  public $name;
  public $email;
  public $body;

  public function attributeLabels() {
    return [
      'name' => 'Ваше имя',
      'email' => 'Ваш e-mail',
      'body' => 'Ваше сообщение',
    ];
  }

  public function rules() {
    return [
      [['name', 'email', 'body'], 'trim'],
      ['name', 'required', 'message' => 'Поле «Ваше имя» обязательно для 
      заполнения'],
      ['email', 'required', 'message' => 'Поле «Ваш email» обязательно для 
      заполнения'],
      ['email', 'email', 'message' => 'Поле «Ваш email» должно быть адресом 
      почты'],
      ['body', 'required', 'message' => 'Поле «Сообщение» обязательно для 
      заполнения'],
      [
        ['name', 'email'],
        'string',
        'max' => 50,
        'tooLong' => 'Поле должно быть длиной не более 50 символов'
      ],
      [
        'body',
        'string',
        'max' => 1000,
        'tooLong' => 'Сообщение должно быть длиной не более 1000 символов'
      ],
    ];
  }
}   