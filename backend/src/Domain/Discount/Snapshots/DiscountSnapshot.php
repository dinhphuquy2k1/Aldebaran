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
     * @var string
     */
    public string $startAt;

    /**
     * @var string|null
     */
    public ?string $endAt;

    /**
     * @var DiscountTimeRuleSnapshot[]
     */
    public array $discountTimeRules;

    /**
     * @param int $discountId
     * @param string $code
     * @param int $type
     * @param string $startAt
     * @param string|null $endAt
     * @param array $discountTimeRules
     */
    public function __construct(int $discountId, string $code, int $type, string $startAt, ?string $endAt, array $discountTimeRules = [])
    {
        $this->discountId = $discountId;
        $this->code = $code;
        $this->type = $type;
        $this->startAt = $startAt;
        $this->endAt = $endAt;
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
            startAt: $discount->getStartAt()->getValue(),
            endAt: $discount->getEndAt()?->getValue(),
            discountTimeRules: SnapshotMapper::mapFromArray(DiscountTimeRuleSnapshot::class, $discount->getTimeRules()),
        );
    }
}
