<?php

namespace app\controllers;

use app\models\Video;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model = Video::find()->orderBy(['views' => SORT_DESC])->offset(800000)->limit(50)->all();
        
        return print_r($model[0], true);
        //return $this->render('index');
    }
}
