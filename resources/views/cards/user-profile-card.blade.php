@php
	if ($user->profile->avatar_status == 1) {
		$userGravImage = $user->profile->avatar;
	} else {
		$userGravImage = asset('images/spiderman_avatar.png');
	}
@endphp
<div class="mdl-grid full-grid margin-top-0 padding-0">
	<div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
	    <div class="mdl-card card-wide" style="width:100%;" itemscope itemtype="https://schema.org/Person">
			<div class="mdl-user-avatar">
				<img src="{{$userGravImage}}" alt="{{ $user->name }}" class="user-avatar">
				<span itemprop="image" style="display:none;">{{ asset('images/spiderman_avatar.png') }}</span>
			</div>
			<div class="mdl-card__title mdl-color--primary mdl-color-text--white" @if ($user->profile->user_profile_bg != NULL) style="background: url('{{ asset('images/backgrounds/patterns/maia.png') }}') ;" @endif>
		        <h3 class="mdl-card__title-text mdl-title-username">
		        	{{ $user->name }}
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
										{{ $user->first_name }} @if ($user->last_name) {{ $user->last_name }} @endif
									</span>
					        	</div>
					        </li>
					        <li class="mdl-list__item mdl-typography--font-light">
					        	<div class="mdl-list__item-primary-content">
					        		<i class="material-icons mdl-list__item-icon">contact_mail</i>
					        		<span itemprop="email">
										{{ $user->email }}
									</span>
					        	</div>
					        </li>
					        @if ($user->profile)
								@if ($user->profile->location)
								    <li class="mdl-list__item mdl-typography--font-light">
								    	<div class="mdl-list__item-primary-content" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
								    		<i class="material-icons mdl-list__item-icon">location_on</i>
											<span itemprop="streetAddress">
												{{ $user->profile->location }}
											</span>
								    	</div>
								    </li>
								@endif
						        @if ($user->profile->bio)
							        <li class="mdl-list__item">
							        	<span class="mdl-list__item-primary-content">
							        		<i class="material-icons mdl-list__item-icon">comment</i>
							        		<p class="mdl-typography--font-light">
												{{ $user->profile->bio }}
												<meta itemprop="description" content="{{ $user->profile->bio }}">
											</p>
							        	</span>
							        </li>
						        @endif
					        @endif
					    </ul>
					</div>
				</div>
		    </div>
		    <div class="mdl-card__actions">
				<div class="mdl-grid full-grid">
					<div class="mdl-cell mdl-cell--12-col">
						@if ($user->profile)
							@if (Auth::user()->id == $user->id)
								<a href="/profile/{{ Auth::user()->name }}/edit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white">
									<i class="material-icons padding-right-half-1">edit</i>
									{{ Lang::get('titles.editProfile') }}
								</a>
							@endif
						@else
							<p class="text-center">{{ Lang::get('profile.noProfileYet') }}</p>
							{!! HTML::link(URL::to('/profile/'.Auth::user()->name.'/edit'), Lang::get('titles.createProfile'), array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp')) !!}
						@endif
					</div>
				</div>
		    </div>
		    <div class="mdl-card__menu">

				@if (!Auth::guest() && Auth::user()->hasRole('administrator'))
					<a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
						<i class="material-icons">edit</i>
					</a>
				@endif

		    </div>
	    </div>
	</div>
</div>
