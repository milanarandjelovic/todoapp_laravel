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
			{{ link_to_route('welcome', 'TodoApp', [], ['class'=> 'navbar-brand']) }}
		</div>

		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">Register</a>
				<li>
				<li>
					<a href="#">Login</a>
				</li>
				<li>
					<a href="#">Logout</a>
				</li>
			</ul>
		</div> {{-- /.navbar-collapse --}}

	</div>
</nav>
