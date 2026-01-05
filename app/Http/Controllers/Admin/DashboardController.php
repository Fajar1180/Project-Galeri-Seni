<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Artist;
use App\Models\Exhibition;
use App\Models\Auction;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'artworks' => Artwork::count(),
            'artists' => Artist::count(),
            'exhibitions' => Exhibition::count(),
            'auctions' => Auction::count(),
            'articles' => Article::count(),
            'comments' => Comment::count(),
            'collections' => Collection::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}