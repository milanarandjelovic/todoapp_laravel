@extends('layouts.main')

@section('title', 'Forgot my Password')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-default">

				<div class="panel-heading">
					<p class="panel-title text-center">Reset password</p>
				</div> {{-- /.panel-heading --}}
				<div class="panel-body">

					{!! Form::open(['route' => 'auth.password.email', 'method' => 'post']) !!}

					<div class="form-group">
						{!! Form::label('email', 'Email Address', ['class' => 'control-label col-md-2']) !!}
						<div class="col-md-10">
							{!! Form::email('email', '', ['class' => 'form-control']) !!}
						</div>
					</div> {{-- /.form-group --}}

					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-btn fa-envelope"></i>Reset Password
							</button>
						</div>
					</div> {{-- /.form-group --}}

					{!! Form::close() !!}

				</div> {{-- /.panel-body --}}

			</div> {{-- /.panel-default --}}

		</div> {{-- /.col-md-6 --}}
	</div> {{-- /.row --}}

@endsection
