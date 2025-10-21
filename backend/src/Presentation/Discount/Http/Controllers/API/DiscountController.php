<?php

namespace Src\Presentation\Discount\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Src\Application\Discount\UseCases\Queries\GetDiscountDetailQuery;
use Src\Application\Discount\UseCases\Queries\GetDiscountQuery;
use Src\Application\FilterOption\UseCases\Queries\GetFilterOptionQuery;
use Src\Application\Shared\Bus\QueryBus;
use Src\Application\Shared\Exceptions\HandlerNotFoundException;

final class DiscountController extends Controller
{
    public function __construct(
        private readonly QueryBus $queryBus,
    )
    {

    }

    /**
     * @param int $id
     * @return JsonResponse
     * @throws HandlerNotFoundException
     */
    public function show(int $id): JsonResponse
    {
        $query = new GetDiscountDetailQuery(
            discountId: $id,
        );

        $discount = $this->queryBus->dispatch($query);
        return response()->json([
            'data' => $discount,
        ]);
    }
}
