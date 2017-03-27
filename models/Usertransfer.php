<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "usertransfer".
 *
 * @property integer $id
 * @property integer $from_user_id
 * @property integer $to_user_id
 * @property integer $summa
 * @property integer $created_at
 */
class Usertransfer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usertransfer';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_user_id','summa', 'created_at'], 'integer'],
            ['summa', 'integer', 'min' => 0],
            [['created_at','updated_at','to_user_id','summa'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_user_id' => 'From User ID',
            'to_user_id' => 'To User ID',
            'summa' => 'Summa',
            'created_at' => 'Date Transfer',
        ];
    }


}
