<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_userdata_internal".
 *
 * @property integer $ui_id
 * @property integer $user_id
 * @property string $fullname
 * @property string $nik
 *
 * @property User $user
 */
class Userdata extends \yii\db\ActiveRecord
{
    public $username;
    public $email;
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userdata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['fullname'], 'string', 'max' => 64],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ui_id' => 'Ui ID',
            'user_id' => 'User ID',
            'fullname' => 'Fullname',
            'username' => 'Username',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
