<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('auth.register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
        <main class="mdl-layout__content padding-top-2-tablet padding-bottom-2-tablet">
            <div class="mdl-grid mdl-grid--no-spacing">
                <div class="mdl-cell--6-col-tablet mdl-cell--1-offset-tablet mdl-cell--6-col-desktop mdl-cell--3-offset-desktop ">
                    <div class="demo-card-full mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title diagmonds-bg mdl-color-text--white">
                            <h2 class="mdl-card__title-text text-center full-span block">
                                <?php echo e(trans('titles.register')); ?>

                            </h2>
                        </div>
                        <div class="mdl-card__supporting-text ">
                            <?php echo Form::open(['route' => 'register', 'id' => 'register', 'role' => 'form', 'method' => 'POST'] ); ?>


                                <?php echo e(csrf_field()); ?>


                                <div class="mdl-grid ">

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('name') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::text('name', null, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,0-9]*')); ?>

                                            <?php echo Form::label('name', trans('auth.name') , array('class' => 'mdl-textfield__label'));; ?>

                                            <span class="mdl-textfield__error"><?php if($errors->has('name')): ?><?php echo e($errors->first('name')); ?> <?php endif; ?></span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('email') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::email('email', null, array('id' => 'email', 'class' => 'mdl-textfield__input' )); ?>

                                            <?php echo Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label'));; ?>

                                            <span class="mdl-textfield__error"><?php if($errors->has('email')): ?><?php echo e($errors->first('email')); ?> <?php endif; ?></span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('first_name') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::text('first_name', null, array('id' => 'first_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')); ?>

                                            <?php echo Form::label('first_name', trans('auth.first_name') , array('class' => 'mdl-textfield__label'));; ?>

                                            <span class="mdl-textfield__error"><?php if($errors->has('first_name')): ?><?php echo e($errors->first('first_name')); ?> <?php endif; ?> </span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('last_name') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::text('last_name', null, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')); ?>

                                            <?php echo Form::label('last_name', trans('auth.last_name') , array('class' => 'mdl-textfield__label'));; ?>

                                            <span class="mdl-textfield__error"><?php if($errors->has('last_name')): ?><?php echo e($errors->first('last_name')); ?> <?php endif; ?> </span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('password') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::password('password', array('id' => 'password', 'class' => 'mdl-textfield__input', 'required' => 'required' )); ?>

                                            <?php echo Form::label('password', trans('auth.password') , array('class' => 'mdl-textfield__label'));; ?>

                                            <span class="mdl-textfield__error"><?php if($errors->has('password')): ?><?php echo e($errors->first('password')); ?> <?php endif; ?></span>
                                        </div>
                                    </div>
                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('password_confirmation') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'mdl-textfield__input', 'required' => 'required' )); ?>

                                            <?php echo Form::label('password_confirmation', trans('auth.confirmPassword') , array('class' => 'mdl-textfield__label'));; ?>

                                            <span class="mdl-textfield__error"><?php if($errors->has('password_confirmation')): ?><?php echo e($errors->first('password_confirmation')); ?> <?php endif; ?></span>
                                        </div>
                                    </div>

                                    <?php if(config('settings.reCaptchStatus')): ?>
                                        <div class="mdl-cell mdl-cell--12-col">
                                            <div class="g-recaptcha" data-sitekey="<?php echo e(env('RE_CAP_SITE')); ?>"></div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="mdl-cell mdl-cell--12-col">
                                        <?php echo Form::button('<span class="mdl-spinner-text">'.trans('auth.register').'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--primary mdl-color-text--white mdl-button--raised full-span margin-bottom-1 margin-top-2','type' => 'submit','id' => 'submit')); ?>

                                    </div>
                                </div>

                            <?php echo Form::close(); ?>

                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <?php echo HTML::link(route('password.request'), trans('auth.forgot'), array('id' => 'forgot', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect left')); ?>

                            <?php echo HTML::link(url('/login'), trans('auth.login'), array('id' => 'login', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect right')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.mdl-required-input-fix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('scripts.html5-password-match-check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo HTML::script('https://www.google.com/recaptcha/api.js', array('type' => 'text/javascript')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>