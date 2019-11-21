<?php

namespace app\models;
use  yii\db\ActiveRecord;
use Yii;

class UserRecord extends ActiveRecord{
    public static function tableName (){
        return "user";
    }

    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userName', 'password', 'firstName', 'lastName', 'email'], 'required'],
            [['userName'], 'string','max' => 20, ],
            [['firstName'], 'string', 'max' => 50],
            [['lastName'], 'string', 'max' => 50],
            [['email'], 'unique'],
        ];
    }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function attributeLabels()
    // {
    //     return [
    //         'code' => 'Code',
    //         'name' => 'Name',
    //         'population' => 'Population',
    //     ];
    // }
}