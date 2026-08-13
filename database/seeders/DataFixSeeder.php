<?php

namespace Database\Seeders;

use App\Models\PetiKemas;
use App\Models\Trip;
use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DataFixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->fixPetiKemas();
        $this->fixTrips();
        $this->fixDokumens();
        $this->fixUsers();
    }

    protected function fixPetiKemas(): void
    {
        $count = 0;
        foreach (PetiKemas::all() as $pk) {
            $changed = false;

            // Normalize ukuran
            $u = Str::lower((string) $pk->ukuran);
            if (str_contains($u, '20')) {
                $normalized = '20 Feet';
            } elseif (str_contains($u, '40')) {
                $normalized = '40 Feet';
            } else {
                $normalized = Str::title($u);
            }

            if ($pk->ukuran !== $normalized) {
                $pk->ukuran = $normalized;
                $changed = true;
            }

            // Normalize status
            $status = Str::lower((string) $pk->status);
            $map = [
                'masuk' => 'Masuk',
                'keluar' => 'Keluar',
                'proses' => 'Proses',
                'selesai' => 'Selesai',
                'bermasalah' => 'Bermasalah',
            ];

            if (isset($map[$status]) && $pk->status !== $map[$status]) {
                $pk->status = $map[$status];
                $changed = true;
            }

            if ($changed) {
                $pk->save();
                $count++;
            }
        }

        $this->command->info("PetiKemas normalized: {$count}");
    }

    protected function fixTrips(): void
    {
        $count = 0;
        foreach (Trip::all() as $trip) {
            $changed = false;

            // Normalize tanggal_trip to Y-m-d if possible
            if ($trip->tanggal_trip && ! $trip->tanggal_trip instanceof Carbon) {
                try {
                    $dt = Carbon::parse($trip->tanggal_trip);
                    $trip->tanggal_trip = $dt->toDateString();
                    $changed = true;
                } catch (\Exception $e) {
                    // leave it
                }
            }

            // Normalize status_perjalanan
            $s = Str::lower((string) $trip->status_perjalanan);
            $map = [
                'pending' => 'Pending',
                'dalam perjalanan' => 'Dalam Perjalanan',
                'selesai' => 'Selesai',
                'bermasalah' => 'Bermasalah',
            ];

            foreach ($map as $k => $v) {
                if (str_contains($s, $k) && $trip->status_perjalanan !== $v) {
                    $trip->status_perjalanan = $v;
                    $changed = true;
                    break;
                }
            }

            if ($changed) {
                $trip->save();
                $count++;
            }
        }

        $this->command->info("Trips normalized: {$count}");
    }

    protected function fixDokumens(): void
    {
        $count = 0;
        foreach (Dokumen::all() as $dok) {
            $changed = false;

            // Normalize jenis_dokumen casing
            if ($dok->jenis_dokumen) {
                $normalized = Str::title($dok->jenis_dokumen);
                if ($dok->jenis_dokumen !== $normalized) {
                    $dok->jenis_dokumen = $normalized;
                    $changed = true;
                }
            }

            // Normalize status_verifikasi
            $s = Str::lower((string) $dok->status_verifikasi);
            if (str_contains($s, 'menunggu') && $dok->status_verifikasi !== 'Menunggu Verifikasi') {
                $dok->status_verifikasi = 'Menunggu Verifikasi';
                $changed = true;
            }
            if (str_contains($s, 'disetujui') && $dok->status_verifikasi !== 'Disetujui') {
                $dok->status_verifikasi = 'Disetujui';
                $changed = true;
            }
            if ((str_contains($s, 'tolak') || str_contains($s, 'ditolak')) && $dok->status_verifikasi !== 'Ditolak') {
                $dok->status_verifikasi = 'Ditolak';
                $changed = true;
            }

            if ($changed) {
                $dok->save();
                $count++;
            }
        }

        $this->command->info("Dokumens normalized: {$count}");
    }

    protected function fixUsers(): void
    {
        $count = 0;
        foreach (User::all() as $user) {
            $changed = false;

            // Normalize role
            if ($user->role) {
                $role = Str::lower($user->role);
                if (! in_array($role, ['admin', 'operasional', 'pimpinan'])) {
                    // attempt to map common terms
                    if (str_contains($role, 'admin')) $role = 'admin';
                    if (str_contains($role, 'operasional') || str_contains($role, 'operator')) $role = 'operasional';
                    if (str_contains($role, 'pimpinan') || str_contains($role, 'boss')) $role = 'pimpinan';
                }

                if ($user->role !== $role) {
                    $user->role = $role;
                    $changed = true;
                }
            }

            // Ensure password is hashed (basic heuristic: length >= 60)
            if ($user->password && strlen($user->password) < 60) {
                $user->password = bcrypt($user->password);
                $changed = true;
            }

            if ($changed) {
                $user->save();
                $count++;
            }
        }

        $this->command->info("Users normalized: {$count}");
    }
}
