<?php

namespace app\models\car;

use Yii;

/**
 * This is the model class for table "car_marks".
 *
 * @property int $id
 * @property string $title
 *
 * @property CarModels[] $carModels
 */
class CarMark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_marks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[CarModels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarModels()
    {
        return $this->hasMany(CarModel::className(), ['id_car_mark' => 'id']);
    }
}
