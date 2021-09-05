<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property int $id Идентификатор заказа
 * @property int $user_id Идентификатор пользователя
 * @property string $name Имя покупателя
 * @property string $surname Фамилия покупателя
 * @property string $email Почта покупателя
 * @property string $phone Телефон покупателя
 * @property string $city Город доставки
 * @property string $delivery_option Способ доставки
 * @property string $delivery_department Отделение доставки
 * @property string $payment_method Способ оплаты
 * @property string $comment Комментарий к заказу
 * @property float $amount Сумма заказа
 * @property int $status Статус заказа
 * @property string $created Дата и время создания
 * @property string $updated Дата и время обновления
 */
class Order extends ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['amount'], 'number'],
            [['created', 'updated'], 'safe'],
            [['name', 'surname', 'email', 'phone'], 'string', 'max' => 50],
            [['city', 'delivery_option', 'delivery_department', 'payment_method', 'comment'], 'string', 'max' => 255],
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
      

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email' => 'Имейл',
            'phone' => 'Телефон',
            'city' => 'Город',
            'delivery_option' => 'Способ доставки',
            'delivery_department' => 'Отделение почты',
            'payment_method' => 'Способ оплаты',
            'comment' => 'Комментарий',
            'amount' => 'Сумма',
            'status' => 'Статус',
            'created' => 'Дата создания',
            'updated' => 'Дата обновления',
        ];
    }

    public function getItems() {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

    public function afterDelete() {
        parent::afterDelete();
        OrderItem::deleteAll(['order_id' => $this->id]);
    }
       
}
