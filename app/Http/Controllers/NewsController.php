<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\ModelNew;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    public function show($newId)
    {
        $new = ModelNew::find($newId);

        if (empty($new)) {
            throw new NotFoundHttpException();
        }

        return view('new', [
            'userName' => 'Ольга',
            'new' => $new
        ]);
    }
}
