<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexGetNewsCommentRequest;
use App\Http\Requests\StorePostNewsCommentRequest;
use App\Services\CommentsService;

class NewsCommentsController
{
    public function index(int $newId, IndexGetNewsCommentRequest $request, CommentsService $commentsService)
    {
        $comments = $commentsService->getComments($newId, $request->page);

        $response = [
            'comments' => $comments,
            'totalCount' => $commentsService->getCommentsQuery($newId)->count(),
            'commentsChildren' => $commentsService->getCommentsChildren($comments)
        ];

        return response()->json($response, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function store(StorePostNewsCommentRequest $request, int $newId, CommentsService $commentsService)
    {
        $comment = $commentsService->createComment($request->comment, $request->parent_id, $newId);

        return response()->json([
            'status' => 'success',
            'comment_id' => $comment->id
        ]);
    }
}
