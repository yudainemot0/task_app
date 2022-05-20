<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasklist', ['tasks'=>$tasks]);
    }

    /**
     * タスク登録
     */
    public function add(Request $request)
    {
        $request->validate([
            'content'=>'required|min:2|max:50'
        ]);

        Task::create([
            'content'=>$request->content
        ]);

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // $id = $request->input('id');
        // dd($id);
        Task::where('id', $id)->delete();
        return redirect()->route('task.index');
    }
}
