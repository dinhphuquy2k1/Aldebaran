<?php

namespace Src\Infrastructure\Discount\Models;

use Database\Factories\DiscountFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Infrastructure\DiscountCombination\Models\DiscountCombination;
use Src\Infrastructure\DiscountTimeRule\Models\DiscountTimeRule;

class Discount extends Model
{
    use HasFactory;

    /**
     * @return DiscountFactory
     */
    protected static function newFactory(): DiscountFactory
    {
        return DiscountFactory::new();
    }

    /**
     * @return HasMany
     */
    public function timeRules(): HasMany
    {
        return $this->hasMany(DiscountTimeRule::class);
    }

    /**
     * @return HasMany
     */
    public function combinations(): HasMany
    {
        return $this->hasMany(DiscountCombination::class, 'discount_id');
    }
}
