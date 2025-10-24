<?php

namespace Src\Domain\DiscountChannel\Models;


use Src\Domain\Discount\Models\DiscountCode;
use Src\Domain\Discount\Models\DiscountId;
use Src\Domain\Discount\Models\DiscountType;
use Src\Domain\DiscountTimeRule\Models\DiscountTimeRule;
use Src\Domain\Shared\Models\Date;

final class
DiscountChannel
{
    /**
     * @var DiscountChannelId|null
     */
    private ?DiscountChannelId $discountChannelId;
}
