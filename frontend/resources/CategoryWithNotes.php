<?php

namespace frontend\resources;

use app\models\Category;
use app\models\Note;

/**
 * use this class to get Category with related Notes to each category
 */
class CategoryWithNotes extends Category {

    public function fields(){ 
        return ['categoryId', 'categoryName','userId'];
    }

    public function extraFields(){
        return ['notes'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['categoryId' => 'categoryId']);
    }
}