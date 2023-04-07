<?php

namespace App\Models;


use App\Models\Preferensi;
use App\Models\Survey;
use App\Models\Tinjauan;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'telpon',
        'alamat',
        'foto_ktp',
        'is_admin',
        'status_verifikasi',
        'status_partisipasi',
        'status_draft',
        'catatan_admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The survei that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function survei(): BelongsToMany
    {
        return $this->belongsToMany(Survei::class, 'tinjauan');
    }

    /**
     * Get all of the tinjauan for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tinjauan(): HasMany
    {
        return $this->hasMany(Tinjauan::class);
    }

    public function getPathFotoKtpAttribute()
    {
        return asset('img/foto-ktp/' . $this->foto_ktp);
    }
    public function getIconStatusPartisipasiAttribute()
    {
        $icon = $this->status_partisipasi
                    ? $this->status_draft
                        ? 'fa-hourglass-half'
                        : 'fa-check'
                    : 'fa-exclamation-circle';
        return "<i class='icon-copy fa $icon'></i>";
    }
    public function getIconStatusDraftAttribute($value)
    {
        $icon = $this->status_draft ? 'fa-exclamation-circle' : 'fa-check';
        return "<i class='icon-copy fa $icon'></i>";
    }
}
