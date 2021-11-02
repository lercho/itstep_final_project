<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
class Order extends ActiveRecord {
 
    public static function tableName() {
        return 'order';
    }

    public function getItems() {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }
    
    public function rules() {
        return [
            [['name', 'surname', 'email', 'phone', 'city', 'delivery_option', 'delivery_department', 'payment_method'], 'required'],
            ['email', 'email'],
            [
                'phone',
                'match',
                'pattern' => '~^0[0-9]{9}$~',
                'message' => 'Номер телефона должен соответствовать шаблону 0551234567'
            ],
            [['name', 'surname', 'email', 'phone', 'city'], 'string', 'max' => 50],
            [['delivery_option', 'delivery_department', 'comment'], 'string', 'max' => 255],
        ];
    }

    public function addItems($basket) {
        $products = $basket['products'];
        foreach ($products as $product_id => $product) {
            $item = new OrderItem();
            $item->order_id = $this->id;
            $item->product_id = $product_id;
            $item->name = $product['name'];
            $item->price = $product['price'];
            // $item->quantity = $product['count'];
            $item->cost = $product['price'];
            $item->insert();
        }
    }
}
   