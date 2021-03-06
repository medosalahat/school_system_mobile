<?php

namespace app\models;

use Yii;
use app\models\UsersQuery;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $token_id
 * @property int $status
 * @property int $user_type_id
 * @property int $phone
 * @property int $for_get
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ChatGroup[] $chatGroups
 * @property Chats[] $chats
 * @property Chats[] $chats0
 * @property CoursesDivision[] $coursesDivisions
 * @property Notes[] $notes
 * @property Notes[] $notes0
 * @property StudentCoursesDivision[] $studentCoursesDivisions
 * @property StudentFamily[] $studentFamilies
 * @property StudentFamily[] $studentFamilies0
 * @property UserType $userType
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email','phone', 'user_type_id', 'created_at'], 'required'],
            [['status', 'user_type_id', 'created_at','phone', 'updated_at'], 'integer'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
            [['token_id'], 'string'],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'phone' => Yii::t('app', 'phone'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'user_type_id' => Yii::t('app', 'User Type ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getChatGroups()
    {
        return $this->hasMany(ChatGroup::className(), ['sender_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chats::className(), ['sender_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats0()
    {
        return $this->hasMany(Chats::className(), ['reciver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoursesDivisions()
    {
        return $this->hasMany(CoursesDivision::className(), ['teacher_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Notes::className(), ['teacher_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes0()
    {
        return $this->hasMany(Notes::className(), ['family_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCoursesDivisions()
    {
        return $this->hasMany(StudentCoursesDivision::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentFamilies()
    {
        return $this->hasMany(StudentFamily::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentFamilies0()
    {
        return $this->hasMany(StudentFamily::className(), ['family_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * @inheritdoc
     * @return CoursesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
