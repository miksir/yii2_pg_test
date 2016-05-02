<?php
/**
 * @var $this yii\web\View
 * @var $form \app\forms\VideoList
 */
$dataProvider = $form->dataProvider();
$this->title = 'Video list';
$dataProvider->getModels();
?>
<div class="site-index">

    <h1>Videos</h1>

    <div class="row">
        <?=\yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => function($model) {
                return \app\widgets\VideoItemPreview::widget(['model' => $model]);
            },
            'layout' => '{sorter}{items}{pager}',
            'sorter' => [
                'class' => \app\widgets\DefaultSorter::class,
            ],
            'pager' => [
                'class' => \app\widgets\LinkPagerCustom::class
            ]
        ])?>
    </div>

</div>
