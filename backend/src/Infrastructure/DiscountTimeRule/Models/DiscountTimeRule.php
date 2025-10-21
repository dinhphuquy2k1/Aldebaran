<?php

namespace Src\Infrastructure\DiscountTimeRule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Infrastructure\Discount\Models\Discount;

class DiscountTimeRule extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
