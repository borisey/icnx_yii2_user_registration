<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;
?>

<?php $form = ActiveForm::begin();?>
<?= $form->field($model, 'username') ?>
<?php
print $form->field($model, 'phone')->widget(MaskedInput::className(), [
    'mask' => "+7 (999) 999-99-99",
    'clientOptions' => [
        'removeMaskOnSubmit' => true,
    ]
]);
?>
<?= $form->field($model, 'email') ?>
<?php
echo $form->field($model, 'child_birthday')->widget(DatePicker::className(),[
    'name' => 'child_birthday',
    'type' => DatePicker::TYPE_INPUT,
    'convertFormat' => true,
    'value'=> date("yyyy-MM-dd",(integer) $model->child_birthday),
    'pluginOptions' => [
        'format' => 'yyyy-MM-dd',
        'autoclose' => true,
        'weekStart' => 1,
    ]
]);
?>
<?= $form->field($model, 'agree')->checkbox(['checked' => false])?>
<div class="form-group">
    <div>
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>