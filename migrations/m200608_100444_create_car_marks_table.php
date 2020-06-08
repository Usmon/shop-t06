<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_marks}}`.
 */
class m200608_100444_create_car_marks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_marks}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_marks}}');
    }
}
