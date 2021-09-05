<?php

namespace app\models;

use Yii;

class BlogCategories extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'blog_categories';
    }
}
