<?php $__env->startSection('template_title'); ?>
	<?php echo e($user->name); ?>'s Account
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	<small>
		<?php echo e(trans('profile.accountTitle',['username' => $user->name])); ?>

	</small>
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

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<a itemprop="item" href="<?php echo e(url('/account/')); ?>" class="hidden">
			<span itemprop="name">
				<?php echo e(trans('titles.account')); ?>

			</span>
		</a>
		<?php echo e(trans('titles.account')); ?>

		<meta itemprop="position" content="2" />
	</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="mdl-card mdl-shadow--2dp mdl-cell margin-top-0-tablet-important mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop weather-container">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white header-container">
        <h2 class="mdl-card__title-text">
        	<span class="header-title">
				<?php echo e(trans('profile.changePwTitle')); ?>

        	</span>
        </h2>
    </div>

    <div class="mdl-card__supporting-text margin-top-0 padding-top-0">

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

			<div class="mdl-tabs__tab-bar">
				<a href="#name-panel" class="mdl-tabs__tab acct-tab is-active"><?php echo e(trans('profile.changeNamePill')); ?></a>
				<a href="#change-panel" class="mdl-tabs__tab pw-tab"><?php echo e(trans('profile.changePwPill')); ?></a>
				<a href="#delete-panel" class="mdl-tabs__tab del-tab"><?php echo e(trans('profile.deleteAccountPill')); ?></a>
			</div>

<div class="mdl-tabs__panel is-active" id="name-panel">



        <?php echo Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form')); ?>


          <div class="mdl-card__supporting-text">
            <div class="mdl-grid full-grid padding-0">
              <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('name') ? 'is-invalid' :''); ?>">
                      <?php echo Form::text('name', $user->name, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,0-9]*')); ?>

                      <?php echo Form::label('name', trans('auth.name') , array('class' => 'mdl-textfield__label'));; ?>

                      <span class="mdl-textfield__error">Letters and numbers only</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('email') ? 'is-invalid' :''); ?>">
                      <?php echo Form::email('email', $user->email, array('id' => 'email', 'class' => 'mdl-textfield__input')); ?>

                      <?php echo Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label'));; ?>

                      <span class="mdl-textfield__error">Please Enter a Valid <?php echo e(trans('auth.email')); ?></span>
                    </div>
                  </div>



                </div>
              </div>

            </div>
          </div>

          <div class="mdl-card__actions padding-top-0">
            <div class="mdl-grid padding-top-0">
              <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                
                <span class="save-actions">
                  <?php echo Form::button('<i class="material-icons">save</i> Save New User', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')); ?>

                </span>

              </div>
            </div>
          </div>

            <div class="mdl-card__menu mdl-color-text--white">

              <span class="save-actions">
                <?php echo Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Save New User')); ?>

              </span>

              <a href="<?php echo e(url('/users/')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users">
                  <i class="material-icons">reply</i>
                  <span class="sr-only">Back to Users</span>
              </a>

            </div>

            <?php echo $__env->make('dialogs.dialog-save', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <?php echo Form::close(); ?>




</div>

			<div class="mdl-tabs__panel" id="change-panel">





        <?php echo Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form')); ?>


          <div class="mdl-card__supporting-text">
            <div class="mdl-grid full-grid padding-0">
              <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('password') ? 'is-invalid' :''); ?>">
                          <?php echo Form::password('password', array('id' => 'password', 'class' => 'mdl-textfield__input')); ?>

                          <?php echo Form::label('password', 'Password', array('class' => 'mdl-textfield__label'));; ?>

                        <span class="mdl-textfield__error">Please enter a valid password</span>
                      </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('password_confirmation') ? 'is-invalid' :''); ?>">
                          <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'mdl-textfield__input')); ?>

                          <?php echo Form::label('password_confirmation', 'Confirm Password', array('class' => 'mdl-textfield__label'));; ?>

                        <span class="mdl-textfield__error">Must match password</span>
                      </div>
                  </div>


                </div>
              </div>

            </div>
          </div>

          <div class="mdl-card__actions padding-top-0">
            <div class="mdl-grid padding-top-0">
              <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                
                <span class="save-actions">
                  <?php echo Form::button('<i class="material-icons">save</i> Save New User', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')); ?>

                </span>

              </div>
            </div>
          </div>

            <div class="mdl-card__menu mdl-color-text--white">

              <span class="save-actions">
                <?php echo Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Save New User')); ?>

              </span>

              <a href="<?php echo e(url('/users/')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users">
                  <i class="material-icons">reply</i>
                  <span class="sr-only">Back to Users</span>
              </a>

            </div>

            <?php echo $__env->make('dialogs.dialog-save', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <?php echo Form::close(); ?>



			</div>




			<div class="mdl-tabs__panel" id="delete-panel">

		      	<p class="margin-bottom-2 text-center">
					<i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
						<strong>Deleting</strong> your account is <u><strong>permanent</strong></u> and <u><strong>cannot</strong></u> be undone.
					<i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
		      	</p>

				<hr>

				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 margin-bottom-3 text-center">

						<?php echo Form::model($user, array('action' => array('ProfilesController@deleteUserAccount', $user->id), 'method' => 'DELETE')); ?>


							<div class="btn-group btn-group-vertical margin-bottom-2" data-toggle="buttons">
								<label class="btn no-shadow" for="checkConfirmDelete" >
									<input type="checkbox" name='checkConfirmDelete' id="checkConfirmDelete">
									<i class="fa fa-square-o fa-fw fa-2x"></i>
									<i class="fa fa-check-square-o fa-fw fa-2x"></i>
									<span class="margin-left-2"> Confirm Account Deletion</span>
								</label>
							</div>

						    <?php echo Form::button(
						    	'<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> ' . trans('profile.deleteAccountBtn'),
								array(
									'class' 			=> 'btn btn-block btn-danger',
									'id' 				=> 'delete_account_trigger',
									'disabled'			=> true,
									'type' 				=> 'button',
									'data-toggle' 		=> 'modal',
									'data-submit'       => trans('profile.deleteAccountBtnConfirm'),
									'data-target' 		=> '#confirmForm',
									'data-modalClass' 	=> 'modal-danger',
									'data-title' 		=> trans('profile.deleteAccountConfirmTitle'),
									'data-message' 		=> trans('profile.deleteAccountConfirmMsg')
								)
						    ); ?>


						<?php echo Form::close(); ?>


					</div>
				</div>



			</div>


		</div>

    </div>

	


</div>






















	<style type="text/css" media="screen">
		.header-container {

		}
		.account-header-password {

		}
		.account-header-delete {
			display: none;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
	<script>

		$(document).ready(function() {

			function tabHeaders() {
				var titleContainer = $('.header-container');
				var titleContent = $('.header-title');
				var trigger = $('.mdl-tabs__tab');
				var delTriggerClass = 'del-tab';
				var pwTriggerClass = 'pw-tab';
				var deleteClass = "mdl-color--red-400";
				var pwClass = "mdl-color--yellow-800";
				var defaultClass = "mdl-color--primary";
				var activeClass = "is-active";
				var title;

				trigger.click(function() {

					var self = $(this);
					title = self.text();

					titleContainer.removeClass(defaultClass + ' ' + deleteClass + ' ' + pwClass);

				    switch (true) {
				      case self.hasClass(delTriggerClass):
				        titleContainer.addClass(deleteClass);
				        break;
				      case self.hasClass(pwTriggerClass):
				        titleContainer.addClass(pwClass);
				        break;
				      default:
						titleContainer.addClass(defaultClass);
				        break;
				    }
					titleContent.html(title);
				});
			}
			tabHeaders();
		});

	</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>