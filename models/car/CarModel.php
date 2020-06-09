<?php

namespace app\models\car;

use Yii;

/**
 * This is the model class for table "car_models".
 *
 * @property int $id
 * @property int $id_car_mark
 * @property string $name
 * @property int $engine
 * @property int $drive
 *
 * @property CarMarks $carMark
 */
class CarModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_models';
    }

    /**
     * @var array $engines
     */
    protected static $engines = [
        1 => 'Бензин',
        2 => 'Дизель',
        3 => 'Гибрид'
    ]; 

    /**
     * @var array $engines
     */
    protected static $drives = [
        1 => 'Полный',
        2 => 'Передний',
    ]; 

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_car_mark', 'name', 'engine', 'drive'], 'required'],
            [['id_car_mark', 'engine', 'drive'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_car_mark'], 'exist', 'skipOnError' => true, 'targetClass' => CarMark::className(), 'targetAttribute' => ['id_car_mark' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_car_mark' => 'Id Car Mark',
            'name' => 'Name',
            'engine' => 'Engine',
            'drive' => 'Drive',
        ];
    }

    /**
     * Gets query for [[CarMark]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarMark()
    {
        return $this->hasOne(CarMarks::className(), ['id' => 'id_car_mark']);
    }

    /**
     * @param null|integer $key
     * 
     * @return string|array
     */
    public static function getEngines($key = null)
    {
        if ($key)
            return self::$engines[$key];
        
        return self::$engines;
    }

    /**
     * @param null|integer $key
     * 
     * @return string|array
     */
    public static function getDrives($key = null)
    {
        if ($key)
            return self::$drives[$key];
        
        return self::$drives;
    }
}
