<?php

use yii\db\Migration;

/**
 * Class m200615_114607_add_subtables_curriculum
 */
class m200615_114607_add_subtables_curriculum extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('curriculum_experience', [
            'id' => $this->primaryKey(),
            'id_curriculum' => $this->integer()->notNull(),
            'name' => $this->string(150),
            'role' => $this->string(250),
            'year_init' => $this->smallInteger(),
            'year_end' => $this->smallInteger()  
        ]);

        $this->createTable('curriculum_graduate', [
            'id' => $this->primaryKey(),
            'id_curriculum' => $this->integer()->notNull(),
            'name' => $this->string(150),
            'institute' => $this->string(150),
            'year_init' => $this->smallInteger(),
            'year_end' => $this->smallInteger()       
        ]);

        $this->createTable('curriculum_language', [
            'id' => $this->primaryKey(),
            'id_curriculum' => $this->integer()->notNull(),
            'name' => $this->string(10),
            'level' => $this->smallInteger(), 
        ]);

        $this->createIndex(
            'curriculum_experience_id_curriculum_idx',
            'curriculum_experience',
            'id_curriculum'
        );

        $this->addForeignKey('curriculum_experience_id_curriculum_fk',
            'curriculum_experience',
            'id_curriculum',
            'curriculum',
            'id', 
            'CASCADE'
        );

        $this->createIndex(
            'curriculum_graduate_id_curriculum_idx',
            'curriculum_graduate',
            'id_curriculum'
        );

        $this->addForeignKey('curriculum_graduate_id_curriculum_fk',
            'curriculum_graduate',
            'id_curriculum',
            'curriculum',
            'id', 
            'CASCADE'
        );

        $this->createIndex(
            'curriculum_language_id_curriculum_idx',
            'curriculum_language',
            'id_curriculum'
        );

        $this->addForeignKey('curriculum_language_id_curriculum_fk',
            'curriculum_language',
            'id_curriculum',
            'curriculum',
            'id', 
            'CASCADE'
        );

        Yii::$app->cache->flush();
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'curriculum_experience_id_curriculum_fk',
            'curriculum_experience'
        );
        
        $this->dropIndex(
            'curriculum_experience_id_curriculum_idx',
            'curriculum_experience'
        );

        $this->dropForeignKey(
            'curriculum_graduate_id_curriculum_fk',
            'curriculum_graduate'
        );
        
        $this->dropIndex(
            'curriculum_graduate_id_curriculum_idx',
            'curriculum_graduate'
        );

        $this->dropForeignKey(
            'curriculum_language_id_curriculum_fk',
            'curriculum_language'
        );
        
        $this->dropIndex(
            'curriculum_language_id_curriculum_idx',
            'curriculum_language'
        );

        $this->dropTable('curriculum_experience');
        $this->dropTable('curriculum_graduate');
        $this->dropTable('curriculum_language');

        Yii::$app->cache->flush();
        return true;
    }


}
