<?php

namespace app\models;

use Yii;
use yii\base\Model;
use DateTime;

class RegisterForm extends Model {

    public $username;
    public $phone;
    public $email;
    public $child_birthday;
    public $agree;

    public function rules()
    {
        return [
            [['username', 'phone', 'email', 'child_birthday', 'agree'], 'required', 'message' => 'Заполните поле'],
            [['username'], 'match', 'pattern' => '/^([а-яА-ЯЁё]+)$/u', 'message' => 'Допускается использовать только кириллические символы'],
            [['agree'], 'integer'],
            [['phone'], 'validatePhone'],
            [['email'], 'email', 'message' => 'Введенные данные не соответствуют формату email'],
            [['child_birthday'], 'date', 'format' => 'yyyy-MM-dd'],
            [['child_birthday'], 'validateDate'],
            [['agree'], 'in','range'=>range(1, 1), 'message' => 'Согласие с политикой обработки персональных данных обязательно для регистрации'],
            ];
    }

    public function validatePhone()
    {
        $phone_length = strlen($this->phone);

        if ($phone_length < 10) {
            $this->addError('phone', "Номер телефона должен состоять из 10 символов");
        }
    }

    public function validateDate()
    {
        $currentDate = new DateTime();
        $currentDateString = $currentDate->format('Y-m-d');

        if ($currentDateString < $this->child_birthday) {
            $this->addError('child_birthday', "Дата рождения ребенка не может быть позднее текущей даты");
        }

        $birthdayThreeYearsAgo = $currentDate->modify('-3 year');
        $birthdayThreeYearsAgoString = $birthdayThreeYearsAgo->format('Y-m-d');

        if ($birthdayThreeYearsAgoString < $this->child_birthday) {
            $this->addError('child_birthday', "Дата рождения ребенка, не может быть раньше, чем 3 года назад");
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
            'child_birthday' => 'Дата рождения ребенка',
            'agree' => 'Подтверждаю согласие на обработку персональных данных',
        ];
    }
}