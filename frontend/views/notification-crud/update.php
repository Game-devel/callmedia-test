<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\notifications\Notifications $model */

$this->title = 'Update Notification: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notification', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notifications-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
