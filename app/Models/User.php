<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'bio',
        'profile_photo',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function karyas()
    {
        return $this->hasMany(Karya::class, 'id_user', 'id_user');
    }

    /**
     * Hanya artist yang SUDAH DISETUJUI admin.
     *
     * Dipakai di semua halaman publik (daftar artist, beranda,
     * direktori, dll). Tanpa scope ini, akun yang masih
     * `pending` atau `rejected` ikut tampil di halaman publik
     * padahal belum resmi jadi artist.
     *
     * Cara pakai:
     *     User::approved()->withCount('karyas')->get();
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query
            ->where('role', 'user')
            ->where('status', 'approved');
    }

    /**
     * URL foto profil untuk dipakai di seluruh view.
     */
    public function getFotoProfilAttribute(): ?string
    {
        if (! $this->profile_photo) {
            return null;
        }

        return Storage::url($this->profile_photo);
    }
}
