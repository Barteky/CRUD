<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;


class Uzytkownicy extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'uzytkownicy';
    }


    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'admin'], 'required'],
            [['username', 'authKey'], 'unique'],
            [['admin'], 'integer'],
            [['username', 'password'], 'string', 'max' => 200],
            [['authKey'], 'string', 'max' => 50],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'admin' => 'Admin',
        ];
    }



    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return self::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        throw new NotSupportedException();
    }

    public function getId()
    {
        // TODO: Implement getId() method.
        return $this -> id;
    }


    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return $this->authKey;

    }
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return $this -> authKey === $authKey;
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }


    public function validatePassword($password){

	    return Yii::$app->getSecurity()->validatePassword($password, $this->password);

	    }

}
