<?php

use yii\widgets\Pjax;
use yii\widgets\ListView;
?>
<?php Pjax::begin(['id' => 'models-list']); ?>
    <?php
        echo ListView::widget([
            'id' => 'list-models',
            'dataProvider' => $provider,
            'itemView' => '_list',
        ]);
    ?>
<?php Pjax::end(); ?>