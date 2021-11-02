<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Products;
use yii\data\ActiveDataProvider;
use app\modules\admin\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends AdminController
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionProductsByCategory($id) {
        $id = Yii::$app->request->get('id');
        $products_arr = Products::find()->where(['category_id' => $id])->all();
        return $this->render('index', compact('products_arr'));
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {
            $model->upload = UploadedFile::getInstance($model, 'img_1');
            if ($name = $model->uploadImage()) { 
            $model->img_1 = $name;
            }
            $model->upload = UploadedFile::getInstance($model, 'img_2');
            if ($name = $model->uploadImage()) { 
            $model->img_2 = $name;
            }
            $model->upload = UploadedFile::getInstance($model, 'img_3');
            if ($name = $model->uploadImage()) { 
            $model->img_3 = $name;
            }
            $model->upload = UploadedFile::getInstance($model, 'img_4');
            if ($name = $model->uploadImage()) { 
            $model->img_4 = $name;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
       }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id) {

        $model = $this->findModel($id);
        $old_1 = $model->img_1;
        $old_2 = $model->img_2;
        $old_3 = $model->img_3;
        $old_4 = $model->img_4;

        if ($model->load(Yii::$app->request->post())) {
            $model->upload = UploadedFile::getInstance($model, 'img_1');
            if ($new = $model->uploadImage()) { 
                if (!empty($old_1)) {
                    $model::removeImage($old_1);
                }
                $model->img_1 = $new;
            }
            $model->upload = UploadedFile::getInstance($model, 'img_2');
            if ($new = $model->uploadImage()) { 
                if (!empty($old_2)) {
                    $model::removeImage($old_2);
                }
                $model->img_2 = $new;
            }
            $model->upload = UploadedFile::getInstance($model, 'img_3');
            if ($new = $model->uploadImage()) { 
                if (!empty($old_3)) {
                    $model::removeImage($old_3);
                }
                $model->img_3 = $new;
            }
            $model->upload = UploadedFile::getInstance($model, 'img_4');
            if ($new = $model->uploadImage()) { 
                if (!empty($old_4)) {
                    $model::removeImage($old_4);
                }
                $model->img_4 = $new;
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', compact(['model']));
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
