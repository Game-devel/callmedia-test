<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\notifications\Notification $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notifications-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'integrator')->dropDownList($model::getTypeList(), ['prompt' => '---']) ?>

    <?= $form->field($model, 'status')->dropDownList($model::getStatusList(), ['prompt' => '---']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
