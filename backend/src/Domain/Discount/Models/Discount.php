<?php

namespace Src\Domain\Discount\Models;


use Src\Domain\DiscountTimeRule\Models\DiscountTimeRule;
use Src\Domain\DiscountTimeRule\Snapshots\DiscountTimeRuleSnapshot;
use Src\Domain\Shared\Models\Date;
use Src\Domain\Shared\Services\SnapshotMapper;

final class Discount
{
    /**
     * @var DiscountId|null
     */
    private ?DiscountId $discountId;

    /**
     * @var DiscountCode
     */
    private DiscountCode $code;

    /**
     * @var DiscountType
     */
    private DiscountType $discountType;

    /**
     * @var Date
     */
    private Date $startAt;

    /**
     * @var Date|null
     */
    private ?Date $endAt;

    /**
     * @var DiscountTimeRule[]
     */
    private array $timeRules;

    /**
     * @param DiscountId|null $discountId
     * @param DiscountCode $code
     * @param DiscountType $discountType
     * @param Date $startAt
     * @param Date|null $endAt
     * @param DiscountTimeRule[] $timeRules
     */
    public function __construct(?DiscountId $discountId, DiscountCode $code, DiscountType $discountType, Date $startAt, ?Date $endAt, array $timeRules = [])
    {
        $this->discountId = $discountId;
        $this->code = $code;
        $this->discountType = $discountType;
        $this->startAt = $startAt;
        $this->endAt = $endAt;
        $this->timeRules = $timeRules;
    }

    /**
     * @return DiscountId|null
     */
    public function getDiscountId(): ?DiscountId
    {
        return $this->discountId;
    }

    /**
     * @return DiscountCode
     */
    public function getCode(): DiscountCode
    {
        return $this->code;
    }

    /**
     * @return DiscountType
     */
    public function getDiscountType(): DiscountType
    {
        return $this->discountType;
    }

    /**
     * @return Date
     */
    public function getStartAt(): Date
    {
        return $this->startAt;
    }

    /**
     * @return Date|null
     */
    public function getEndAt(): ?Date
    {
        return $this->endAt;
    }

    /**
     * @return DiscountTimeRule[]
     */
    public function getTimeRules(): array
    {
        return $this->timeRules;
    }
}
