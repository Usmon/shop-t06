<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
 
 <div class="col-lg-4">
    <?= Html::img('/img/not-found.png', ['class' => 'img img-responsive img-thumbnail']) ?>
    <h3 class="text-center"><?= $model->name ?></h3>
</div>