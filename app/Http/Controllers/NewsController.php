<?php

namespace App\Http\Controllers;

use App\Models\ModelNew;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    public function show($newId)
    {
        return view('new', [
            'userName' => 'Ольга',
            'new' => $this->getNew($newId)
        ]);
    }

    private function getNew($newId)
    {
        $new = ModelNew::find($newId);

        if (empty($new)) {
            throw new NotFoundHttpException();
        }

        return $new;
    }
}
