<?php

namespace Src\Presentation\Category\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Src\Application\Category\UseCases\Queries\GetCategoryQuery;
use Src\Application\Shared\Bus\CommandBus;
use Src\Application\Shared\Bus\QueryBus;
use Src\Application\Shared\Exceptions\HandlerNotFoundException;
use Src\Application\Venue\UseCases\Queries\GetVenueReviewQuery;

final class CategoryController extends Controller
{
    /**
     * @param CommandBus $commandBus
     * @param QueryBus $queryBus
     */
    public function __construct(
        private CommandBus $commandBus,
        private QueryBus   $queryBus,
    )
    {

    }

    /**
     * @return JsonResponse
     * @throws HandlerNotFoundException
     */
    public function categories(): JsonResponse
    {
        $query = new GetCategoryQuery();

        $categories = $this->queryBus->dispatch($query);
        return response()->json([
            'data' => $categories,
        ]);
    }
}
