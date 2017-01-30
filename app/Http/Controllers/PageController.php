<?php

namespace Projacked\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use function view;

class PageController extends Controller
{
    public function get($slug) {
        if (!View::exists('pages.' . $slug)) {
            abort(404);
        }
        return view('pages.' . $slug);
    }
}
