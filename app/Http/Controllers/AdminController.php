<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Kategori;
use App\Models\User;
use App\Support\FrontendData;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Dashboard admin.
     */
    public function index()
    {
        $pendingUsers = User::where('role', 'user')
            ->where('status', 'pending')
            ->latest()
            ->get();

        $approvedUsers = User::where('role', 'user')
            ->where('status', 'approved')
            ->latest()
            ->get();

        $rejectedUsers = User::where('role', 'user')
            ->where('status', 'rejected')
            ->latest()
            ->get();

        $arts = Karya::with(['user', 'kategori'])
            ->latest()
            ->get();

        $artists = User::approved()
            ->withCount('karyas')
            ->with('karyas')
            ->latest()
            ->get();

        return view('admin.index', [
            'pendingUsers' => $pendingUsers,
            'approvedUsers' => $approvedUsers,
            'rejectedUsers' => $rejectedUsers,
            'artsData' => FrontendData::arts($arts),
            'artistsData' => $this->artistData($artists),
            'usersData' => $this->userData(
                $pendingUsers->concat($approvedUsers)->concat($rejectedUsers)
            ),

            // Dipakai Blade untuk membuat tombol filter kategori
            // di halaman Arts. Kalau kategori baru ditambah di
            // database, tombolnya otomatis ikut muncul.
            'categories' => Kategori::all(),
        ]);
    }

    /**
     * Bentuk data artist untuk dashboard.
     *
     * Bedanya dengan FrontendData::artists(): di dashboard,
     * tiap artist juga perlu daftar karya mini-nya (id + gambar).
     *
     * @param  Collection<int, User>  $artists
     * @return Collection<int, array<string, mixed>>
     */
    private function artistData($artists)
    {
        return $artists->map(fn (User $artist) => [
            'id' => $artist->id_user,
            'name' => $artist->name,
            'bio' => $artist->bio ?? 'No bio yet.',
            'photo' => $artist->foto_profil,
            'artworks' => $artist->karyas_count,
            'date' => $artist->created_at?->toIso8601String() ?? '',
            'arts' => $artist->karyas->map(fn (Karya $art) => [
                'id' => $art->id_karya,
                'image' => $art->file_gambar
                    ? Storage::url($art->file_gambar)
                    : '',
            ])->values(),
        ])->values();
    }

    /**
     * Bentuk data user untuk daftar pending di dashboard.
     *
     * @param  Collection<int, User>  $users
     * @return Collection<int, array<string, mixed>>
     */
    private function userData($users)
    {
        return $users->map(fn (User $user) => [
            'id' => $user->id_user,
            'nama' => $user->name,
            'email' => $user->email,

            // ISO 8601 supaya JavaScript bisa memformatnya
            // dengan formatDateTime() (tanggal + jam).
            'tanggal' => $user->created_at?->toIso8601String() ?? '',
            'status' => $user->status,
        ])->values();
    }

    /**
     * Menyetujui user.
     */
    public function approve(Request $request, $id)
    {
        $user = User::where('role', 'user')
            ->findOrFail($id);

        $user->update([
            'status' => 'approved',
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Akun berhasil disetujui.',
            ]);
        }

        return back()->with(
            'success',
            'Akun berhasil disetujui.'
        );
    }

    /**
     * Menolak user.
     */
    public function reject(Request $request, $id)
    {
        $user = User::where('role', 'user')
            ->findOrFail($id);

        $user->update([
            'status' => 'rejected',
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Akun berhasil ditolak.',
            ]);
        }

        return back()->with(
            'success',
            'Akun berhasil ditolak.'
        );
    }

    /**
     * Menghapus user.
     */
    public function destroyUser(Request $request, $id)
    {
        $user = User::where('role', 'user')
            ->findOrFail($id);

        // Hapus karya milik user ini lebih dulu (ada foreign key).
        foreach ($user->karyas as $art) {
            if ($art->file_gambar) {
                Storage::disk('public')->delete($art->file_gambar);
            }

            $art->delete();
        }

        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Akun berhasil dihapus.',
            ]);
        }

        return back()->with(
            'success',
            'Akun berhasil dihapus.'
        );
    }
}
