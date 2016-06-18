@extends('layouts.main')

@section('title', 'Profile')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Update profile</h1>

			@include('layouts.partials.alerts')

			{!! Form::open(['route' => 'user.profile', 'method' => 'put', 'class' => 'form-horizontal']) !!}

			<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
				{!! Form::label('first_name', 'First Name:', ['class' => 'control-label col-md-2']) !!}
				<div class="col-md-10">
					{!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
					@if ($errors->has('first_name'))
						<span class="text-danger">{{ $errors->first('first_name') }}</span>
					@endif
				</div>
			</div> {{-- /.form-group --}}

			<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
				{!! Form::label('last_name', 'Last Name:', ['class' => 'control-label col-md-2']) !!}
				<div class="col-md-10">
					{!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
					@if ($errors->has('last_name'))
						<span class="text-danger">{{ $errors->first('last_name') }}</span>
					@endif
				</div>
			</div> {{-- /.form-group --}}

			<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
				{!! Form::label('username', 'Username:', ['class' => 'control-label col-md-2']) !!}
				<div class="col-md-10">
					{!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
					@if ($errors->has('username'))
						<span class="text-danger">{{ $errors->first('username') }}</span>
					@endif
				</div>
			</div> {{-- /.form-group --}}

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				{!! Form::label('email', 'Email:', ['class' => 'control-label col-md-2']) !!}
				<div class="col-md-10">
					{!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
					@if ($errors->has('email'))
						<span class="text-danger">{{ $errors->first('username') }}</span>
					@endif
				</div>
			</div> {{-- /.form-group --}}

			<div class="form-group">
				<div class="col-md-10 col-md-offset-2">
					<button type="submit" class="btn btn-primary">Update Profile</button>
				</div>
			</div> {{-- /.form-group --}}

			{!! Form::close() !!}
		</div>
	</div>
@endsection
