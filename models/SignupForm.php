<?php

namespace app\models;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupForm extends Model{
    public $username;
    public $password;
    public $user_type;
    public $email;


    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules(){
        return [
            ['username', 'trim'],
            ['email', 'trim'],
            // username and password are both required
            [['username', 'password','user_type','email'], 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User'],
            ['email', 'unique', 'targetClass' => '\app\models\User'],
            // rememberMe must be a boolean value
            // password is validated by validatePassword()
            ['password', 'string', 'min' => 6],
            ['user_type', 'validateUser_type'],
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateUser_type($attribute, $params){
        if (!$this->hasErrors()) {
            $find= UserType::find()->where(['id'=>$this->user_type])->count();

            if(!$find>0){
                $this->addError($attribute,'user typ not found');

            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser(){
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
