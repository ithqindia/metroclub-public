<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $comments = Comment::where('user_id', $user->id)->get();
        return CommentResource::collection($comments)->all();
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        Comment::create([
            'user_id' => $user->id,
            'comment' => $request->get('comment')
        ]);
        return response()->json([
            'success' => 'Comment added'
        ], 201);
    }
}
