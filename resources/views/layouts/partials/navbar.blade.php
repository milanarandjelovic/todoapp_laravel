<nav class="navbar navbar-default" role="navigation">
	<div class="container">

		{{-- Brand and toggle get grouped for better mobile display --}}
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			{{ link_to_route('home', 'TodoApp', [], ['class'=> 'navbar-brand']) }}
		</div>

		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li>
					{!! link_to_route('task.index', 'All task') !!}
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(!Auth::check())
					<li>
						{{ link_to_route('auth.register', 'Register') }}
					</li>
					<li>
						{{ link_to_route('auth.login', 'Login') }}
					</li>
				@else
					<li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						   aria-expanded="false">{{ (Auth::user()->getNameOrUsername()) }}<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>{{ link_to_route('user.profile', 'Profile') }}</li>
							<li>
								<a href="{{ route('auth.logout') }}">Logout
									<i class="fa fa-sign-out" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
				@endif
			</ul>
		</div> {{-- /.navbar-collapse --}}

	</div>
</nav>
