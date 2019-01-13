<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password_hash;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            //['email', 'trim'],
            //['email', 'required'],
            //['email', 'email'],
            //['email', 'string', 'max' => 255],
            //['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 4],
        ];
    }

     public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        //$user->email = $this->email;
        $user->setPassword($this->password_hash);
        $user->email = Yii::$app->params['adminEmail'];
        $user->role = $user::ROLE_USER;
        $user->generateAuthKey();
        $user->created_at = time();
        $user->updated_at = time();
         if ($user->save()) {
            echo 'good';
        }else{
            var_dump($user->getFirstErrors());
            die;
            }
        return $user->save() ? $user : null;
    }

}