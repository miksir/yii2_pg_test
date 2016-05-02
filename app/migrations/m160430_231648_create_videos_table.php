<?php

use yii\db\Migration;

/**
 * Handles the creation for table `videos_table`.
 */
class m160430_231648_create_videos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('
            CREATE TABLE videos
            (
              id uuid NOT NULL,
              title text NOT NULL,
              duration integer NOT NULL,
              views integer NOT NULL DEFAULT 0,
              time_add timestamp with time zone NOT NULL DEFAULT now(),
              CONSTRAINT videos_pkey PRIMARY KEY (id)
            )
            WITH (
              OIDS=FALSE
            );
         ');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('videos');
    }
}
