<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\ModelNew;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentsService
{
    const COUNT_RECORDS_ON_PAGE = 2;

    public function getCommentsQuery($newId)
    {
        return Comment::query()
            ->whereNull('parent_id')
            ->where('new_id', $newId)
            ->orderBy('id', 'desc');
    }

    public function getComments($newId, $page)
    {
        $offset = self::COUNT_RECORDS_ON_PAGE * $page - self::COUNT_RECORDS_ON_PAGE;

        $commentsQuery = $this->getCommentsQuery($newId)
            ->limit(self::COUNT_RECORDS_ON_PAGE)
            ->offset($offset);

        return $commentsQuery
            ->get()
            ->toArray();
    }

    public function getCommentsChildren($comments)
    {
        $parentIds = [];
        foreach ($comments as $comment) {
            $parentIds[] = $comment['id'];
        }

        $commentsChildren = [];
        if (! empty($parentIds)) {
            $commentsChildren = Comment::query()
                ->whereIn('parent_id', $parentIds)
                ->orderBy('id', 'asc')
                ->limit(10)
                ->get()
                ->toArray();
        }

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
