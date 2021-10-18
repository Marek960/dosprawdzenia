<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Auth;
use App\Models\User;

class CommentController extends Controller
{
    public function edit($id)
    {
        $data = Comment::findOrFail($id);
        return view('comments.editComment', compact('data'));
    }

    public function editStore(Request $request)
    {
        $comment = Comment::find($request->input('id'));

        $comment->description = $request->input('description');
        $comment->save();

        return redirect('/')->with('success', 'Edytowano komentarz!');
    }

    public function destroy(CommentRepository $commentRepo, $id)
    {   
        $data = $commentRepo->delete($id);

        return redirect('/')->with('success', 'Usunięto komentarz!');
    }

    public function store(Request $request, $task){
        $user = User::findOrFail(Auth::id());
        $this->validate($request, ['description' => 'required|max:1000']);
        $comment = new Comment();
        $comment->task_id = $task;
        $comment->user_id = Auth::id();
        $comment->description = $request->description;
        $comment->author = $user->name;
        $comment->save();

        return redirect('/')->with('success', 'Utworzono komentarz!');

    }
}
