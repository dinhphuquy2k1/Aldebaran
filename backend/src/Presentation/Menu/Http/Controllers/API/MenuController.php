<?php

namespace Src\Presentation\Menu\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Src\Application\Menu\UseCases\Queries\GetMenuQuery;
use Src\Application\Shared\Bus\CommandBus;
use Src\Application\Shared\Bus\QueryBus;
use Src\Application\Shared\Exceptions\HandlerNotFoundException;


final class MenuController extends Controller
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
    public function menus(): JsonResponse
    {
        $query = new GetMenuQuery();

        $categories = $this->queryBus->dispatch($query);
        return response()->json([
            'data' => $categories,
        ]);
    }
}
