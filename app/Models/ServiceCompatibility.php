<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceCompatibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'compatible_id'
    ];

    /**
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return BelongsTo
     */
    public function reverseService(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'compatible_id', 'id');
    }
}
