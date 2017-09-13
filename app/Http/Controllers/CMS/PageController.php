<?php

namespace Projacked\Http\Controllers\CMS;

use Projacked\Models\Page;
use Illuminate\Http\Request;
use Projacked\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('cms.page.list', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'slug', 'label', 'body']);
        Page::create($data);
        return redirect(route('cms.pages.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Projacked\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('cms.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Projacked\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->update($request->only(['slug', 'title', 'label', 'body']));
        return redirect(route('cms.pages.index'));
    }
}
