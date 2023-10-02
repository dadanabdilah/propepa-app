<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        $data = [
            'articles' => ArticleModel::latest()->limit(2)->get()
        ];

        return view('layouts/main', $data);
    }

    public function article()
    {
        $data = [
            'articles' => ArticleModel::latest()->get()
        ];

        return view('layouts/articles', $data);
    }

    public function articleDetail($slug)
    {
        $data = [
            'article' => ArticleModel::whereSlug($slug)->firstOrFail()
        ];

        return view('layouts/article-detail', $data);
    }
}
