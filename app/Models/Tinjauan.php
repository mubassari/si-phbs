<?php

namespace App\Models;

use App\Models\Preferensi;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tinjauan extends Model
{
    use HasFactory;
    protected $table = 'tinjauan';

    protected $fillable = [
        'user_id',
        'preferensi_id',
        'survey_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    /**
     * Get the user that owns the Tinjauan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the survey that owns the Tinjauan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    /**
     * Get the preferensi that owns the Tinjauan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preferensi(): BelongsTo
    {
        return $this->belongsTo(Preferensi::class);
    }

}
