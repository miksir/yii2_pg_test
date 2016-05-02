<?php


namespace app\dataProviders;

use app\models\queries\VideoQuery;
use app\models\Video;
use yii\data\ActiveDataProvider;

class VideoDataProvider extends ActiveDataProvider
{
    private $_sortDeclaration = [
        'attributes' => [
            'views' => [
                'default' => SORT_DESC,
                'label' => 'Views',
            ],
            'date' => [
                'asc' => ['time_add' => SORT_ASC],
                'desc' => ['time_add' => SORT_DESC],
                'default' => SORT_DESC,
                'label' => 'Date',
            ]
        ],
        'defaultOrder' => [
            'date' => SORT_DESC
        ]
    ];

    private $_paginationDeclaration = [
        'pageSizeLimit' => [4, 400],
    ];

    /**
     * @inheritDoc
     */
    public function __construct(array $config = [])
    {
        if (!array_key_exists('query', $config)) {
            $config['query'] = $this->getQuery();
        }
        if (!array_key_exists('sort', $config)) {
            $config['sort'] = $this->_sortDeclaration;
        }
        if (!array_key_exists('pagination', $config)) {
            $config['pagination'] = $this->_paginationDeclaration;
        }
        parent::__construct($config);
    }

    /**
     * @return VideoQuery
     */
    private function getQuery() : VideoQuery
    {
        return Video::find();
    }

    /**
     * @inheritDoc
     * @return Video[]
     */
    public function getModels()
    {
        return parent::getModels();
    }
}