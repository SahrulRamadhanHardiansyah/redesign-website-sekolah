<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Data\BeritaData;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Parse Indonesian date format to Carbon date.
     */
    private function parseIndonesianDate(string $dateString): string
    {
        $indonesianMonths = [
            'Januari' => '01',
            'Februari' => '02',
            'Maret' => '03',
            'April' => '04',
            'Mei' => '05',
            'Juni' => '06',
            'Juli' => '07',
            'Agustus' => '08',
            'September' => '09',
            'Oktober' => '10',
            'November' => '11',
            'Desember' => '12',
        ];

        // Example: "8 Oktober 2025" -> "2025-10-08"
        $parts = explode(' ', $dateString);
        if (count($parts) >= 3) {
            $day = str_pad($parts[0], 2, '0', STR_PAD_LEFT);
            $month = $indonesianMonths[$parts[1]] ?? '01';
            $year = $parts[2];
            return "{$year}-{$month}-{$day}";
        }

        return now()->format('Y-m-d'); // Fallback
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beritaData = BeritaData::getAll();

        foreach ($beritaData as $data) {
            // Convert array to object if needed
            $item = is_array($data) ? (object) $data : $data;

            Berita::create([
                'judul' => $item->judul,
                'slug' => Str::slug($item->judul) . '-' . uniqid(), // Ensure unique slug
                'isi' => is_array($item->konten) ? implode("\n\n", $item->konten) : $item->konten,
                'gambar' => $item->gambar ?? null,
                'penulis' => $item->penulis ?? 'Admin',
                'tanggal' => $item->tanggal ? $this->parseIndonesianDate($item->tanggal) : now(),
                'status' => 'publish', // Set all imported data as published
            ]);
        }
    }
}
