<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Repositories\TaskRepository;
use App\Models\User;
use App\Models\AssignUser;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{   
    public function index(TaskRepository $taskRepo)
    {
        $data = $taskRepo->getAllTasks();

         return view('index', compact('data'))
             ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function create()
    {
        return view('tasks.addTask');
    }

    public function store(TaskRepository $taskRepo, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'planning_time' => 'required',
            'doing_time' => 'required',
            'branch' => 'required',
            'status' => 'required'
        ]);

        $form_data = array(
            'name'             =>      $request->name,
            'description'      =>      $request->description,
            'planning_time'    =>      $request->planning_time,
            'doing_time'       =>      $request->doing_time,
            'branch'           =>      $request->branch,
            'status'           =>      $request->status
        );
        $taskRepo->create($form_data);
        return redirect('/')->with('success', 'Dodano zadanie!');
    }

    public function show(TaskRepository $taskRepo, $id)
    {
        $data =  $taskRepo->find($id);
        $branchesNames = $this->getBranch();
        $branchStatus = 0;

        foreach ($branchesNames as $key => $branchName) {
           if ($branchName === $data->branch) {
                $branchStatus = 1;
           }
        }

       return view('tasks.showTask', compact('data', 'branchStatus'));
    }

    public function edit($id)
    {
        $data = Task::findOrFail($id);
        $users = [];
        foreach (User::all() as $value) {
           $users[$value->id] = $value->name;
        }

        return view('tasks.editTask', compact('data', 'users'));
    }

    public function editStore(Request $request)
    {
        $task = Task::find($request->input('id'));

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->planning_time = $request->input('planning_time');
        $task->doing_time = $request->input('doing_time');
        $task->branch = $request->input('branch');
        $task->status = $request->input('status');
        $task->save();

        $assignUser = new AssignUser();
        $assignUser->task_id =$request->input('id');
        $assignUser->user_id = $request->input('assignUser');
        $assignUser->save();

        return redirect('/')->with('success', 'Edytowano zadanie!');
    }

    public function destroy(TaskRepository $taskRepo, $id)
    {   
        $data = $taskRepo->delete($id);

        return redirect('/')->with('success', 'Usunięto zadanie!');
    }

    public function getBranch(){
        $response = Http::get('https://api.bitbucket.org/2.0/repositories/Rakky96/projectmanagement/refs/branches?');
        $branches = [];

        foreach ( $response->json()["values"] as $key => $value) {
          $branches[] = $value['name'];
        }

        return $branches;
    }

}
