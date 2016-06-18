@extends('layouts.main')

@section('title','Password reset')

@section('content')
	Click Here to Reset your Password: <br>
	<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">
		{{ $link }}
	</a>
@endsection
