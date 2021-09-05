<?php

namespace app\modules\admin\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $category_name
 * @property string $img
 *
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $upload;
    public $remove;

    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name', 'img'], 'required'],
            [['category_name'], 'string', 'max' => 100],
            [['img'], 'image', 'extensions' => 'png, jpg, gif'],
        ];
    }
    public function getAllCategories() {
        $categories_arr = Categories::find()->all();
        return $categories_arr;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Имя категории',
            'img' => 'Изображение',
        ];
    }

    public function uploadImage() {
        if ($this->upload) { 
            $name = md5(uniqid(rand(), true)) . '.' . $this->upload->extension;
            $source = Yii::getAlias('@webroot/img/categories/source/' . $name);
            if ($this->upload->saveAs($source)) {
                $formated = Yii::getAlias('@webroot/img/categories/' . $name);
                Image::thumbnail($source, 270, 270)->save($formated, ['quality' => 100]);
                return $name;
            }
        }
        return false;
    }

    public static function removeImage($name) {
        if (!empty($name)) {
            $source = Yii::getAlias('@webroot/img/categories/source/' . $name);
            if (is_file($source)) {
                unlink($source);
            }
            $formated = Yii::getAlias('@webroot/img/products/large/' . $name);
            if (is_file($formated)) {
                unlink($formated);
            }
        }
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(Products::class, ['category_id' => 'id']);
    }
}
