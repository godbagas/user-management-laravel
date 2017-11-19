<?php $__env->startSection('template_title'); ?>
  Showing User <?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
  Showing <?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>

<?php 
  $levelAmount = trans('usersmanagement.labelUserLevel');
  if ($user->level() >= 2) {
      $levelAmount = trans('usersmanagement.labelUserLevels');
  }
 ?>

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
    <a itemprop="item" href="/users">
      <span itemprop="name">
        Users List
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="/users/<?php echo e($user->id); ?>">
      <span itemprop="name">
        <?php echo e($user->name); ?>

      </span>
    </a>
    <meta itemprop="position" content="3" />
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($role->name == 'User'): ?>
        <?php 
            $levelIcon        = 'person';
            $levelName        = 'User';
            $levelBgClass     = 'mdl-color--blue-200';
            $leveIconlBgClass = 'mdl-color--blue-500';
         ?>
    <?php elseif($role->name == 'Admin'): ?>
        <?php 
            $levelIcon        = 'supervisor_account';
            $levelName        = 'Admin';
            $levelBgClass     = 'mdl-color--red-200';
            $leveIconlBgClass = 'mdl-color--red-500';
         ?>
    <?php elseif($role->name == 'Unverified'): ?>
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




<div class="mdl-grid full-grid margin-top-0 padding-0">
  <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
      <div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">
      <div class="mdl-user-avatar">
        <!-- <img src="<?php echo e(Gravatar::get($user->email)); ?>" alt="<?php echo e($user->name); ?>"> -->
        <!-- <img src="<?php echo e(asset('images/spiderman_avatar.png')); ?>" alt="<?php echo e($user->name); ?>"> -->
        <span itemprop="image" style="display:none;"><?php echo e(Gravatar::get($user->email)); ?></span>
      </div>

        <div class="mdl-card__supporting-text">
        <div class="mdl-grid full-grid padding-0">
          <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">
              <ul class="demo-list-icon mdl-list">
                  <li class="mdl-list__item mdl-typography--font-light">
                    <div class="mdl-list__item-primary-content">
                      <i class="material-icons mdl-list__item-icon">security</i>
                      <span class="mdl-chip mdl-chip--contact <?php echo e($levelBgClass); ?> mdl-color-text--white md-chip">
                        <span class="mdl-chip__contact <?php echo e($leveIconlBgClass); ?> mdl-color-text--white">
                            <i class="material-icons"><?php echo e($levelIcon); ?></i>
                        </span>
                        <span class="mdl-chip__text"><?php echo e($levelName); ?></span>
                      </span>
                    </div>
                  </li>

                  <li class="mdl-list__item mdl-typography--font-light">
                    <div class="mdl-list__item-primary-content">
                      <i class="material-icons mdl-list__item-icon">event</i>
                      Created: <?php echo e($user->created_at); ?>

                    </div>
                  </li>

                  <li class="mdl-list__item mdl-typography--font-light">
                    <div class="mdl-list__item-primary-content">
                      <i class="material-icons mdl-list__item-icon">person</i>
                      <span itemprop="name">
                        <?php echo e($user->first_name); ?> <?php if($user->last_name): ?> <?php echo e($user->last_name); ?> <?php endif; ?>
                      </span>
                    </div>
                  </li>

                  <li class="mdl-list__item mdl-typography--font-light">
                    <div class="mdl-list__item-primary-content">
                      <i class="material-icons mdl-list__item-icon">contact_mail</i>
                      <span itemprop="email">
                    <?php echo e($user->email); ?>

                  </span>
                    </div>
                  </li>


        </div>
        </div>
        <?php if(Auth::user()->id == $user->id): ?>
          <div class="mdl-card__actions">
          <div class="mdl-grid full-grid">
            <div class="mdl-cell mdl-cell--12-col">
              <a href="/profile/<?php echo e(Auth::user()->name); ?>/edit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white">
                <i class="material-icons padding-right-half-1">edit</i>
                <?php echo e(Lang::get('titles.editProfile')); ?>

              </a>
            </div>
          </div>
          </div>
        <?php endif; ?>
        <div class="mdl-card__menu">

        <a href="<?php echo e(URL::to('users/' . $user->id . '/edit')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
          <i class="material-icons">edit</i>
        </a>

        <?php echo Form::open(array('url' => 'users/' . $user->id, 'class' => 'inline-block')); ?>

          <?php echo Form::hidden('_method', 'DELETE'); ?>

          <a href="#" class="dialog-button-delete mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">delete</i>
          </a>
          <?php echo $__env->make('dialogs.dialog-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo Form::close(); ?>


        </div>
      </div>
  </div>
</div>

























<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <?php echo $__env->make('scripts.google-maps-geocode-and-map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script type="text/javascript">

    mdl_dialog('.dialog-button-delete','.dialog-delete-close','#dialog_delete');

  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>