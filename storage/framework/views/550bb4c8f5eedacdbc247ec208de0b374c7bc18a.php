<?php $__env->startSection('template_title'); ?>
    Deleted Users
<?php $__env->stopSection(); ?>

<?php 
    $dataTablesShowCount = 5;   // Number of users at which to show the datatables
    $deletedUsersCount = count($users);
 ?>

<?php $__env->startSection('header'); ?>
    Showing Deleted Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo e(url('/')); ?>">
            <span itemprop="name">
                <?php echo e(trans('titles.app')); ?>

            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="/users" disabled>
            <span itemprop="name">
                Users List
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>
    <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="/users/deleted" disabled>
            <span itemprop="name">
                Deleted Users
            </span>
        </a>
        <meta itemprop="position" content="3" />
    </li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
        <div class="mdl-card__title mdl-color--red-400 mdl-color-text--white">
            <h2 class="mdl-card__title-text logo-style">
                <?php if($deletedUsersCount === 1): ?>
                    <?php echo e($deletedUsersCount); ?> Deleted User
                <?php elseif($deletedUsersCount > 1): ?>
                    <?php echo e($deletedUsersCount); ?> Deleted Users
                <?php else: ?>
                    No Records Found
                <?php endif; ?>
            </h2>
        </div>
        <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
            <div class="table-responsive material-table">
                <?php if($deletedUsersCount >= 1): ?>
                    <table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">ID</th>
                            <th class="mdl-data-table__cell--non-numeric">Username</th>
                            <th class="mdl-data-table__cell--non-numeric">Email</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">First Name</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Last Name</th>
                            <th class="mdl-data-table__cell--non-numeric">Role</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Deleted</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Deleted IP</th>
                            <th class="mdl-data-table__cell--non-numeric no-sort no-search">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo e($user->id); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo e($user->name); ?> </td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo e($user->email); ?> </td>
                                    <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><?php echo e($user->first_name); ?> </td>
                                    <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><?php echo e($user->last_name); ?> </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($user_role->name == 'User'): ?>
                                                <?php 
                                                    $levelIcon        = 'person';
                                                    $levelName        = 'User';
                                                    $levelBgClass     = 'mdl-color--blue-200';
                                                    $leveIconlBgClass = 'mdl-color--blue-500';
                                                 ?>
                                            <?php elseif($user_role->name == 'Admin'): ?>
                                                <?php 
                                                    $levelIcon        = 'supervisor_account';
                                                    $levelName        = 'Admin';
                                                    $levelBgClass     = 'mdl-color--red-200';
                                                    $leveIconlBgClass = 'mdl-color--red-500';
                                                 ?>
                                            <?php elseif($user_role->name == 'Unverified'): ?>
                                                <?php 
                                                    $levelIcon        = 'person_outline';
                                                    $levelName        = 'Unverified';
                                                    $levelBgClass     = 'mdl-color--orange-200';
                                                    $leveIconlBgClass = 'mdl-color--orange-500';
                                                 ?>
                                            <?php else: ?>
                                                <?php 
                                                    $levelIcon        = 'person_outline';
                                                    $levelName        = 'Unverified';
                                                    $levelBgClass     = 'mdl-color--orange-200';
                                                    $leveIconlBgClass = 'mdl-color--orange-500';
                                                 ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <span class="mdl-chip mdl-chip--contact <?php echo e($levelBgClass); ?> mdl-color-text--white md-chip">
                                            <span class="mdl-chip__contact <?php echo e($leveIconlBgClass); ?> mdl-color-text--white">
                                                <i class="material-icons"><?php echo e($levelIcon); ?></i>
                                            </span>
                                            <span class="mdl-chip__text"><?php echo e($levelName); ?></span>
                                        </span>

                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><?php echo e($user->deleted_at); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><?php echo e($user->deleted_ip_address); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric">

                                        <a href="<?php echo e(URL::to('users/deleted/' . $user->id)); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="View Deleted User" id="view_deleted_user_<?php echo e($user->id); ?>">
                                            <i class="material-icons mdl-color-text--orange-300">account_circle</i>
                                            <span class="sr-only">View Deleted User</span>
                                            <span class="mdl-tooltip mdl-tooltip--top" for="view_deleted_user_<?php echo e($user->id); ?>">
                                                View Deleted User
                                            </span>
                                        </a>

                                        <?php echo Form::model($user, ['action' => ['SoftDeletesController@update', $user->id],  'method' => 'PUT', 'class' => 'inline-block', 'id' => 'restore_'.$user->id]); ?>

                                            <a href="#" class="dialog-button dialiog-trigger-restore dialiog-trigger-restore-<?php echo e($user->id); ?> mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="<?php echo e($user->id); ?>" id="restore_user_<?php echo e($user->id); ?>">
                                                <i class="material-icons mdl-color-text--green">replay</i>
                                                <span class="sr-only">Restore Deleted User</span>
                                                <span class="mdl-tooltip mdl-tooltip--top" for="restore_user_<?php echo e($user->id); ?>">
                                                    Restore Deleted User
                                                </span>
                                            </a>
                                        <?php echo Form::close(); ?>


                                        <?php echo Form::model($user, ['action' => ['SoftDeletesController@destroy', $user->id],  'method' => 'DELETE', 'class' => 'inline-block', 'id' => 'delete_'.$user->id]); ?>

                                            <?php echo Form::hidden('_method', 'DELETE'); ?>

                                            <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger<?php echo e($user->id); ?> mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="<?php echo e($user->id); ?>" id="delete_user_<?php echo e($user->id); ?>">
                                                <i class="material-icons mdl-color-text--red">delete_forever</i>
                                                <span class="sr-only">Permanently Delete User</span>
                                                <span class="mdl-tooltip mdl-tooltip--top" for="delete_user_<?php echo e($user->id); ?>">
                                                    Permanently Delete User
                                                </span>
                                            </a>
                                        <?php echo Form::close(); ?>


                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center margin-top-4">
                        No Deleted Users
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="mdl-card__menu" style="top: -4px;">

            <?php if($deletedUsersCount != 0): ?>
                <?php echo $__env->make('partials.mdl-highlighter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>

            <?php if($deletedUsersCount > $dataTablesShowCount): ?>
                <?php echo $__env->make('partials.mdl-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>

            <a href="<?php echo e(url('/users/')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users" <?php if($deletedUsersCount == 0): ?> style="top: 16px" <?php endif; ?>>
                <i class="material-icons">reply</i>
                <span class="sr-only">Back to Users</span>
            </a>

        </div>
    </div>

    <?php if($deletedUsersCount != 0): ?>
        <?php echo $__env->make('dialogs.dialog-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('dialogs.dialog-restore', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php if($deletedUsersCount > $dataTablesShowCount): ?>
        <?php echo $__env->make('scripts.mdl-datatables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if($deletedUsersCount != 0): ?>
        <?php echo $__env->make('scripts.highlighter-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script type="text/javascript">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                mdl_dialog('.dialiog-trigger<?php echo e($a_user->id); ?>','','#dialog_delete');
                mdl_dialog('.dialiog-trigger-restore-<?php echo e($a_user->id); ?>','.dialog-restore-close','#dialog_restore');
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            var userid;
            $('.dialiog-trigger-delete, .dialiog-trigger-restore').click(function(event) {
                event.preventDefault();
                userid = $(this).attr('data-userid');
            });
            $('#confirm').click(function(event) {
                $('form#delete_'+userid).submit();
            });
            $('#confirm_restore').click(function(event) {
                $('form#restore_'+userid).submit();
            });
        </script>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>