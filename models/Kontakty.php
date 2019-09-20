<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kontakty".
 *
 * @property int $id
 * @property string $imie
 * @property string $nazwisko
 * @property string $adres
 * @property int $telefon
 * @property string $email
 * @property string $wlasciciel
 */
class Kontakty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kontakty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imie', 'nazwisko', 'adres', 'telefon', 'email', 'wlasciciel'], 'required'],
            [['telefon'], 'integer'],
            [['imie', 'nazwisko', 'wlasciciel'], 'string', 'max' => 20],
            [['adres'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 40],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imie' => 'Name',
            'nazwisko' => 'Surname',
            'adres' => 'Address',
            'telefon' => 'Phone number',
            'email' => 'E-mail',
            'wlasciciel' => 'Owner',
        ];
    }
}
