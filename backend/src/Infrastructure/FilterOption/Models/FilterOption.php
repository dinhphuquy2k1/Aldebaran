<?php

namespace Src\Infrastructure\FilterOption\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FilterOption extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(FilterOption::class, 'parent_id')->orderBy('sort_order');
    }

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(FilterOption::class, 'parent_id');
    }
}
