<?php

namespace Src\Application\FilterOption\UseCases\Commands;

use Exception;
use Src\Application\Shared\Interfaces\ICommand;
use Src\Application\Shared\Interfaces\ICommandHandler;
use Src\Domain\FilterOption\Services\IFilterOptionService;

readonly class GetFilterOptionCommandHandler implements ICommandHandler
{
    public function __construct(
        private IFilterOptionService $filterOptionService,
    )
    {
    }

    /**
     * @throws Exception
     */
    public function handle(ICommand $command): array
    {
        $filters = [
            'screen_key' => $command,
        ];

        return $this->filterOptionService->getRecursiveFilterOptions(filters: array_filter($filters));
    }
}
