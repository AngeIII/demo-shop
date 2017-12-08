<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Add where params based on search query.
     *
     * @param Request $request
     * @param Builder $builder
     * @param array $columns
     *
     * @return Builder
     */
    public function manageSearch(Request $request, $builder, $columns)
    {
        if (!$request->input('q')) {
            return $builder;
        }

        $builder->where(
            function ($builder) use ($request, $columns) {
                $mainTable = $builder->getModel()->getTable();

                $keyword = $request->input('q');

                foreach ($columns as $k => $column) {
                    $chunks = explode('.', $column);

                    $sameTable = count($chunks) === 1 || $chunks[0] === $mainTable;

                    if (!$sameTable) {
                        $column = array_pop($chunks);
                        $table = implode('.', $chunks);
                    } else {
                        $table = $mainTable;
                    }

                    if ($column === 'id' || substr($column, -3, 3) === '_id' || substr($column, 0, 1) === '=') {
                        $value = $keyword;
                        $comparison = '=';

                        if (substr($column, 0, 1) === '=') {
                            $column = substr($column, 1);
                        }
                    } else {
                        $value = '%' . $keyword . '%';
                        $comparison = 'like';
                    }

                    if ($sameTable) {
                        $method = $k === 0 ? 'where' : 'orWhere';

                        $builder->$method($column, $comparison, $value);
                    } else {
                        $method = $k === 0 ? 'whereHas' : 'orWhereHas';

                        $builder->$method(
                            $table,
                            function ($query) use ($column, $comparison, $value) {
                                $query->where($column, $comparison, $value);
                            }
                        );
                    }
                }
            }
        );

        return $builder;
    }
}
