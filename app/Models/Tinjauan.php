<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongTo;

class Tinjauan extends Model
{
    use HasFactory;
    protected $table = 'tinjauan';

    protected $fillable = [
        'user_id',
        'preferensi_id',
        'survei_id'
    ];

    protected $guarded = [];

    /**
     * Get the user that owns the Tinjauan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
