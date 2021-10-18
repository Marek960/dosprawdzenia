<?php 

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends BaseRepository{

    public function __construct(Task $model){
        $this->model = $model;
    }

    public function getAllTasks(){
        return $this->model->latest()->paginate(6);
    }

}