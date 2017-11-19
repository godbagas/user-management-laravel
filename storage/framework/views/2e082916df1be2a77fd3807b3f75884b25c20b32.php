<?php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

?>


<div class="panel panel-primary <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?> panel-info  <?php endif; ?>">
    <div class="panel-heading">

        Welcome <?php echo e(Auth::user()->name); ?>


        <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?>
            <span class="pull-right label label-primary" style="margin-top:4px">
            Admin
            </span>
        <?php else: ?>
            <span class="pull-right label label-warning" style="margin-top:4px">
            User
            </span>
        <?php endif; ?>

    </div>
    <div class="panel-body">
        <h2 class="lead">
            <?php echo e(trans('auth.loggedIn')); ?>

        </h2>
        <p>
            Akun telah diaktivasi
        </p>
        <hr>

        <h4>
            You have
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                   Admin
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('user')): ?>
                   User
                <?php endif; ?>
            Access
        </h4>

        <hr>

        <h4>
            You have access to <?php echo e($levelAmount); ?>:
            <?php if (Auth::check() && Auth::user()->level() >= 5): ?>
                <span class="label label-primary margin-half">5</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 4): ?>
                <span class="label label-info margin-half">4</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 3): ?>
                <span class="label label-success margin-half">3</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 2): ?>
                <span class="label label-warning margin-half">2</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 1): ?>
                <span class="label label-default margin-half">1</span>
            <?php endif; ?>
        </h4>

        <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>

            <hr>

            <h4>
                You have permissions:
                <?php if (Auth::check() && Auth::user()->hasPermission('view.users')): ?>
                    <span class="label label-primary margin-half margin-left-0"">
                        <?php echo e(trans('permsandroles.permissionView')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('create.users')): ?>
                    <span class="label label-info margin-half margin-left-0"">
                        <?php echo e(trans('permsandroles.permissionCreate')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('edit.users')): ?>
                    <span class="label label-warning margin-half margin-left-0"">
                        <?php echo e(trans('permsandroles.permissionEdit')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('delete.users')): ?>
                    <span class="label label-danger margin-half margin-left-0"">
                        <?php echo e(trans('permsandroles.permissionDelete')); ?>

                    </span>
                <?php endif; ?>

            </h4>

        <?php endif; ?>

    </div>
</div>
