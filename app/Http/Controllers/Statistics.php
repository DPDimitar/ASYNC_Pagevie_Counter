<?php

namespace App\Http\Controllers;

use App\Models\PageViewLog;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Statistics extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        /*
         SELECT DATE(created_at) AS date, COUNT(*) AS views_count
        FROM page_view_logs
        WHERE user_id IS NULL
        GROUP BY DATE(created_at);*/

        /*
        SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS views_count
        FROM page_view_logs
        WHERE user_id IS NULL
        GROUP BY DATE_FORMAT(created_at, '%Y-%m');
        */

        $logs_by_day_unauthorized = DB::table('page_view_logs')->selectRaw('DATE(created_at) AS date, COUNT(*) AS views_count')->where('user_id', '!=', null)->groupBy('date')->get();
        $logs_by_day_authorized = DB::table('page_view_logs')->selectRaw('DATE(created_at) AS date, COUNT(*) AS views_count')->where('user_id', '=', null)->groupBy('date')->get();
        $logs_by_month_unauthorized = DB::table('page_view_logs')->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS views_count")->where('user_id', '!=', null)->groupBy('month')->get();
        $logs_by_month_authorized = DB::table('page_view_logs')->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS views_count")->where('user_id', '=', null)->groupBy('month')->get();

        return view('statistics', ['logs_by_day_unauthorized' => $logs_by_day_unauthorized, 'logs_by_day_authorized' => $logs_by_day_authorized, 'logs_by_month_unauthorized' => $logs_by_month_unauthorized, 'logs_by_month_authorized' => $logs_by_month_authorized]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
