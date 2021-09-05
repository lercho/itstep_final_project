<?php

namespace app\models;

use Yii;

class Blog extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'blog';
    }

}
