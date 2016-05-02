<?php


namespace app\widgets;


use yii\base\Model;
use yii\base\Widget;

class VideoItemPreview extends Widget
{
    /** @var Model */
    public $model;

    /**
     * @inheritDoc
     */
    public function run()
    {
        $formatter = \Yii::$app->formatter;

        return $this->render('video_item', [
            'model' => $this->model,
            'formatter' => $formatter,
        ]);
    }


}