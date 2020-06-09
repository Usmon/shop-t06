<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $brands array */
/* @var $title string */
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => $title]
?>
<div class="row">
    <h1><?= $title ?></h1>
    <?php foreach ($brands as $brand): ?>
        <a href="<?=Url::toRoute(['catalog/models', 'brand' => $brand->title])?>">
        <div class="col-lg-3">
            <?= Html::img('img/not-found.png', ['class' => 'img img-responsive img-thumbnail']) ?>
            <h3 class="text-center"><?= $brand->title ?></h3>
        </div>
        </a>
    <?php endforeach; ?>
</div>