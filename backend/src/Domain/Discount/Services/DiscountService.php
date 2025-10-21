<?php

declare(strict_types=1);

namespace Src\Domain\Discount\Services;

use Illuminate\Support\Facades\Cache;
use Src\Domain\Category\Snapshots\CategorySnapshot;
use Src\Domain\Discount\ReadRepositories\IDiscountReadRepository;
use Src\Domain\Discount\Snapshots\DiscountSnapshot;
use Src\Domain\Shared\Enums\DayEnum;
use Src\Domain\Shared\Models\Day;

readonly class DiscountService implements IDiscountService
{
    public function __construct(
        private IDiscountReadRepository $discountReadRepository
    )
    {
    }


    /**
     * @param array $filters
     * @return DiscountSnapshot[]
     */
    public function getDiscounts(
        array $filters = []
    ): array
    {
        $discounts = $this->discountReadRepository->getDiscounts($filters);
        $results = [];
        foreach ($discounts as $discount) {
            $results[] = DiscountSnapshot::fromArray($discount);
        }

        return $results;
    }

    /**
     * @param int $discountId
     * @return DiscountSnapshot|null
     */
    public function getDiscountById(int $discountId): ?DiscountSnapshot
    {
        $discount = $this->discountReadRepository->getDiscountById($discountId);
        if (!empty($discount)) {
            $data = DiscountSnapshot::fromArray($discount);
            $timeRules = [];
            foreach (DayEnum::getKeys() as $dayOfWeek) {
                $timeRules[strtolower($dayOfWeek)] = [];
            }

            foreach ($data->discountTimeRules as $discountTimeRule) {
                $timeRules[$discountTimeRule->dayOfWeek][] = $discountTimeRule;
            }

            $data->discountTimeRules = $timeRules;
            return $data;
        }

        return null;
    }
}
