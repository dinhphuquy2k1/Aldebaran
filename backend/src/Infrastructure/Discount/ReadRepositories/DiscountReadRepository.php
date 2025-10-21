<?php

namespace Src\Infrastructure\Discount\ReadRepositories;

use Src\Domain\Discount\Models\Discount;
use Src\Domain\Discount\Models\DiscountCode;
use Src\Domain\Discount\Models\DiscountId;
use Src\Domain\Discount\Models\DiscountType;
use Src\Domain\Discount\ReadRepositories\IDiscountReadRepository;
use Src\Domain\DiscountTimeRule\Models\DiscountTimeRule;
use Src\Domain\DiscountTimeRule\Models\DiscountTimeRuleId;
use Src\Domain\Shared\Models\Date;
use Src\Domain\Shared\Models\Day;
use Src\Domain\Shared\Models\Time;
use Src\Infrastructure\Shared\Repositories\BaseRepository;

class DiscountReadRepository extends BaseRepository implements IDiscountReadRepository
{
    /**
     * @param \Src\Infrastructure\Discount\Models\Discount $model
     */
    public function __construct(
        \Src\Infrastructure\Discount\Models\Discount $model
    )
    {
        parent::__construct($model);
    }

    /**
     * @param array $filters
     * @return Discount[]
     */
    public function getDiscounts(
        array $filters = []
    ): array
    {
        $query = $this->model->newQuery();
        foreach ($filters as $key => $value) {
            if ($value !== null) {
                $query->where($key, $value);
            }
        }

        $items = $query->get();
        $results = [];
        foreach ($items as $record) {
            $results[] = new Discount(
                new DiscountId($record->getAttributeValue('id')),
                new DiscountCode($record->getAttributeValue('code')),
                new DiscountType($record->getAttributeValue('type')),
                new Date($record->getAttributeValue('start_at')),
                $record->getAttributeValue('end_at') ? new Date($record->getAttributeValue('end_at')) : null,
            );
        }

        return $results;
    }

    public function getDiscountById(int $discountId): ?Discount
    {
        $query = $this->model->newQuery();
        $query->with(['timeRules']);
        $query->where('id', $discountId);

        $record = $query->first();
        if (!$record) return null;

        $timeRules = [];
        foreach ($record->timeRules as $timeRule) {
            $timeRules[] = new DiscountTimeRule(
                new DiscountTimeRuleId($timeRule->getAttributeValue('id')),
                new DiscountId($timeRule->getAttributeValue('discount_id')),
                new Day((int)$timeRule->getAttributeValue('day_of_week')),
                new Time($timeRule->getAttributeValue('start_time')),
                new Time($timeRule->getAttributeValue('end_time')),
                (bool)$timeRule->getAttributeValue('all_day')
            );
        }

        return new Discount(
            new DiscountId($record->getAttributeValue('id')),
            new DiscountCode($record->getAttributeValue('code')),
            new DiscountType($record->getAttributeValue('type')),
            new Date($record->getAttributeValue('start_at')),
            $record->getAttributeValue('end_at') ? new Date($record->getAttributeValue('end_at')) : null,
            $timeRules,
        );
    }
}
