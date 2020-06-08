<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\car\CarMark;
use app\models\car\CarModel;

/**
 * This command for test seeding.
 */
class SeedController extends Controller
{

    /**
     * Items
     * 
     * @var array $items
     */
    private $items = [
        [
            'mark' => 'Lexus',
            'models' => [
                'ES',
                'GX'
            ],
        ],
        [
            'mark' => 'Toyota',
            'models' => [
                'Camry',
                'Corolla'
            ]
        ]
    ];

    /**
     * Main method
     * @return int Exit code
     */
    public function actionIndex()
    {
        foreach ($this->items as $item) {
            $mark = $this->makeCarMark($item['mark']);

            foreach ($item['models'] as $key => $value) {
                for ($index = 1; $index <=15; $index++) {
                    $fake_name = $value.$index;
                    $this->makeCarModel($mark->id, $fake_name, rand(1,3), rand(1,2));
                }
            }
        }

        return ExitCode::OK;
    }

    /**
     * Create model of car model
     * 
     * @param integer $id_mark
     * @param string $name
     * @param integer $engine
     * @param integer $drive
     * 
     * @return \app\models\car\CarModel $model
     */
    private function makeCarModel($id_mark, $name, $engine, $drive)
    {
        $model = new CarModel([
            'id_car_mark' => $id_mark, 
            'name' => $name,
            'engine' => $engine,
            'drive' => $drive
        ]);
        $model->save();

        return $model;
    }

    /**
     * Create model of mark
     * 
     * @param string $name
     * 
     * @return \app\models\car\CarMark
     */
    private function makeCarMark($name)
    {
        $model = new CarMark(['title' => $name]);
        $model->save();

        return $model;
    }
}
