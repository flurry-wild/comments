<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\ModelNew;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentsService
{
    public function getComments()
    {
        return Comment::query()->whereNull('parent_id')->orderBy('id', 'desc')->limit(10)->get()->toArray();
    }

    public function getCommentsChildren($comments)
    {
        $parentIds = [];
        foreach ($comments as $comment) {
            $parentIds[] = $comment['id'];
        }

        $commentsChildren = Comment::query()->whereIn('parent_id', $parentIds)->orderBy('id', 'desc')->get()->toArray();
        $resultCommentChildren = [];
        foreach ($commentsChildren as $commentChild) {
            $parentId = $commentChild['parent_id'];
            unset($commentChild['parent_id']);
            $resultCommentChildren[$parentId][] = $commentChild;
        }

        return $resultCommentChildren;
    }

    public function createComment($commentText, $parentId, $newId)
    {
        $new = ModelNew::find($newId);

        if (empty($new)) {
            throw new NotFoundHttpException();
        }

        return Comment::create([
           'user_id' => null,
           'new_id' => $newId,
           'text' => $commentText,
           'parent_id' => $parentId
        ]);
    }
}
