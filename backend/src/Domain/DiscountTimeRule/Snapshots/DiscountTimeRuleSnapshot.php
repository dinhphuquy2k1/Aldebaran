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
    public string $startAt;

    /**
     * @var string|null
     */
    public ?string $endAt;

    /**
     * @param int $discountTimeRuleId
     * @param int $discountId
     * @param string $dayOfWeek
     * @param string $startAt
     * @param string|null $endAt
     */
    public function __construct(int $discountTimeRuleId, int $discountId, string $dayOfWeek, string $startAt, ?string $endAt)
    {
        $this->discountTimeRuleId = $discountTimeRuleId;
        $this->discountId = $discountId;
        $this->dayOfWeek = $dayOfWeek;
        $this->startAt = $startAt;
        $this->endAt = $endAt;
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
            startAt: $discountTimeRule->getStartTime()->getValue(),
            endAt: $discountTimeRule->getStartTime()?->getValue(),
        );
    }
}
