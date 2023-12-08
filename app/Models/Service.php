<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'is_enabled',
    ];

    protected $appends = [
        'has_application',
        'all_compatibilities'
    ];

    /**
     * @return bool
     */
    public function getHasApplicationAttribute(): bool
    {
        return (bool) $this->application;
    }

    /**
     * @return array
     */
    public function getAllCompatibilitiesAttribute(): array
    {
        $compatibilities = $this->compatibilities()->pluck('compatible_id')->toArray();
        $reverseCompatibilities = $this->reverseCompatibilities()->pluck('service_id')->toArray();

        return array_merge($compatibilities, $reverseCompatibilities);
    }

    /**
     * @return HasMany
     */
    public function compatibilities(): HasMany
    {
        return $this->hasMany(ServiceCompatibility::class);
    }

    /**
     * @return HasMany
     */
    public function reverseCompatibilities(): HasMany
    {
        return $this->hasMany(ServiceCompatibility::class, 'compatible_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function application(): HasOne
    {
        return $this->hasOne(Application::class);
    }
}
