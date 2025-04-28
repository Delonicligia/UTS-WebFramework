<?php

namespace Database\Factories;

use App\Models\Konser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Konser>
 */
class KonserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nama_pemesan'=> fake()->name(),
        'email'=> fake()->unique()->safeEmail(),
        'nama_konser'=> fake()->randomElement(['Hindia','Bernadya','Nadin Amizah','Yura Yunita','Sal Priadi','Tulus']),
        'tanggal_konser'=> fake()->date(),
        'jumlah_tiket'=> fake() ->numberBetween(1,500),
        'kategori_tiket'=> fake() ->randomElement(['VIP','Reguler','Festival']),
        'status_pemesanan'=> fake()->randomElement(['Terkonfirmasi','Pending','Dibatalkan']),
        ];
    }
}
