<?php

namespace app\controllers;

use app\models\car\CarMark;
use app\models\car\carModel;
use yii\data\ActiveDataProvider;

/**
 * CatalogController
 * 
 * @package \app\controllers\CatalogController
 */
class CatalogController extends \yii\web\Controller
{
    private $title = 'Продажа новых автомобилей :n в Санкт-Петербурге';

    /**
     * Show brands
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        $title = $this->getTitle();
        $brands = CarMark::find()->all();

        return $this->render('index', compact('brands', 'title'));
    }

    /**
     * Show models by brand
     * 
     * @param string $brand
     * @return mixed
     */
    public function actionModels($brand)
    {
        $mark = CarMark::find()
                ->where(['title' => $brand])
                ->one();
        $title = $this->getTitle($mark->title);

        $provider = new ActiveDataProvider([
            'query' => $mark->getCarModels(),
            'pagination' => [
                'pageSize' => 9,
            ],
            'sort' => [
                'defaultOrder' => [
                    'name' => SORT_ASC, 
                ]
            ],
        ]);

        return $this->render('models', compact('provider', 'title'));
    }

    /**
     * Draw title
     * 
     * @param null|string $name
     * @return string
     */
    private function getTitle($name = null)
    {
        if ($name) 
            return str_replace(':n', $name, $this->title);
        
        return str_replace( ' :n', '', $this->title);
    }

}
