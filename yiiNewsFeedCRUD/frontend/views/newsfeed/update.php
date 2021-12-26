<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="starter-template">
        <div class="page-header-extended">
            <h2 class="page-title"><strong>EDIT NEWS</strong> 📰👇</h2>
        </div>

        <div style="margin-left:40%;">
        <?php $form = ActiveForm::begin() ?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-12">
                    <?= $form->field($newsfeed,'title'); ?>
                </div>
            </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($newsfeed,'description'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($newsfeed,'author_name'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($newsfeed,'author_email'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= Html::submitButton('Update',['class'=>'btn btn-success']); ?>
            </div>
        </div>
        </div>

        <?php ActiveForm::end() ?>
        </div>
    </div>
</div>