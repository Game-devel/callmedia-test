<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\notifications\Notifications $model */

$this->title = 'Create Notification';
$this->params['breadcrumbs'][] = ['label' => 'Notification', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
