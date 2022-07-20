<?php

namespace App\Http\Controllers;

use App\Events\PreviewTask;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::get();
        foreach($tasks as $item){
            PreviewTask::dispatch($item->title, $item->desc , $item->status , 'all tasks');
           }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $validatedTask = $request->validated();
        $task = Task::create($validatedTask);
        PreviewTask::dispatch($task->title,$task->desc,$task->status ,' task created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=Task::where('id',$id)->get();
        foreach($task as $item){
         PreviewTask::dispatch($item->title, $item->desc , $item->status , 'none');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $task=Task::findOrFail($id);
        $validatedData = $request->validated();
        $task->fill($validatedData);
        $task->save();
        PreviewTask::dispatch($task->title,$task->desc,$task->status , 'Task updated');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Task::findOrFail($id);
        Task::destroy($id);
        PreviewTask::dispatch('none','none' ,'none' , 'Task Deleted');
    }
}
