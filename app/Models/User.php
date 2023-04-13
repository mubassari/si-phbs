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
    public function survey(): BelongsToMany
    {
        return $this->belongsToMany(Survey::class, 'tinjauan');
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
        $icon = $this->status_partisipasi ? ($this->status_draf ? 'fa-hourglass-half' : 'fa-check') : 'fa-exclamation-circle ';
        return "<i class='icon-copy fa $icon'></i>";
    }

    public function getIconStatusDraftAttribute($value)
    {
        $icon = $this->status_draft ? 'fa-exclamation-circle' : 'fa-check';
        return "<i class='icon-copy fa $icon'></i>";
    }

    public function getHasilSurveyAttribute()
    {
        $total_nilai = Preferensi::find($this->tinjauan->pluck('preferensi_id'))->pluck('nilai')->sum();
        if ($this->status_partisipasi) {
            $result = $total_nilai / \App\Models\Survey::count();
            if ($result >= 85) {
                $text = 'Penerapan PHBS anda sangat Baik';
            } elseif ($result > 70 && $result < 85) {
                $text = 'Penerapan PHBS anda Normal';
            } else {
                $text = 'Penerapan PHBS anda Perlu ditingkatkan';
            }
            return ['nilai' => number_format($result, 2), 'keterangan' => $text];
        }
    }
}
