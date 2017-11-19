<?php 

    $levelAmount      = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';
    }

 ?>

<div class="<?php echo e($userCardBg); ?>  mdl-card__title <?php if(Auth::user()->profile->user_profile_bg == NULL): ?> <?php endif; ?>" <?php if(Auth::user()->profile->user_profile_bg != NULL): ?> style="background: url('<?php echo e(asset('images/backgrounds/patterns/maia.png')); ?>'); background-size: 300px;" <?php endif; ?>>
    <h2 class="mdl-card__title-text mdl-title-username mdl-color-text--white text-center">
        Hi <?php echo e(Auth::user()->name); ?>

    </h2>
</div>
<div class="mdl-card__supporting-text mdl-color-text--grey-600">
    <p>
      Akun anda telah di aktivasi
    </p>
    <hr>
    <p>
        <span class="mdl-chip mdl-chip--contact <?php echo e($levelBgClass); ?> mdl-color-text--white md-chip">
            <span class="mdl-chip__contact <?php echo e($leveIconlBgClass); ?> mdl-color-text--white">
                <i class="material-icons"><?php echo e($levelIcon); ?></i>
            </span>
            <span class="mdl-chip__text"><?php echo e($levelName); ?></span>
        </span>
    </p>
    <hr>
    <p>
        You have access to <?php echo e($levelAmount); ?>:
        <?php if (Auth::check() && Auth::user()->level() >= 5): ?>
            <span class="mdl-chip sm-chip <?php echo e($accessLevel5Bg); ?> mdl-color-text--white">
                <span class="mdl-chip__text">5</span>
            </span>
        <?php endif; ?>

        <?php if (Auth::check() && Auth::user()->level() >= 4): ?>
            <span class="mdl-chip sm-chip <?php echo e($accessLevel4Bg); ?> mdl-color-text--white">
                <span class="mdl-chip__text">4</span>
            </span>
        <?php endif; ?>

        <?php if (Auth::check() && Auth::user()->level() >= 3): ?>
            <span class="mdl-chip sm-chip <?php echo e($accessLevel3Bg); ?> mdl-color-text--white">
                <span class="mdl-chip__text">3</span>
            </span>
        <?php endif; ?>

        <?php if (Auth::check() && Auth::user()->level() >= 2): ?>
            <span class="mdl-chip sm-chip <?php echo e($accessLevel2Bg); ?> mdl-color-text--white">
                <span class="mdl-chip__text">2</span>
            </span>
        <?php endif; ?>

        <?php if (Auth::check() && Auth::user()->level() >= 1): ?>
            <span class="mdl-chip sm-chip <?php echo e($accessLevel1Bg); ?> mdl-color-text--white">
                <span class="mdl-chip__text">1</span>
            </span>
        <?php endif; ?>
    </p>

   <?php if (Auth::check() && Auth::user()->hasPermission('view.users', 'create.users', 'edit.users', 'delete.users')): ?>
        <hr>
        <p>
            You have permissions:
            <?php if (Auth::check() && Auth::user()->hasPermission('view.users')): ?>
                <span class="mdl-chip mdl-chip--contact <?php echo e($userPermDetails['view']['bg']); ?> mdl-color-text--white sm-chip">
                    <span class="mdl-chip__contact <?php echo e($userPermDetails['view']['iconBg']); ?> mdl-color-text--white">
                        <i class="material-icons"><?php echo e($userPermDetails['view']['icon']); ?></i>
                    </span>
                    <span class="mdl-chip__text"><?php echo e(trans('permsandroles.permissionView')); ?></span>
                </span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->hasPermission('create.users')): ?>
                <span class="mdl-chip mdl-chip--contact <?php echo e($userPermDetails['create']['bg']); ?> mdl-color-text--white sm-chip">
                    <span class="mdl-chip__contact <?php echo e($userPermDetails['create']['iconBg']); ?> mdl-color-text--white">
                        <i class="material-icons"><?php echo e($userPermDetails['create']['icon']); ?></i>
                    </span>
                    <span class="mdl-chip__text"><?php echo e(trans('permsandroles.permissionCreate')); ?></span>
                </span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->hasPermission('edit.users')): ?>
                <span class="mdl-chip mdl-chip--contact <?php echo e($userPermDetails['edit']['bg']); ?> mdl-color-text--white sm-chip">
                    <span class="mdl-chip__contact <?php echo e($userPermDetails['edit']['iconBg']); ?> mdl-color-text--white">
                        <i class="material-icons"><?php echo e($userPermDetails['edit']['icon']); ?></i>
                    </span>
                    <span class="mdl-chip__text"><?php echo e(trans('permsandroles.permissionEdit')); ?></span>
                </span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->hasPermission('delete.users')): ?>
                <span class="mdl-chip mdl-chip--contact <?php echo e($userPermDetails['delete']['bg']); ?> mdl-color-text--white sm-chip">
                    <span class="mdl-chip__contact <?php echo e($userPermDetails['delete']['iconBg']); ?> mdl-color-text--white">
                        <i class="material-icons"><?php echo e($userPermDetails['delete']['icon']); ?></i>
                    </span>
                    <span class="mdl-chip__text"><?php echo e(trans('permsandroles.permissionDelete')); ?></span>
                </span>
            <?php endif; ?>
        </p>

    <?php endif; ?>

    <br />
    <br />

</div>
