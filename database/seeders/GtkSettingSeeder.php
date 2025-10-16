<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\GtkSetting;
class GtkSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Data Pendidik
            ['key' => 'pendidik_total', 'value' => 85],
            ['key' => 'pendidik_gender', 'value' => json_encode(['labels' => ['Laki-laki', 'Perempuan'], 'data' => [45, 40]])],
            ['key' => 'pendidik_pendidikan', 'value' => json_encode(['labels' => ['S2', 'S1', 'D3/D4'], 'data' => [15, 65, 5]])],
            ['key' => 'pendidik_sertifikasi', 'value' => json_encode(['labels' => ['Sudah Sertifikasi', 'Belum Sertifikasi'], 'data' => [70, 15]])],
            
            // Data Tenaga Kependidikan
            ['key' => 'tendik_total', 'value' => 35],
            ['key' => 'tendik_gender', 'value' => json_encode(['labels' => ['Laki-laki', 'Perempuan'], 'data' => [15, 20]])],
            ['key' => 'tendik_posisi', 'value' => json_encode(['labels' => ['Administrasi', 'Perpustakaan', 'Laboran', 'Kebersihan', 'Keamanan'], 'data' => [12, 4, 8, 7, 4]])],
            
            // Data Siswa
            ['key' => 'siswa_total', 'value' => 1560],
            ['key' => 'siswa_gender', 'value' => json_encode(['labels' => ['Laki-laki', 'Perempuan'], 'data' => [980, 580]])],
            ['key' => 'siswa_per_jurusan', 'value' => json_encode(['labels' => ['TJKT', 'PPLG', 'DKV', 'Busana', 'Ototronika', 'Mekatronika'], 'data' => [324, 290, 250, 210, 260, 230]])],
            ['key' => 'siswa_per_tingkat', 'value' => json_encode(['labels' => ['Kelas X', 'Kelas XI', 'Kelas XII'], 'data' => [540, 520, 500]])],
        ];
        foreach ($settings as $setting) {
            GtkSetting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }
    }
}
