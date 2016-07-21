@extends('layouts.main')

@section('title', 'Edit Task')

@section('content')
{!! Form::open(['route' => ['task.update', $task->id], 'method' => 'put', 'class' => 'form-horizontal', 'id' => 'add-task-form']) !!}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Task name:', ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name', $task->name, ['class' => 'form-control', 'id' => 'name']) !!}
            @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
        </div>
            <div class="col-md-4">
                {!! Form::submit('Edit task', ['class' => 'btn btn-primary', 'id' => 'add-task']) !!}
            </div>
    </div> <!-- /.form-group -->
{!! Form::close() !!}

@endsection