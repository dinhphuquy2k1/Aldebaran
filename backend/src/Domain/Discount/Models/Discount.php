<?php

namespace Src\Domain\Discount\Models;


use Src\Domain\DiscountTimeRule\Models\DiscountTimeRule;
use Src\Domain\Shared\Models\Date;

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
     * @var string|null
     */
    private ?string $description;

    /**
     * @var Date
     */
    private Date $startAt;

    /**
     * @var Date|null
     */
    private ?Date $endAt;

    /**
     * @var int
     */
    private int $discountValue;

    /**
     * @var int
     */
    private int $usageLimitTotal;

    /**
     * @var int
     */
    private int $usageLimitPerUser;

    /**
     * @var int|null
     */
    private ?int $combinableCount;

    /**
     * @var DiscountTimeRule[]
     */
    private array $timeRules;

    /**
     * @param DiscountId|null $discountId
     * @param DiscountCode $code
     * @param DiscountType $discountType
     * @param string|null $description
     * @param Date $startAt
     * @param Date|null $endAt
     * @param int $discountValue
     * @param int $usageLimitTotal
     * @param int $usageLimitPerUser
     * @param int|null $combinableCount
     * @param DiscountTimeRule[] $timeRules
     */
    public function __construct(?DiscountId $discountId, DiscountCode $code, DiscountType $discountType, ?string $description, Date $startAt, ?Date $endAt, int $discountValue, int $usageLimitTotal, int $usageLimitPerUser, ?int $combinableCount = null, array $timeRules = [])
    {
        $this->discountId = $discountId;
        $this->code = $code;
        $this->discountType = $discountType;
        $this->description = $description;
        $this->startAt = $startAt;
        $this->endAt = $endAt;
        $this->discountValue = $discountValue;
        $this->usageLimitTotal = $usageLimitTotal;
        $this->usageLimitPerUser = $usageLimitPerUser;
        $this->combinableCount = $combinableCount;
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
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
     * @return int
     */
    public function getDiscountValue(): int
    {
        return $this->discountValue;
    }

    /**
     * @return int
     */
    public function getUsageLimitTotal(): int
    {
        return $this->usageLimitTotal;
    }

    /**
     * @return int
     */
    public function getUsageLimitPerUser(): int
    {
        return $this->usageLimitPerUser;
    }

    /**
     * @return int|null
     */
    public function getCombinableCount(): ?int
    {
        return $this->combinableCount;
    }

    /**
     * @return DiscountTimeRule[]
     */
    public function getTimeRules(): array
    {
        return $this->timeRules;
    }
}
