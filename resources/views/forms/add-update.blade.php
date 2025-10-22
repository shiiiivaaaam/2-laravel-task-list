@extends('layout.main')

@section('title',isset($task)?'Update':'Create')

@section('main')

<h1>{{isset($task)?'Update Task':'Create Task'}}</h1>
<form action="{{isset($task)?route('update',$task):route('create')}}" method="post">
    @csrf
    @isset($task)
        @method('put')
    @endisset
    <div class='mb-4'>
    <label for="title">Title</label>
    <input @class(['border-red-500'=>$errors->has('title')]) type="text" name="title" id="title" value="{{$task->title?? old('title')}}">
    @error('title')
        <div class='error'>{{$message}}</div>
    @enderror
    </div>
    <div class='mb-4'>
    <label for="description">Description</label>
    <textarea @class(['border-red-500'=>$errors->has('description')]) name="description" id="description">{{($task->description)?? old('description')}}</textarea>
    @error('description')
        <div class='error'>{{$message}}</div>
    @enderror
    </div>
    <div class='mb-4'>
    <label for="long_description">Long Description</label>
    <textarea @class(['border-red-500'=>$errors->has('long_description')]) name="long_description" id="long_description">{{($task->long_description)?? old('long_description')}}</textarea>
    @error('long_description')
        <div class='error'>{{$message}}</div>
    @enderror
    </div >
    <div class='flex gap-4 items-center'>
    <button class='btn'>{{isset($task)?'Update':'Create'}}</button>
    <a class='font-medium text-slate-700 underline decoration-pink-500' href="{{url('/')}}">Cancel</a>
    </div>


</form>


@endsection
