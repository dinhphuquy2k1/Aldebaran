<?php

namespace Src\Application\Shared\DTOs;

use Src\Domain\Shared\Interfaces\IPaginationResult;
use Src\Domain\Shared\Snapshots\PaginationSnapshot;

class PaginationDTO implements IPaginationResult
{
    public function __construct(
        public array        $items,
        public readonly int $currentPage,
        public readonly int $limit,
        public readonly int $total,
        public readonly int $lastPage
    )
    {
    }

    public function items(): array
    {
        return $this->items;
    }

    public function currentPage(): int
    {
        return $this->currentPage;
    }

    public function limit(): int
    {
        return $this->limit;
    }

    public function total(): int
    {
        return $this->total;
    }

    public function lastPage(): int
    {
        return $this->lastPage;
    }

    /**
     * @param array $items
     * @return void
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return PaginationSnapshot
     */
    public function toArray(): PaginationSnapshot
    {
        return new PaginationSnapshot(
            $this->total,
            $this->limit,
            $this->currentPage,
            $this->lastPage
        );
    }
}
