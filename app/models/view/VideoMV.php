<?php


namespace app\models\view;
use app\models\Video;

/**
 * @property int $rows_time_add
 * @property int $rows_views
 */
class VideoMV extends Video
{
    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return 'videos_mv';
    }

    /**
     * @inheritDoc
     */
    public static function instantiate($row)
    {
        return new Video();
    }


}