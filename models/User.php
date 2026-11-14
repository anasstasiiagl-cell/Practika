<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

class User extends BaseObject implements IdentityInterface
{
    public $id;
    public $username;
    public $email;
    public $password_hash;
    public $created_at;
    public $auth_key;

    public static function findIdentity($id)
    {
        $user = Yii::$app->db
            ->createCommand('SELECT * FROM users WHERE id = :id')
            ->bindValue(':id', $id)
            ->queryOne();

        return $user ? new static($user) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function findByEmail($email)
    {
        $user = Yii::$app->db
            ->createCommand('SELECT * FROM users WHERE email = :email')
            ->bindValue(':email', trim($email))
            ->queryOne();

        return $user ? new static($user) : null;
    }

    public static function findByUsername($username)
    {
        $user = Yii::$app->db
            ->createCommand('SELECT * FROM users WHERE username = :username')
            ->bindValue(':username', trim($username))
            ->queryOne();

        return $user ? new static($user) : null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key !== null
            && hash_equals($this->auth_key, $authKey);
    }

    public function validatePassword($password)
    {
        return (string)$this->password_hash === (string)$password;
    }
}
