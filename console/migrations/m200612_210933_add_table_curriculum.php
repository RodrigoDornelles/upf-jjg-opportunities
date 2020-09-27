<?php

use yii\db\Migration;

/**
 * Class m200612_210933_add_table_curriculum
 */
class m200612_210933_add_table_curriculum extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('curriculum', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->unique()->notNull(),
            'abstract' => $this->string(522),
            'experience' => $this->text(),
            'graduate' => $this->text(),
            'language' => $this->text(),
            'public' => $this->boolean()->defaultValue(false),
            'date_created_at' => $this->dateTime()->notNull(),
            'date_updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'curriculum_id_user_idx',
            'curriculum',
            'id_user'
        );

        $this->addForeignKey('curriculum_id_user_fk',
            'curriculum',
            'id_user',
            'user',
            'id', 
            'CASCADE'
        );

        $this->addCommentOnColumn('curriculum', 'experience', 'JSON with previous jobs');
        $this->addCommentOnColumn('curriculum', 'graduate', 'JSON with an academic background');
        $this->addCommentOnColumn('curriculum', 'language', 'JSON with understood languages');
        Yii::$app->cache->flush();
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'curriculum_id_user_fk',
            'curriculum'
        );
        
        $this->dropIndex(
            'curriculum_id_user_idx',
            'curriculum'
        );

        $this->dropTable('curriculum');

        Yii::$app->cache->flush();
        return true;
    }
    
}
