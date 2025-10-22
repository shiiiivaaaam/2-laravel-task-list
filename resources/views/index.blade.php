@extends('layout.main')

@section('title','Task Page')

@section('main')

<h1>Task List</h1>

<a class="font-medium text-gray-700 underline decoration-pink-500"href="{{route('create')}}">Add Task</a>
</nav>
@forelse($tasks as $i=>$task)
<ul>
    <li><a @class(['line-through'=>$task->completed]) href="{{route('show',$task)}}">{{$task->title}}</a></li>
</ul>

@empty

    No task there

@endforelse
@if($tasks->count())
   <div class="mt-4">{{$tasks->links()}}</div>
@endif

@endsection
