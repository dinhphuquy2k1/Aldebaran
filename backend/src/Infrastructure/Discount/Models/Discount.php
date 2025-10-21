<?php

namespace Src\Infrastructure\Discount\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Infrastructure\DiscountTimeRule\Models\DiscountTimeRule;

class Discount extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function timeRules(): HasMany
    {
        return $this->hasMany(DiscountTimeRule::class);
    }
}
