<?php


namespace app\widgets;


use yii\bootstrap\ButtonDropdown;
use yii\helpers\Html;
use yii\widgets\LinkPager;

class LinkPagerCustom extends LinkPager
{
    /**
     * @var string per page button label
     */
    public $perPageLabel = 'Items per page';

    /**
     * @var array per page variants
     */
    public $perPageVariants = [20, 40, 120, 400];

    public $options = ['class' => 'pagination pull-left'];

    /**
     * @inheritDoc
     */
    protected function renderPageButtons()
    {
        return Html::tag('div', parent::renderPageButtons() . $this->renderPerPageButton(), ['class' => 'clearfix']);
    }

    protected function renderPerPageButton()
    {
        $links = [];
        foreach ($this->perPageVariants as $name) {
            $links[] = Html::tag(
                'li',
                Html::a($name, $this->pagination->createUrl(0, $name), [
                    'tabindex' => '-1'
                ])
            );
        }

        return ButtonDropdown::widget([
            'label' => $this->perPageLabel,
            'dropdown' => [
                'items' => $links
            ],
            'containerOptions' => $this->options
        ]);
    }
}