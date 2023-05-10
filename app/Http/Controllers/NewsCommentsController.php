<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostNewsCommentRequest;
use App\Services\CommentsService;

class NewsCommentsController
{
    public function index(int $newId, CommentsService $commentsService)
    {
        $comments = $commentsService->getComments($newId);

        $response = [
            'comments' => $comments,
            'commentsChildren' => $commentsService->getCommentsChildren($comments)
        ];

        return response()->json($response, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function store(StorePostNewsCommentRequest $request, int $newId, CommentsService $commentsService)
    {
        $commentText = $request->comment;
        $parentId = $request->parent_id;

        $comment = $commentsService->createComment($commentText, $parentId, $newId);

        return response()->json([
            'status' => 'success',
            'comment_id' => $comment->id
        ]);
    }
}
