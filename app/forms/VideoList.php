<?php


namespace app\forms;


use yii\base\Model;
use yii\data\DataProviderInterface;
use yii\web\Request;


/**
 * Input data validation
 */
class VideoList extends Model
{
    /** @var DataProviderInterface */
    private $_dataProvider;
    private $_request;
    
    /**
     * @inheritDoc
     */
    public function __construct(DataProviderInterface $dataProvider, Request $request)
    {
        $this->_dataProvider = $dataProvider;
        $this->_request = $request;
        parent::__construct([]);
    }

    public function dataProvider() : DataProviderInterface
    {
        return $this->_dataProvider;
    }
}