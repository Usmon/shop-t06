<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_models}}`.
 */
class m200608_102307_create_car_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_models}}', [
            'id' => $this->primaryKey(),
            'id_car_mark' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'engine' => $this->tinyInteger()->notNull(),
            'drive' => $this->tinyInteger()->notNull(),
        ]);

        //Add foreign key for table `car_marks`
        $this->addForeignKey(
            'fk-car_model-id_car_mark',
            'car_models',
            'id_car_mark',
            'car_marks',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_models}}');
    }
}
