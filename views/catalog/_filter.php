<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\car\CarModel;

/** @var mixed $filter_form */
?>

<h3>Filter</h3>
<?php $form = ActiveForm::begin(['id' => 'login-form', 'method' => 'GET']); ?>

    <?= 
        $form->field($model, 'engine')->dropDownList(CarModel::getEngines());
    ?>

    <?= 
        $form->field($model, 'drive')->dropDownList(CarModel::getDrives());
    ?>

    <div class="form-group">
        <?= Html::submitButton('Filter', ['class' => 'btn btn-sm btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>