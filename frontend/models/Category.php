<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $categoryId
 * @property string $categoryName
 * @property int $userId
 *
 * @property Note[] $notes
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryName'], 'required'],
            [['categoryName'], 'string', 'max' => 50],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categoryId' => 'Category ID',
            'categoryName' => 'Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['category' => 'categoryId']);
    }
}
