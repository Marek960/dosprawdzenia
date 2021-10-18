<?php 

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends BaseRepository{

    public function __construct(Comment $model){
        $this->model = $model;
    }

    public function getAllComments(){
        return $this->model::latest()->paginate(6);
    }

}