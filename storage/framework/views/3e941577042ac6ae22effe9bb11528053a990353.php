<?php 
	if ($user->profile->avatar_status == 1) {
		$userGravImage = $user->profile->avatar;
	} else {
		$userGravImage = asset('images/spiderman_avatar.png');
	}
 ?>
<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
	    <div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="https://schema.org/Person">
			<div class="mdl-user-avatar">
				<img src="<?php echo e($userGravImage); ?>" alt="<?php echo e($user->name); ?>" class="user-avatar">
				<span itemprop="image" style="display:none;"><?php echo e(asset('images/spiderman_avatar.png')); ?></span>
			</div>
			<div class="mdl-card__title mdl-color--primary mdl-color-text--white" <?php if($user->profile->user_profile_bg != NULL): ?> style="background: url('<?php echo e(asset('images/backgrounds/patterns/maia.png')); ?>') ;" <?php endif; ?>>
		        <h3 class="mdl-card__title-text mdl-title-username">
		        	<?php echo e($user->name); ?>

		        </h3>
		    </div>
		    <div class="mdl-card__supporting-text">
				<div class="mdl-grid full-grid padding-0">
					<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--6-col-desktop">
					    <ul class="demo-list-icon mdl-list">
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
					        <?php if($user->profile): ?>
								<?php if($user->profile->location): ?>
								    <li class="mdl-list__item mdl-typography--font-light">
								    	<div class="mdl-list__item-primary-content" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
								    		<i class="material-icons mdl-list__item-icon">location_on</i>
											<span itemprop="streetAddress">
												<?php echo e($user->profile->location); ?>

											</span>
								    	</div>
								    </li>
								<?php endif; ?>
						        <?php if($user->profile->bio): ?>
							        <li class="mdl-list__item">
							        	<span class="mdl-list__item-primary-content">
							        		<i class="material-icons mdl-list__item-icon">comment</i>
							        		<p class="mdl-typography--font-light">
												<?php echo e($user->profile->bio); ?>

												<meta itemprop="description" content="<?php echo e($user->profile->bio); ?>">
											</p>
							        	</span>
							        </li>
						        <?php endif; ?>
					        <?php endif; ?>
					    </ul>
					</div>
				</div>
		    </div>
		    <div class="mdl-card__actions">
				<div class="mdl-grid full-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<?php if($user->profile): ?>
							<?php if(Auth::user()->id == $user->id): ?>
								<a href="/profile/<?php echo e(Auth::user()->name); ?>/edit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white">
									<i class="material-icons padding-right-half-1">edit</i>
									<?php echo e(Lang::get('titles.editProfile')); ?>

								</a>
							<?php endif; ?>
						<?php else: ?>
							<p class="text-center"><?php echo e(Lang::get('profile.noProfileYet')); ?></p>
							<?php echo HTML::link(URL::to('/profile/'.Auth::user()->name.'/edit'), Lang::get('titles.createProfile'), array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp')); ?>

						<?php endif; ?>
					</div>
				</div>
		    </div>
		    <div class="mdl-card__menu">

				<?php if(!Auth::guest() && Auth::user()->hasRole('administrator')): ?>
					<a href="<?php echo e(URL::to('users/' . $user->id . '/edit')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
						<i class="material-icons">edit</i>
					</a>
				<?php endif; ?>

		    </div>
	    </div>
	</div>
</div>
