<?php

namespace Src\Domain\DiscountTimeRule\Models;


use Src\Domain\Discount\Models\DiscountId;
use Src\Domain\Shared\Models\Day;
use Src\Domain\Shared\Models\Time;

final class DiscountTimeRule
{
    /**
     * @var DiscountTimeRuleId|null
     */
    private ?DiscountTimeRuleId $discountTimeRuleId;

    /**
     * @var DiscountId
     */
    private DiscountId $discountId;

    /**
     * @var Day
     */
    private Day $dayOfWeek;

    /**
     * @var Time|null
     */
    private ?Time $startTime;

    /**
     * @var Time|null
     */
    private ?Time $endTime;

    /**
     * @var bool
     */
    private bool $allDay;

    /**
     * @param DiscountTimeRuleId|null $discountTimeRuleId
     * @param DiscountId $discountId
     * @param Day $dayOfWeek
     * @param Time|null $startTime
     * @param Time|null $endTime
     * @param bool $allDay
     */
    public function __construct(?DiscountTimeRuleId $discountTimeRuleId, DiscountId $discountId, Day $dayOfWeek, ?Time $startTime, ?Time $endTime, bool $allDay)
    {
        $this->discountTimeRuleId = $discountTimeRuleId;
        $this->discountId = $discountId;
        $this->dayOfWeek = $dayOfWeek;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->allDay = $allDay;
    }

    /**
     * @return DiscountTimeRuleId|null
     */
    public function getDiscountTimeRuleId(): ?DiscountTimeRuleId
    {
        return $this->discountTimeRuleId;
    }

    /**
     * @return DiscountId
     */
    public function getDiscountId(): DiscountId
    {
        return $this->discountId;
    }

    /**
     * @return Day
     */
    public function getDayOfWeek(): Day
    {
        return $this->dayOfWeek;
    }

    /**
     * @return Time|null
     */
    public function getStartTime(): ?Time
    {
        return $this->startTime;
    }

    /**
     * @return Time|null
     */
    public function getEndTime(): ?Time
    {
        return $this->endTime;
    }

    /**
     * @return bool
     */
    public function isAllDay(): bool
    {
        return $this->allDay;
    }
}
