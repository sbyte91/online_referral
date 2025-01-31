<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\referral\Testbid */

$this->title = 'Update Testbid: ' . $model->test_bid_id;
$this->params['breadcrumbs'][] = ['label' => 'Testbids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->test_bid_id, 'url' => ['view', 'id' => $model->test_bid_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testbid-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
