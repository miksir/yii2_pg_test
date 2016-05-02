<?php


namespace app\widgets;


use yii\{
    base\InvalidConfigException, base\Widget, bootstrap\ButtonDropdown, data\Sort, helpers\Html
};

/**
 * Render sort button
 */
class DefaultSorter extends Widget
{
    /**
     * @var string label for sort block
     */
    public $sortLabel = 'Sort';

    /**
     * @var Sort the sort definition
     */
    public $sort;

    public $options = ['class' => 'pagination pull-right'];

    /**
     * Initializes the sorter.
     */
    public function init()
    {
        if ($this->sort === null) {
            throw new InvalidConfigException('The "sort" property must be set.');
        }
    }
    
    /**
     * Executes the widget.
     * This method renders the sort links.
     */
    public function run()
    {
        return Html::tag('div', $this->renderSortButtonDropdown(), ['class' => 'clearfix']);
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function renderSortButtonDropdown() : string
    {
        $attributes = array_keys($this->sort->attributes);

        $links = [];
        foreach ($attributes as $name) {
            $links[] = Html::tag('li', $this->sort->link($name, [
                'tabindex' => '-1'
            ]));
        }

        return ButtonDropdown::widget([
            'label' => $this->sortLabel,
            'dropdown' => [
                'items' => $links
            ],
            'containerOptions' => $this->options
        ]);
    }

}