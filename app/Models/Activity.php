<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'code',
        'title',
        'description',
        'location',
        'start_at',
        'end_at',
        'capacity',
        'status',
        'poster_path',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function scopeSearch(Builder $query, ?string $keyword): Builder
    {
        return $query->when($keyword, function (Builder $query) use ($keyword) {
            $query->where(function (Builder $query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('code', 'like', "%{$keyword}%");
            });
        });
    }
}
