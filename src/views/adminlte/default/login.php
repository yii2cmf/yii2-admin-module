<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?= Html::beginForm(['default/login'], 'POST') ?>

            <?= Html::beginTag('div', ['class' => 'input-group mb-3']) ?>
              <?= Html::activeTextInput($model,'username', ['class' => 'form-control', 'type' => 'text', 'placeholder' => 'Username']) ?>
              <?= Html::beginTag('div', ['class' => 'input-group-append']) ?>
               <?= Html::beginTag('div', ['class' => 'input-group-text']) ?>
                <?= Html::tag('span', '',['class' => 'fas fa-envelope']) ?>
               <?= Html::endTag('div') ?>
              <?= Html::endTag('div') ?>
            <?= Html::endTag('div') ?>

            <?= Html::beginTag('div', ['class' => 'input-group mb-3']) ?>
             <?= Html::activePasswordInput($model,'password', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
             <?= Html::beginTag('div', ['class' => 'input-group-append']) ?>
               <?= Html::beginTag('div', ['class' => 'input-group-text']) ?>
                 <?= Html::tag('span', '',['class' => 'fas fa-lock']) ?>
               <?= Html::endTag('div') ?>
             <?= Html::endTag('div') ?>
            <?= Html::endTag('div') ?>

            <?= Html::beginTag('div', ['class' => 'row']) ?>
              <?= Html::beginTag('div', ['class' => 'col-8']) ?>
                <?= Html::beginTag('div', ['class' => 'icheck-primary']) ?>

                  <?= Html::activeInput('checkbox', $model, 'rememberMe',['id' => 'remember']) ?>
                  <?= Html::activeLabel($model,'rememberMe',['for' => 'remember']) ?>

                <?= Html::endTag('div') ?>
              <?= Html::endTag('div') ?>
              <?= Html::beginTag('div', ['class' => 'col-4']) ?>
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
              <?= Html::endTag('div') ?>
            <?= Html::endTag('div') ?>
            <?= Html::endForm() ?>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->