<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\{Categories, Products};
use yii\data\ActiveDataProvider;
use app\modules\admin\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex() {
        $categories = Categories::getAllCategories();
        return $this->render('index', compact(['categories']));
    }

    public function actionProducts($id) {
        $id = Yii::$app->request->get('id');
        $category = Categories::find()->select('category_name')->where(['id' => $id])->all();
        $category_name = $category[0]->category_name;
        $products_arr = Products::find()->where(['category_id' => $id])->all();
        return $this->render('products', compact('products_arr', 'category_name'));
    }

    /**
     * Displays a single Categories model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Categories();
        if ($model->load(Yii::$app->request->post())) {
            $model->upload = UploadedFile::getInstance($model, 'img');
            if ($name = $model->uploadImage()) { 
            $model->img = $name;
        }
            $model->save();
            return $this->redirect(['index']);
       }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $old = $model->img;
        if ($model->load(Yii::$app->request->post())) {
            $model->upload = UploadedFile::getInstance($model, 'img');
            if ($new = $model->uploadImage()) {
                if (!empty($old)) {
                    $model::removeImage($old);
                }
                $model->img = $new;
            }
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
