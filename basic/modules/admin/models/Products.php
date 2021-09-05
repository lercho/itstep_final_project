<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\imagine\Image;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $prod_name
 * @property int $category_id
 * @property string $img_1
 * @property string $img_2
 * @property string $img_3
 * @property string $img_4
 * @property string $author
 * @property string $material
 * @property int $width
 * @property int $height
 * @property int $price
 * @property string $description_short
 * @property string $description_full
 * @property string $teg
 * @property string $createdAt
 *
 * @property Categories $category
 */
class Products extends \yii\db\ActiveRecord {

    public $upload;
    public $remove;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_name', 'category_id', 'img_1', 'img_2', 'img_3', 'img_4', 'material', 'width', 'height', 'price', 'description_short', 'description_full', 'teg'], 'required'],
            [['category_id', 'width', 'height', 'price'], 'integer'],
            [['createdAt'], 'safe'],
            [['prod_name'], 'string', 'max' => 50],
            [['author', 'material', 'description_short', 'teg'], 'string', 'max' => 120],
            [['description_short'], 'string', 'max' => 2000],
            [['description_full'], 'string', 'max' => 2000],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
            [['img_1', 'img_2', 'img_3', 'img_4'], 'image', 'extensions' => 'png, jpg, gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prod_name' => 'Название товара',
            'category_id' => 'Категория',
            'img_1' => 'Первое изображение',
            'img_2' => 'Второе изображение',
            'img_3' => 'Третье изображение',
            'img_4' => 'Червёртое изображение',
            'author' => 'Автор',
            'material' => 'Материал',
            'width' => 'Ширина',
            'height' => 'Высота',
            'price' => 'Цена',
            'description_short' => 'Короткое описание',
            'description_full' => 'Полное описание',
            'teg' => 'Тег',
            'createdAt' => 'Дата создания',
        ];
    }

    public function uploadImage() {

        if ($this->upload) { 
            $name = md5(uniqid(rand(), true)) . '.' . $this->upload->extension;
            $source = Yii::getAlias('@webroot/img/products/source/' . $name);
            if ($this->upload->saveAs($source)) {
                $large = Yii::getAlias('@webroot/img/products/large/' . $name);
                Image::thumbnail($source, 550, 550)->save($large, ['quality' => 100]);
                $medium = Yii::getAlias('@webroot/img/products/medium/' . $name);
                Image::thumbnail($source, 270, 270)->save($medium, ['quality' => 100]);
                $thumb = Yii::getAlias('@webroot/img/products/thumb/' . $name);
                Image::thumbnail($source, 120, 120)->save($thumb, ['quality' => 95]);
                $cart = Yii::getAlias('@webroot/img/products/cart/' . $name);
                Image::thumbnail($source, 100, 100)->save($cart, ['quality' => 90]);
                return $name;
            }
        }
        return false;
    }

    public static function removeImage($name) {
        if (!empty($name)) {
            $source = Yii::getAlias('@webroot/img/products/source/' . $name);
            if (is_file($source)) {
                unlink($source);
            }
            $large = Yii::getAlias('@webroot/img/products/large/' . $name);
            if (is_file($large)) {
                unlink($large);
            }
            $thumb = Yii::getAlias('@webroot/img/products/thumb/' . $name);
            if (is_file($thumb)) {
                unlink($thumb);
            }
            $cart = Yii::getAlias('@webroot/img/products/cart/' . $name);
            if (is_file($cart)) {
                unlink($cart);
            }
        }
    }

    public function afterDelete() {
        parent::afterDelete();
        self::removeImage($this->img_1);
        self::removeImage($this->img_2);
        self::removeImage($this->img_3);
        self::removeImage($this->img_4);
    }
       
    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }
}
