<?php

namespace app\controllers;

use Yii;
use app\models\car\CarMark;
use app\models\car\CarModel;
use app\models\car\ModelFilterForm;
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

        $query = $mark->getCarModels();
        $title = $this->getTitle($mark->title);

        $filter_model = new ModelFilterForm();

        if($filter_model->load(Yii::$app->request->get())) {
            $query->where([
                'engine' => $filter_model->engine,
                'drive' => $filter_model->drive
            ]);
        } 

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 9,
            ],
            'sort' => [
                'defaultOrder' => [
                    'name' => SORT_ASC, 
                ]
            ],
        ]);

        if(Yii::$app->request->isAjax) 
            return $this->renderPartial('_list-view', compact('provider'));

        return $this->render('models', compact('provider', 'title', 'filter_model'));
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
