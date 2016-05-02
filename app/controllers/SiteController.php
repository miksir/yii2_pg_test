<?php

namespace app\controllers;

use app\dataProviders\VideoDataProvider;
use app\forms\VideoList;
use yii\data\DataProviderInterface;
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
        $this->redirect(['site/videos']);
    }

    public function actionVideos()
    {
        \Yii::$container->set(DataProviderInterface::class, VideoDataProvider::class);
        $form = \Yii::$container->get(VideoList::class);

        return $this->render('videos', [
            'form' => $form
        ]);
    }
}
