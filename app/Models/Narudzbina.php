<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Narudzbina extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kupac_id',
        'ukupan_iznos',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'kupac_id' => 'integer',
            'ukupan_iznos' => 'decimal:2',
        ];
    }

    public function kupac(): BelongsTo
    {
        return $this->belongsTo(Kupac::class);
    }



}
