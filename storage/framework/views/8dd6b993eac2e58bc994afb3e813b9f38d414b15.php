<?php $__env->startSection('template_title'); ?>
	<?php echo e(trans('profile.templateTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	<small>
		<?php echo e(trans('profile.editProfileTitle')); ?> | <?php echo e(trans('profile.showProfileTitle',['username' => $user->name])); ?>

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

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="<?php echo e(url('/profile/'.Auth::user()->name)); ?>">
			<span itemprop="name">
				<?php echo e(trans('titles.profile')); ?>

			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="2" />
	</li>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<a itemprop="item" href="<?php echo e(url('/profile/'.Auth::user()->name.'/edit')); ?>" class="hidden">
			<span itemprop="name">
				<?php echo e(trans('titles.editProfile')); ?>

			</span>
		</a>
		<meta itemprop="position" content="3" />
		<?php echo e(trans('titles.editProfile')); ?>

	</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template-form-status'); ?>
	<?php echo $__env->make('partials.form-status-ajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
	.mdl-gen__preview {
	    position: relative;
	    height: 350px
	}
	.mdl-demo-card .mdl-layout__content {
	 	margin: 0 1em;
	}
	.demo-layout .mdl-layout__header .mdl-layout__drawer-button i {
	    margin-top: 12px;
	}
	.mdl-demo-card .mdl-layout__header .mdl-layout__drawer-button i {
	    color: #ffffff;
	}

	body .mdl-card__title {
		display: block;
		height: 190px;
	}
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(Auth::user()->id == $user->id): ?>
		<div class="mdl-grid full-grid margin-top-0 padding-0">
			<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
				<div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="http://schema.org/Person">
					<div class="mdl-user-avatar">
						<div id="avatar_selector_avatar" class="avatar-selecter <?php if($user->profile->avatar_status == 0): ?> active-avatar-selecter <?php endif; ?>">
							<img src="<?php echo e(Gravatar::get($user->email)); ?>" alt="<?php echo e($user->name); ?>" class="user-avatar">
							<h3 class="mdl-card__title-text mdl-title-username mdl-color-text--white">
								<?php echo e($user->name); ?>

							</h3>
						</div>
						<div id="avatar_selector_userimage" class="avatar-selecter <?php if($user->profile->avatar_status == 1): ?> active-avatar-selecter <?php endif; ?>">
							<div class="dz-preview"></div>
							<?php echo Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatarDropzone', 'class' => 'form single-dropzone dropzone single', 'files' => true)); ?>

								<?php if($user->profile->avatar): ?>
									<img id="user_selected_avatar" class="user-avatar" src="<?php echo e($user->profile->avatar); ?>" alt="<?php echo e($user->name); ?>">
								<?php else: ?>
									<div class="user-avatar-icon">
										<i class="material-icons">file_upload</i>
									</div>
								<?php endif; ?>
								<h3 class="mdl-card__title-text mdl-title-username mdl-color-text--white">
									<?php echo e($user->name); ?>

								</h3>
							<?php echo Form::close(); ?>

						</div>
						<span itemprop="image" style="display:none;"><?php echo e(Gravatar::get($user->email)); ?></span>
					</div>
					<div id="user_profile_header" class="mdl-card__title mdl-color--primary mdl-color-text--white" <?php if($user->profile->user_profile_bg != NULL): ?> style="background: url('<?php echo e($user->profile->user_profile_bg); ?>') center/cover;" <?php endif; ?>>
						<?php echo Form::open(array('route' => 'background.upload', 'method' => 'POST', 'name' => 'backgroundDropzone','id' => 'backgroundDropzone', 'class' => 'form single-dropzone dropzone single mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-color-text--white', 'files' => true)); ?>

							<i class="material-icons">wallpaper</i>
						<?php echo Form::close(); ?>

					</div>
					<?php echo Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name],  'class' => '', 'id' => 'edit_profile_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]); ?>

						<meta name="_token" content="<?php echo csrf_token(); ?>" />
						<div class="mdl-card__supporting-text">
							<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

								<div class="mdl-tabs__tab-bar">
									<a href="#profile-panel" class="mdl-tabs__tab is-active">
										Profile
									</a>
									<a href="#theme-panel" class="mdl-tabs__tab">
										Theme
									</a>
								</div>

								<div class="mdl-tabs__panel is-active" id="profile-panel">
									<div class="mdl-grid ">
										<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('name') ? 'is-invalid' :''); ?>">
												<?php echo Form::text('name', $user->name, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,0-9]*', 'disabled')); ?>

												<?php echo Form::label('name', trans('auth.name') , array('class' => 'mdl-textfield__label'));; ?>

												<span class="mdl-textfield__error">Letters and numbers only</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('email') ? 'is-invalid' :''); ?>">
												<?php echo Form::email('email', $user->email, array('id' => 'email', 'class' => 'mdl-textfield__input', 'disabled')); ?>

												<?php echo Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label'));; ?>

												<span class="mdl-textfield__error">Please Enter a Valid <?php echo e(trans('auth.email')); ?></span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('first_name') ? 'is-invalid' :''); ?>">
												<?php echo Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')); ?>

												<?php echo Form::label('first_name', trans('auth.first_name') , array('class' => 'mdl-textfield__label'));; ?>

												<span class="mdl-textfield__error">Letters only</span>
											</div>
										</div>

									  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
										    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('last_name') ? 'is-invalid' :''); ?>">
										        <?php echo Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')); ?>

										        <?php echo Form::label('last_name', trans('auth.last_name') , array('class' => 'mdl-textfield__label'));; ?>

										        <span class="mdl-textfield__error">Letters only</span>
										    </div>
									  	</div>

									  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
										    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('twitter_username') ? 'is-invalid' :''); ?>">
										        <?php echo Form::text('twitter_username', $user->profile->twitter_username, array('id' => 'twitter_username', 'class' => 'mdl-textfield__input')); ?>

										        <?php echo Form::label('twitter_username', trans('profile.label-twitter_username') , array('class' => 'mdl-textfield__label'));; ?>

										    </div>
									  	</div>

									  	<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
										    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('github_username') ? 'is-invalid' :''); ?>">
										        <?php echo Form::text('github_username', $user->profile->github_username, array('id' => 'github_username', 'class' => 'mdl-textfield__input')); ?>

										        <?php echo Form::label('github_username', trans('profile.label-github_username') , array('class' => 'mdl-textfield__label'));; ?>

										    </div>
									  	</div>

										<div class="mdl-cell mdl-cell--12-col">
										    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('bio') ? 'is-invalid' :''); ?>">
										        <?php echo Form::textarea('bio',  $user->profile->bio, array('id' => 'bio', 'class' => 'mdl-textfield__input')); ?>

										        <?php echo Form::label('bio', trans('profile.label-bio') , array('class' => 'mdl-textfield__label'));; ?>

										    </div>
										</div>
									</div>
									<div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
										<div class="mdl-grid ">
											<div class="mdl-cell mdl-cell--12-col">

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 <?php echo e($errors->has('location') ? 'is-invalid' :''); ?>">
												    <?php echo Form::text('location', $user->profile->location, array('id' => 'location', 'class' => 'mdl-textfield__input' )); ?>

												    <?php echo Form::label('location', trans('profile.label-location') , array('class' => 'mdl-textfield__label'));; ?>

													<span class="mdl-textfield__error">Please Enter a Valid Location</span>
												</div>

												<?php if($user->profile->location): ?>
													<div class="card-image mdl-card mdl-shadow--2dp">
														<div id="map-canvas"></div>
														<div class="mdl-card__actions mdl-color--primary mdl-color-text--white">
															<p class="mdl-typography--font-light">
																LON: <span id="longitude"></span> / LAT: <span id="latitude"></span>
															</p>
														</div>
													</div>
												<?php endif; ?>

											</div>
										</div>
									</div>
								</div>

								<div class="mdl-tabs__panel" id="theme-panel">
									<div id="color_select_panel">
									    <div class="mdl-gen mdl-cell mdl-cell--12-col">
									        <div class="mdl-grid">
												<div class="mdl-gen__panel mdl-gen__panel--left mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col">
													<div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth <?php echo e($errors->has('theme_id') ? 'is-invalid' :''); ?>">
															<select class="mdl-selectfield__select mdl-textfield__input" name="theme_id" id="theme_id">
																<?php if($themes->count()): ?>
																	<?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	  <option value="<?php echo e($theme->id); ?>"<?php echo e($currentTheme->id == $theme->id ? 'selected="selected"' : ''); ?> data-link="<?php echo e($theme->link); ?>" ><?php echo e($theme->name); ?></option>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																<?php endif; ?>
															</select>
													        <label for="theme_id">
													            <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
													        </label>
													        <?php echo Form::label('theme_id', trans('profile.label-theme'), array('class' => 'mdl-textfield__label mdl-selectfield__label mdl-color-text--primary'));; ?>

															<?php if($errors->has('theme_id')): ?>
															    <span class="mdl-textfield__error"><?php echo e($errors->first('theme')); ?></span>
															<?php endif; ?>
													    </div>
													</div>
													<div class="mdl-gen__cdn mdl-cell mdl-cell--12-col sr-only">
														<div class="code-with-text" id="cdn-code">
															<pre class="demo-code language-markup codepen-button-disabled">
																<code class="language-markup mdl-gen__cdn-link" data-language="markup" id="color_selected">
																	material.$primary-$accent.min.css
																</code>
															</pre>
														</div>
													</div>
													<div id="wheel">
													  	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
													        <defs>
													          	<filter id="drop-shadow">
																	<feGaussianBlur in="SourceAlpha" stdDeviation="3.2" />
																	<feOffset dx="0" dy="0" result="offsetblur" />
																	<feFlood flood-color="rgba(0,0,0,1)" />
																	<feComposite in2="offsetblur" operator="in" />
																	<feMerge>
																	  	<feMergeNode />
																	  	<feMergeNode in="SourceGraphic" />
																	</feMerge>
													          	</filter>
													        </defs>
													    	<g class="wheel--maing"></g>
													  	</svg>
													  	<div class="mdl-gen-download">
													    	<a href="#" id="download" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--fab">
													    		<i class="material-icons">
													    			format_color_fill
													    		</i>
													    	</a>
													  	</div>
													</div>
												</div>

									            <div class="mdl-gen__panel--right mdl-gen__panel mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col">
													<div class="mdl-gen__desc docs-text-styling">
														<strong>
															Custom CSS theme builder
														</strong>
														<p>
															Click on the color wheel to choose a primary (1) and accent (2) color to preview the theme below.
															When you’ve selected a color combination you like, simply click save.
														</p>
													</div>
													<div class="mdl-demo-card mdl-card mdl-shadow--2dp">
				                						<div class="mdl-gen__preview">
				                  							<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
																<header class="mdl-layout__header">
																	<div class="mdl-layout__header-row">
																		<span class="mdl-layout-title">Theme Preview</span>
																	</div>
																</header>
																<div class="mdl-layout__drawer">
																	<span class="mdl-layout-title">Theme Preview</span>
																	<nav class="mdl-navigation">
																		<a class="mdl-navigation__link" href="#">Some</a>
																		<a class="mdl-navigation__link" href="#">Links</a>
																		<a class="mdl-navigation__link" href="#">Here</a>
																	</nav>
																</div>
				                    							<div class="mdl-layout__content">
																	<h4 class="margin-bottom-0">
																		Try it out
																	</h4>
																	<p>
																		Lorem ipsum dolor sit amet.
																	</p>
																	<p>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
																		  Accent
																		</a>
																	  	<a href="#" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">
																	  		Primary
																		</a>
																	</p>
																	<p>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--primary">
																		  Primary
																		</a>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--accent">
																		  Accent
																		</a>
																	</p>
																	<p>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect">
																			<i class="material-icons">email</i>
																		</a>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
																			<i class="material-icons">add</i>
																		</a>
																		<a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
																			<i class="material-icons">person</i>
																		</a>
																	</p>
				                    							</div>
				                  							</div>
				                						</div>
													</div>
				              					</div>
				            				</div>
				          				</div>
									</div>
			  					</div>

							</div>
						</div>

						<div class="mdl-card__actions padding-top-0 ">
							<div class="mdl-grid padding-top-0">
								<div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0">
									<span class="save-actions start-hidden">
										<?php echo Form::button(trans('profile.submitChangesButton'), array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect margin-top-1 margin-top-0-desktop')); ?>

									</span>
								</div>
							</div>
						</div>

						<div class="mdl-card__menu">
							<span class="save-actions start-hidden mdl-color-text--white">
								<?php echo Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'view profile')); ?>

							</span>
							<a id="avatar_selection_menu" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
							  	<i class="material-icons">more_vert</i>
							</a>
							<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="avatar_selection_menu">
								<li class="mdl-menu__item">
									<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect <?php if($user->profile->avatar_status == 0): ?> active <?php endif; ?>" for="use_gravatar">
									  	<input type="radio" id="use_gravatar" class="mdl-radio__button" name="avatar_status" value="0" <?php if($user->profile->avatar_status == 0): ?> checked <?php endif; ?>>
									  	<span class="mdl-radio__label">
									  		Use Gravatar
									  	</span>
									</label>
								</li>
								<li class="mdl-menu__item">
									<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect <?php if($user->profile->avatar_status == 1): ?> active <?php endif; ?>" for="use_image">
									  	<input type="radio" id="use_image" class="mdl-radio__button" name="avatar_status" value="1" <?php if($user->profile->avatar_status == 1): ?> checked <?php endif; ?>>
									  	<span class="mdl-radio__label">
									  		Use My Image
									  	</span>
									</label>
								</li>
							</ul>
							<a href="/profile/<?php echo e(Auth::user()->name); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="view profile">
								<i class="material-icons">person_outline</i>
							</a>
						</div>

						<?php echo $__env->make('dialogs.dialog-save', ['isAjax' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

					<?php echo Form::close(); ?>


				</div>

			</div>
		</div>

	<?php else: ?>
		<p><?php echo e(trans('profile.notYourProfile')); ?></p>
	<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

	<?php echo $__env->make('scripts.mdl-required-input-fix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.gmaps-address-lookup-api3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.google-maps-geocode-and-map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.mdl-save-ajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<script type="text/javascript">

		// Profile theme color wheel
		$('#theme_id').change(function(){
			var selectedThemeMenu = $(this).find('option:selected').data('link');
			var themeColors = getThemeColors(selectedThemeMenu);
			for (i = 0; i < 5; i++) {
			    $('.selected--' + i).removeClass('selected selected--' + i);
			}
			init(themeColors.color1, themeColors.color2);
		});
		initColorWheel();

		// Switch Avatar/Gravatar
		var a = elId('avatar_selector_avatar');
		var b = elId('avatar_selector_userimage');
		var x = elId('use_image');
		var y = elId('use_gravatar');
		var da = elId('drawer_avatar');
		x.onclick = function() {
		    a.style.display = "none";
		    b.style.display = "block";
		    var avatarLink = "<?php echo e($user->profile->avatar); ?>";
		    if(avatarLink != "") {
		    	da.src = "<?php echo e($user->profile->avatar); ?>?" + new Date().getTime() + (Math.floor(Math.random() * 1000) * Math.floor(Math.random() * 1000));
		    }
		};
		y.onclick = function() {
		    a.style.display = "block";
		    b.style.display = "none";
		    da.src = "<?php echo e(Gravatar::get($user->email)); ?>";
		};
		function elId(name) {
			return document.getElementById(name);
		}

		// User avatar and profile background dropzone callback actions
		$(document).ready(function(){
			var userBgDropzone = Dropzone.forElement("#backgroundDropzone");
			userBgDropzone.on('success', function() {
				var userBgStamped = "<?php echo e($user->profile->user_profile_bg); ?>?" + new Date().getTime() + (Math.floor(Math.random() * 1000) * Math.floor(Math.random() * 1000));
				var header = $("#user_profile_header");
				header.css("background", ""); //It was not always clearing for PNG images
				header.css("background", "url(" + userBgStamped + ") center/cover");

			});
			var userAvatarDropzone = Dropzone.forElement("#avatarDropzone");
			userAvatarDropzone.on('success', function() {
				var userAvatarStamped = "<?php echo e($user->profile->avatar); ?>?" + new Date().getTime() + (Math.floor(Math.random() * 1000) * Math.floor(Math.random() * 1000));
				var profileAvatar = $("#user_selected_avatar");
				var drawerAvatar = $("#drawer_avatar");
				profileAvatar.attr("src", userAvatarStamped);
				drawerAvatar.attr("src", userAvatarStamped);
			});
		});
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>