<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use frontend\modules\inter\helpers\ComboHelper;
use frontend\modules\inter\Module as m;
?>

<div class="login-box">    
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="alert alert-danger">
            
           <?=\m::t('validaciones','The supplied token is not correct or it has been a long time and has expired, please re-authenticate')?>
        </div>

     
        
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

