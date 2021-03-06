<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "classroom".
 *
 * @property int $id
 * @property string $title
 * @property string $level
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Division[] $divisions
 */
class Classroom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classroom';
    }
    public function beforeValidate()
    { $this->created_at = time();
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function beforeSave($insert)
    {

        $this->created_at = time();

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'level', 'created_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'level'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'level' => Yii::t('app', 'Level'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisions()
    {
        return $this->hasMany(Division::className(), ['classroom_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ClassroomQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClassroomQuery(get_called_class());
    }
}
