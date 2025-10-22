<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/','index');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',function(){
    $tasks = App\Models\Task::latest()->paginate(8);


    return view('index',[
        'tasks'=>$tasks
    ]);
})->name('index');

Route::get('/show/{task}',function(Task $task){
    return view('show',compact('task'));
})->name('show');

Route::view('/create','forms.add-update')->name('create');

Route::post('/create',function(){
    $validated = request()->validate([
        'title'=>'required|min:4',
        'description'=>'required|max:200',
        'long_description'=>'required|max:400',
    ]);
    $task = Task::create($validated);

    return redirect()->route('show',$task)->with('success','task created');
})->name('create');

Route::get('/update/{task}',function(Task $task){
    return view('forms.add-update',compact('task'));
})->name('update');

Route::put('/toggle/{task}',function(Task $task){
    $task->completed = !$task->completed;
    $task->save();

    return redirect()->back()->with('success','status changed');
})->name('toggle');

Route::put('/update/{task}',function(Task $task,TaskRequest $request){
    $data = $request->validated();
  $task->update($data);
    return redirect()->route('show',$task)->with('success','task updated');
})->name('update');

Route::delete('/delete/{task}',function(Task $task){
    $task->delete();
    return redirect('/')->with('success',"Task Deleted");
})->name('delete');
