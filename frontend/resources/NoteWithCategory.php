<?php

namespace frontend\resources;
use app\models\Note;
use app\models\Category;

/**
 * use this class to get Category with related Notes to each category
 */
class NoteWithCategory extends Note {

    public function fields(){
        return ['noteId', 'title', 'description', 'reminderDate', 'reminderTime', 'expiryDateTime', 'userId', 'categoryId'];
    }

    public function extraFields(){
        return ['category'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */ 
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['categoryId' => 'categoryId']);
    }
}

?>