<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'email'], 'required'],
            [["email"] , "email"],
            [["phone"] , "validatePhone"],
            [["name"] , "validateName"],

            
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
        ];
    }
    
    public function validateName($attribute, $params, $validator){
        if(!preg_match("/^[а-яa-z ]+$/msiu", $this->$attribute)){
            $this->addError($attribute, 'Недопустимые символы в имени');
        }
    }
    public function validatePhone($attribute, $params, $validator)
    {
       // var_dump(stripos("8721515429", "+7")==false);exit;
        if (!stripos($this->$attribute, "+7") == false) {
            $this->addError($attribute, 'Допустимы только русские номера');
        }
    }
    
    public function validateEmail(){
        
        if (filter_var($this->$attribute, FILTER_VALIDATE_EMAIL) == false) {
            $this->addError($attribute, 'Не валиднйы email');
        }
    }
}
