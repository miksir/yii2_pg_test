<?php

use yii\db\Migration;

/**
 * Handles the creation for table `videos_index_mv`.
 */
class m160430_234242_create_videos_index_mv extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute('
            CREATE MATERIALIZED VIEW videos_mv AS 
             SELECT videos.*,
                row_number() OVER (ORDER BY videos.time_add ASC) AS rows_time_add,
                row_number() OVER (ORDER BY videos.views ASC) AS rows_views
               FROM videos
            WITH DATA;
        ');

        $this->createIndex('videos_mv_rows_time_add', 'videos_mv', 'rows_time_add');
        $this->createIndex('videos_mv_rows_views', 'videos_mv', 'rows_views');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->execute("DROP MATERIALIZED VIEW videos_mv");
    }
}
