<?php

namespace Src\Presentation\FilterOption\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Src\Application\FilterOption\UseCases\Queries\GetFilterOptionQuery;
use Src\Application\Shared\Bus\QueryBus;
use Src\Application\Shared\Exceptions\HandlerNotFoundException;

final class FilterOptionController extends Controller
{
    public function __construct(
        private readonly QueryBus $queryBus,
    )
    {

    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws HandlerNotFoundException
     */
    public function filters(Request $request): JsonResponse
    {
        $query = new GetFilterOptionQuery(
            screenKey: $request->get('screenKey') !== null ? (int)$request->get('screenKey') : null,
        );

        $filters = $this->queryBus->dispatch($query);
        return response()->json([
            'data' => $filters,
        ]);
    }
}
