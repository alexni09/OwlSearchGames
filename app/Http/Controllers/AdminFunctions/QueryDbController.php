<?php

namespace App\Http\Controllers\AdminFunctions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class QueryDbController extends Controller {
    public function show(): Response {
        $this->authorize('admin.generic');
        return Inertia::render('AdminFunctions/QueryDb');
    }

    public function display(Request $request): Response {
        $this->authorize('admin.generic');
        $se = $request['select'] ?? '*';
        $tb = $request['table'] ?? 'users';
        $wh = $request['where'] ?? null;
        $gb = $request['groupby'] ?? null;
        $ha = $request['having'] ?? null;
        $ob = $request['orderby'] ?? null;
        $result = DB::table($tb)->selectRaw($se)->when($wh, function(Builder $query1, string $wh) {
            $query1->whereRaw($wh);
        })->when($gb, function(Builder $query2, string $gb) {
            $query2->groupByRaw($gb);
        })->when($ha, function(Builder $query3, string $ha) {
            $query3->havingRaw($ha);
        })->when($ob, function(Builder $query4, string $ob) {
            $query4->orderByRaw($ob);
        })->get();
        if ($result->isEmpty()) $columns = null;
        else $columns = collect($result[0])->keys();
        return Inertia::render('AdminFunctions/DisplayDb', [
            'columns' => $columns,
            'rows' => $result
        ]);
    }
}