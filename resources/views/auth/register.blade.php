@extends('layouts.main')

@section('title', 'Register')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-default">

				<div class="panel-heading">
					<p class="panel-title text-center">Register</p>
				</div>{{-- /.panel-heading --}}

				<div class="panel-body">

					{!! Form::open(['class' => 'form-horizontal']) !!}

					<div class="form-group">
						{!! Form::label('username', 'Username:', ['class' => 'control-label col-md-2']) !!}
						<div class="col-md-10">
							{!! Form::text('username', '', ['class' => 'form-control']) !!}
						</div>
					</div> {{-- /.form-group --}}

					<div class="form-group">
						{!! Form::label('email', 'Email:', ['class' => 'control-label col-md-2']) !!}
						<div class="col-md-10">
							{!! Form::email('email', '', ['class' => 'form-control']) !!}
						</div>
					</div> {{-- /.form-group --}}

					<div class="form-group">
						{!! Form::label('password', 'Password:', ['class' => 'control-label col-md-2']) !!}
						<div class="col-md-10">
							{!! Form::password('password', ['class' => 'form-control']) !!}
						</div>
					</div> {{-- /.form-group --}}

					<div class="form-group">
						{!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label col-md-2']) !!}
						<div class="col-md-10">
							{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
						</div>
					</div> {{-- /.form-group --}}

					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							{!! Form::submit('Register', ['class' => 'btn btn-primary ']) !!}
						</div>
					</div> {{-- /.form-group --}}

					{!! Form::close() !!}

				</div> {{-- /.panel-body --}}

			</div> {{-- /.panel-default --}}

		</div> {{-- /.col-md-6 --}}
	</div> {{-- /.row --}}

@endsection
