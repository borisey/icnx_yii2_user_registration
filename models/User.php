<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $phone
 * @property string $email
 * @property string $child_birthday
 * @property int $agree
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'phone', 'email', 'child_birthday', 'agree'], 'required'],
            [['child_birthday'], 'safe'],
            [['agree', 'phone'], 'integer'],
            [['username', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'min' => 10, 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
            'child_birthday' => 'Дата рождения ребенка',
            'agree' => 'Согласие на обработку персональных данных',
        ];
    }
}
