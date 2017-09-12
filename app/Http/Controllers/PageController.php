<?php

namespace Projacked\Http\Controllers;

use Projacked\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use function view;

class PageController extends Controller
{
    public function get($slug) {
        $page = Page::where('slug', $slug)->first();
        if ($page) {
            return view('page', compact('page'));
        }
        if (View::exists('pages.' . $slug)) {
            return view('pages.' . $slug);
        }
        abort(404);
    }
}
