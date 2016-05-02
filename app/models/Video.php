<?php

namespace app\models;

use app\models\query\VideoQuery;
use yii\db\ActiveRecord;

/**
 * Class Video
 * @package app\models
 * @property string $id
 * @property string $title
 * @property integer $duration
 * @property integer $views
 * @property integer $time_add
 */
class Video extends ActiveRecord
{
    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * @inheritDoc
     * @return VideoQuery
     */
    public static function find()
    {
        return new VideoQuery();
    }


}