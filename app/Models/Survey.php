<?php

namespace App\Models;

use App\Models\Preferensi;
use App\Models\Tinjauan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'survey';

    protected $fillable = [
        'pertanyaan',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    /**
     * Get all of the preferensi for the Survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preferensi(): HasMany
    {
        return $this->hasMany(Preferensi::class);
    }

    /**
    * Get all of the tinjauan for the Survey
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function tinjauan(): HasMany
    {
        return $this->hasMany(Tinjauan::class);
    }
}
