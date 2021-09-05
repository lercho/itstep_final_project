<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;


class OrderItem extends ActiveRecord {
    
    public static function tableName() {
        return 'order_item';
    }
    
    public function getOrder() {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
