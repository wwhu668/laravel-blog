<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CommentRequest $request)
    {
        Comment::create($request->all());
        return redirect('home/'.$request->article_id); 
    }
}
