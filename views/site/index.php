<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php if($message): ?>
    <div class="alert alert-success" role="alert">
      Платеж успешно осуществелен
    </div>
<?php endif;?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>