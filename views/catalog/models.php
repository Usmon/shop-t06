<?php

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
        <h3>Филтер</h3>
        
    </div>
    <div class="col-lg-9">
        <div class="row">
            <?php
                echo ListView::widget([
                    'dataProvider' => $provider,
                    'itemView' => '_list',
                ]);
            ?>
        </div>
    </div>
</div>