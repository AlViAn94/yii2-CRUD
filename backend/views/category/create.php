<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Category $model */

$this->title = Yii::t('app', 'Create Category');
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
