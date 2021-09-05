<?php

/* @var $this yii\web\View */
/* @var $dataProvider SiteController*/

use frontend\controllers\SiteController;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Валюты';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <h1>Загрузить валюты:</h1>
    <?php $form = ActiveForm::begin(['action' => '/download/currency']); ?>

    <div class="form-group">
        <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end() ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'nominal',
            'num_code',
            'char_code',
            'cbr_id',
        ],
    ]);
    ?>

</div>