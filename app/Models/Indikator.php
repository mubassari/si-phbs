<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Indikator extends Model
{
    use HasFactory;
    protected $table = 'indikator';

    protected $fillable = [
        'judul',
        'isi',
        'slug',
        'foto',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function getPathFotoAttribute()
    {
        return asset('img/foto-indikator/' . $this->foto);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->slug = $post->generateSlug($post->judul);
            $post->save();
        });
    }
    private function generateSlug($judul)
    {
        if (static::whereSlug($slug = Str::slug($judul))->exists()) {
            $max = static::whereJudul($judul)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
