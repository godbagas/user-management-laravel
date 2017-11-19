<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('auth.resetPassword')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mdl-layout mdl-js-layout mdl-color--grey-100 mdl-auth-form">
        <main class="mdl-layout__content_auth">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title diagmonds-bg mdl-color-text--white" >
                    <h2 class="mdl-card__title-text text-center full-span block">

                        <?php echo e(trans('titles.resetPword')); ?>


                    </h2>
                </div>
                <div class="mdl-card__supporting-text">

                    <?php echo Form::open(array('url' => '/password/email', 'method' => 'POST', 'class' => 'auth-form', 'id' => 'reset')); ?>


                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('email') ? 'is-invalid' :''); ?>">
                            <?php echo Form::email('email', null, array('id' => 'email', 'class' => 'mdl-textfield__input', )); ?>

                            <?php echo Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label'));; ?>

                            <span class="mdl-textfield__error"><?php if($errors->has('email')): ?><?php echo e($errors->first('email')); ?> <?php endif; ?></span>
                        </div>

                        <?php if(config('settings.reCaptchStatus')): ?>
                            <div class="g-recaptcha" data-sitekey="<?php echo e(env('RE_CAP_SITE')); ?>"></div>
                        <?php endif; ?>

                        <?php echo Form::button('<span class="mdl-spinner-text">'.trans('auth.sendResetLink').'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--primary mdl-color-text--white mdl-button--raised full-span margin-bottom-1 margin-top-2','type' => 'submit','id' => 'submit')); ?>


                    <?php echo Form::close(); ?>


                </div>
                <div class="mdl-card__actions mdl-card--border">

                    <?php echo HTML::link(url('/register'), trans('auth.register'), array('id' => 'register', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect left')); ?>

                    <?php echo HTML::link(url('/login'), trans('auth.login'), array('id' => 'login', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect right')); ?>


                </div>
            </div>
        </main>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <?php echo HTML::script('https://www.google.com/recaptcha/api.js', array('type' => 'text/javascript')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>