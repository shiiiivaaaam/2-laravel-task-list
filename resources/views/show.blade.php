@extends('layout.main')

@section('title','Show Page')

@section('main')


<h1>Task</h1>
<h2 class='text-2xl mb-4 '>{{$task->title}}</h2>
<p class='mb-4 text-slate-700'>{{$task->description}}</p>
<p class='mb-4 text-slate-700'>{{$task->long_description}}</p>
<p class="text-sm text-slate-500 mb-4">Created:{{$task->created_at->diffForHumans()}} || Updated:{{$task->updated_at->diffForHumans()}}</p>

<div class='mb-4'>
@if($task->completed)
    <span class="text-medium text-green-500">Completed</span>
@else
    <span class="text-medium text-red-500">Not Completed</span>
@endif
</div>

<div class="flex gap-2">

<a class='rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 hover:bg-slate-50' href="{{route('update',$task)}}">Update</a>

<form action="{{route('toggle',$task)}}" method='post'>
    @csrf
    @method('put')
    <button class='btn'>Change task status</button>
</form>

<form action="{{route('delete',$task)}}" method='post'>
    @csrf
    @method('delete')
    <button class='btn'>Delete</button>
</form>
<div>


@endsection
