<?php

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $brands array */
/* @var $title string */
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Марки', 'url' => '/'];
$this->params['breadcrumbs'][] = ['label' => $title];
?>
<div class="row">
    <h1><?= $title ?></h1>
    <div class="col-lg-3">
        <?= $this->render('_filter', ['model' => $filter_model]) ?>
    </div>
    <div class="col-lg-9">
        <div class="row">
        <?php Pjax::begin(['id' => 'models-list']); ?>
            <?php
                echo ListView::widget([
                    'dataProvider' => $provider,
                    'itemView' => '_list',
                ]);
            ?>
        <?php Pjax::end(); ?>
        </div>
    </div>
</div>