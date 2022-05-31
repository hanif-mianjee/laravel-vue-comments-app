<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::with('repliesRecursive')->whereNull('comment_id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * TODO:: Validate inputs
         */

        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->user_name = $request->input('user_name');
        $comment->comment_id = $request->input('comment_id'); // default = null
        $comment->save();
    }
}
