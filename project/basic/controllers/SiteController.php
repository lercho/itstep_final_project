<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\{Products, Categories, Basket, Feedback, BlogCategories, Blog};
use yii\data\Pagination;

class SiteController extends Controller {

    public function actionIndex() {
        $categories_arr = Categories::find()->all(); 
        $new_products = Products::find()->orderBy(['createdAt' => SORT_DESC])->limit(4)->asArray()->all();
        $basket = (new Basket())->getBasket();
        $blog_articles_arr = Blog::find()->limit(3)->all();
        return $this->render('index', compact('categories_arr', 'new_products', 'blog_articles_arr', 'basket'));
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionContact() {
        return $this->render('contact');
    }

    public function actionBlog() {
        $blog_categories_arr = BlogCategories::find()->all();
        $articles_arr = Blog::find()->all();
        return $this->render('blog_grid', compact('blog_categories_arr', 'articles_arr'));
    }

    public function actionArticle() {
        $request = \Yii::$app->request;
        $id = $request->get('id'); 
        $article = Blog::find()->where(['id' => $id])->all();
        return $this->render('article', compact('article'));
    }
              
    public function actionProducts() {
        $param = Yii::$app->request->get('s');
        if (!isset($param) || empty($param)) {
            $query = Products::find()->select('id, prod_name, img_1, price');
        } else {
            switch ($param) {
                case 'default' : 
                    $query = Products::find()->select('id, prod_name, img_1, price');
                    break;
                case 'date' : 
                    $query = Products::find()->select('id, prod_name, img_1, price')->orderBy(['createdAt' => SORT_DESC]);
                    break;
                case 'cheap' : 
                    $query = Products::find()->select('id, prod_name, img_1, price')->orderBy(['price' => SORT_ASC]);
                    break;
                case 'expensive' : 
                    $query = Products::find()->select('id, prod_name, img_1, price')->orderBy(['price' => SORT_DESC]);
                    break;
            }
        }
        $basket = (new Basket())->getBasket();
        $products_count = count($query->all());
        $pages = new Pagination ([
            'totalCount' => $query->count(),
            'pageSize' => 8,
            'forcePageParam' => false, 
            'pageSizeParam' => false
        ]);
        $products_arr = $query->offset($pages->offset)
                                ->limit($pages->limit)
                                ->asArray()
                                ->all();
        return $this->render('products', compact('products_arr', 'pages', 'products_count', 'basket'));
    }

    public function actionOneproduct() {
        $request = \Yii::$app->request;
        $id = $request->get('id'); 
        $product = Products::find()->where(['id' => $id])->all();
        if (empty($product)) {
            return $this->render('error');
        }
        return $this->render('oneproduct', compact('product'));
    }

    public function actionCategories($id) {
        $id = Yii::$app->request->get('id');
        $param = Yii::$app->request->get('s');
        if (!isset($param) || empty($param)) {
            $query = Products::find()->select('id, prod_name, img_1, price')->where(['category_id' => $id]);
        } else {
            switch ($param) {
                case 'default' : 
                    $query = Products::find()->select('id, prod_name, img_1, price')->where(['category_id' => $id]);
                    break;
                case 'date' : 
                    $query = Products::find()->select('id, prod_name, img_1, price')->where(['category_id' => $id])->orderBy(['createdAt' => SORT_DESC]);
                    break;
                case 'cheap' : 
                    $query = Products::find()->select('id, prod_name, img_1, price')->where(['category_id' => $id])->orderBy(['price' => SORT_ASC]);
                    break;
                case 'expensive' : 
                    $query = Products::find()->select('id, prod_name, img_1, price')->where(['category_id' => $id])->orderBy(['price' => SORT_DESC]);
                    break;
            }
        }
        $products_count = count($query->all());
        $pages = new Pagination ([
            'totalCount' => $query->count(),
            'pageSize' => 8,
            'forcePageParam' => false, 
            'pageSizeParam' => false
        ]);
        $products_arr = $query->offset($pages->offset)
                                ->limit($pages->limit)
                                ->asArray()
                                ->all();
        return $this->render('products', compact('products_arr', 'pages', 'products_count'));
    }

    public function actionSearch($query = '', $page = 1) {
        $page = (int)$page;
        list($products_arr, $pages, $products_count) = (new Products())->getSearchResult($query, $page);
        return $this->render('search', compact('products_arr', 'pages', 'products_count'));
    }

    public function actionLogout() {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
        }
        return $this->redirect(['login']);
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }
}