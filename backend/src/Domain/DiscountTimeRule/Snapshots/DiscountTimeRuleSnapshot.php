<?php

namespace Src\Domain\DiscountTimeRule\Snapshots;

use Src\Domain\DiscountTimeRule\Models\DiscountTimeRule;

class DiscountTimeRuleSnapshot
{
    /**
     * @var int
     */
    public int $discountTimeRuleId;

    /**
     * @var int
     */
    public int $discountId;

    /**
     * @var string
     */
    public string $dayOfWeek;

    /**
     * @var string
     */
    public string $startTime;

    /**
     * @var string|null
     */
    public ?string $endTime;

    /**
     * @var bool
     */
    public bool $allDay;

    /**
     * @param int $discountTimeRuleId
     * @param int $discountId
     * @param string $dayOfWeek
     * @param string $startTime
     * @param string|null $endTime
     * @param bool $allDay
     */
    public function __construct(int $discountTimeRuleId, int $discountId, string $dayOfWeek, string $startTime, ?string $endTime, bool $allDay)
    {
        $this->discountTimeRuleId = $discountTimeRuleId;
        $this->discountId = $discountId;
        $this->dayOfWeek = $dayOfWeek;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->allDay = $allDay;
    }

    /**
     * @param DiscountTimeRule $discountTimeRule
     * @return self
     */
    public static function fromArray(DiscountTimeRule $discountTimeRule): self
    {
        return new self(
            discountTimeRuleId: $discountTimeRule->getDiscountTimeRuleId()->getValue(),
            discountId: $discountTimeRule->getDiscountId()->getValue(),
            dayOfWeek: $discountTimeRule->getDayOfWeek()->getName(),
            startTime: $discountTimeRule->getStartTime()->getValue(),
            endTime: $discountTimeRule->getEndTime()?->getValue(),
            allDay: $discountTimeRule->isAllDay(),
        );
    }
}
