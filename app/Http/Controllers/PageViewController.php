<?php

namespace App\Http\Controllers;

use App\Models\PageView;
use App\Models\PageViewLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageView  $pageView
     * @return \Illuminate\Http\Response
     */
    public function show(PageView $pageView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageView  $pageView
     * @return \Illuminate\Http\Response
     */
    public function edit(PageView $pageView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageView  $pageView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageView $pageView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageView  $pageView
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageView $pageView)
    {
        //
    }

    public function incrementPageView(Request $request, $url): \Illuminate\Http\JsonResponse
    {
        $pageView = PageView::where('url', $url)->first();

        if (!$pageView) {
            $pageView = new PageView;
            $pageView->url = $url;
        }

        $pageView->views_count++;

/*        if (Auth::check()) {
            $pageView->user_id = Auth::id();
        }*/

        $pageView->save();

        $pageViewLog = new PageViewLog;
        $pageViewLog->url = $url;

        if (Auth::check()) {
            $pageViewLog->user_id = Auth::id();
        }

        $pageViewLog->save();

        return response()->json(['status' => 'success']);
    }

}
