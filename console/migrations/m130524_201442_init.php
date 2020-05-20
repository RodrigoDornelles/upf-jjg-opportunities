<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function safeUp()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32)->notNull(),
            'login' => $this->string(32)->notNull()->unique(),
            'is_admin' => $this->boolean()->defaultValue(false)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'date_created_at' => $this->dateTime()->notNull(),
            'date_updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->insert('admin',[
            'username' => 'Web Master',
            'login' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'password_reset_token' => Yii::$app->security->generateRandomString(),
            'is_admin' => true,
            'date_created_at' => new \yii\db\Expression('NOW()'),
            'date_updated_at' => new \yii\db\Expression('NOW()')
        ]);

        Yii::$app->cache->flush();
        return true;
    }

    public function safeDown()
    {
        $this->dropTable('admin');
        Yii::$app->cache->flush();
        return true;
    }
}
