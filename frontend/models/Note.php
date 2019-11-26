<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "note".
 *
 * @property int $noteId
 * @property string $title
 * @property string $description
 * @property int $category
 * @property string $addedDateTime
 * @property string $reminderDate
 * @property string $reminderTime
 * @property string $expiryDateTime
 *
 * @property Category $category0
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['category'], 'required'],
            [['addedDateTime', 'reminderDate', 'reminderTime', 'expiryDateTime'], 'safe'],
            [['title'], 'string', 'max' => 75],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'categoryId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'noteId' => 'Note ID',
            'title' => 'Title',
            'description' => 'Description',
            'category' => 'Category',
            'addedDateTime' => 'Added Date Time',
            'reminderDate' => 'Reminder Date',
            'reminderTime' => 'Reminder Time',
            'expiryDateTime' => 'Expiry Date and Time',
            'userId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['categoryId' => 'category']);
    }
}
