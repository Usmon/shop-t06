<?php

use yii\helpers\Html;
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
        <div class="row" id="list-container">
        <?= $this->render('_list-view', compact('provider')) ?>
        </div>
    </div>
</div>