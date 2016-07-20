@extends('layouts.main')

@section('title', 'All task')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('layouts.partials.alerts')
            @include('task.create')

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Check</th>
                        <th>Task name</th>
                        <th>Completed</th>
                        <th>Number of subtask</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td></td>
                            <td>
                                {!! link_to_route('task.show', $task->name , [$task->id]) !!}
                            </td>
                            <td>
                                {{ $task->completed == 0 ? 'Not completed' : 'Completed' }}
                            </td>
                            <td>number of subtask</td>
                            <td>
                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($task->created_at))->diffForHumans() }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($task->updated_at))->diffForHumans() }}
                            </td>
                            <td class="button-details">
                                {!! link_to_route('task.edit', '', [$task->id], ['class' => 'btn btn-primary fa fa-list',
                                    'type' => 'submit','data-toggle' => 'tooltip', 'data-placement' => 'top',
                                    'title' => 'Edit', 'aria-hidden' => 'true']);
                                !!}
                                {!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'delete']) !!}
                                    {!! Form::button('', ['class' => 'btn btn-danger fa fa-remove', 'type' => 'submit',
                                        'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Delete',
                                        'aria-hidden' => 'true']);
                                    !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $tasks->links() }}

        </div>
    </div>



@endsection