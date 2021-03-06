<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'image')->widget('manks\FileInput', [
            //多个图片上传需添加以下参数
            'clientOptions' => [
                'pick' => [
                    'multiple' => true,
                ],
            ],
    ]); ?>

    <?php
        if($this->context->action->id == 'update'){
            echo $form->field($model, 'review')->dropDownList(
                ['0' => '未审核', '1' => '已审核']
            );
        }
     ?>

    <?= $form->field($model, 'column_id')->dropDownList(
        $model->getAllColumns(), ['prompt' => '请选择']
    ) ?>

    <?= $form->field($model,'content')->widget('common\widgets\ueditor\Ueditor', [
        'options'=>[
            'initialFrameWidth' => '100%',
            'initialFrameHeight' => '500',
        ]
    ])?>

    <!-- <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?> -->

<!--<?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
