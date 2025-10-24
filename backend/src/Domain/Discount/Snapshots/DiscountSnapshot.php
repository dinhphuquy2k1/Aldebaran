<?php

namespace Src\Domain\Discount\Snapshots;

use Src\Domain\Discount\Models\Discount;
use Src\Domain\DiscountTimeRule\Snapshots\DiscountTimeRuleSnapshot;
use Src\Domain\Shared\Services\SnapshotMapper;

class DiscountSnapshot
{
    /**
     * @var int
     */
    public int $discountId;

    /**
     * @var string
     */
    public string $code;

    /**
     * @var int
     */
    public int $type;

    /**
     * @var string|null
     */
    public ?string $description;

    /**
     * @var string
     */
    public string $startAt;

    /**
     * @var string|null
     */
    public ?string $endAt;

    /**
     * @var int
     */
    public int $discountValue;

    /**
     * @var int
     */
    public int $usageLimitTotal;

    /**
     * @var int
     */
    public int $usageLimitPerUser;

    /**
     * @var int|null
     */
    public ?int $combinableCount;

    /**
     * @var DiscountTimeRuleSnapshot[]
     */
    public array $discountTimeRules;

    /**
     * @param int $discountId
     * @param string $code
     * @param int $type
     * @param string|null $description
     * @param string $startAt
     * @param string|null $endAt
     * @param int $discountValue
     * @param int $usageLimitTotal
     * @param int $usageLimitPerUser
     * @param int|null $combinableCount
     * @param array $discountTimeRules
     */
    public function __construct(int $discountId, string $code, int $type, ?string $description, string $startAt, ?string $endAt, int $discountValue, int $usageLimitTotal, int $usageLimitPerUser, ?int $combinableCount = null, array $discountTimeRules = [])
    {
        $this->discountId = $discountId;
        $this->code = $code;
        $this->type = $type;
        $this->description = $description;
        $this->startAt = $startAt;
        $this->endAt = $endAt;
        $this->discountValue = $discountValue;
        $this->usageLimitTotal = $usageLimitTotal;
        $this->usageLimitPerUser = $usageLimitPerUser;
        $this->combinableCount = $combinableCount;
        $this->discountTimeRules = $discountTimeRules;
    }

    /**
     * @param Discount $discount
     * @return self
     */
    public static function fromArray(Discount $discount): self
    {
        return new self(
            discountId: $discount->getDiscountId()->getValue(),
            code: $discount->getCode()->getValue(),
            type: $discount->getDiscountType()->getTypeId(),
            description: $discount->getDescription(),
            startAt: $discount->getStartAt()->getValue(),
            endAt: $discount->getEndAt()?->getValue(),
            discountValue: $discount->getDiscountValue(),
            usageLimitTotal: $discount->getUsageLimitTotal(),
            usageLimitPerUser: $discount->getUsageLimitPerUser(),
            combinableCount: $discount->getCombinableCount(),
            discountTimeRules: SnapshotMapper::mapFromArray(DiscountTimeRuleSnapshot::class, $discount->getTimeRules()),
        );
    }
}
