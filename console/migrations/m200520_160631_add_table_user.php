<?php

use yii\db\Migration;

/**
 * Class m200520_160631_add_table_user
 */
class m200520_160631_add_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            'contry' => $this->char(2)->notNull(),
            'status' => $this->char(1)->notNull()->defaultValue('I'),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'verification_token' => $this->string()->unique(),
            'date_birth' => $this->dateTime()->notNull(),
            'date_created_at' => $this->dateTime()->notNull(),
            'date_updated_at' => $this->dateTime()->notNull(),
        ]);

        Yii::$app->cache->flush();
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
        Yii::$app->cache->flush();
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200520_160631_add_table_user cannot be reverted.\n";

        return false;
    }
    */
}
