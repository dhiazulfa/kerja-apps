<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Education;
use App\Models\Region;
use App\Models\Subregion;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@kerja.id',
            'phone_number' => '085877070612',
            'is_admin' => 1,
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt('test123')
          ]);

        Education::create([
          'name' => 'SMK',
          'slug' => 'sekolah-menengah-kejuruan',
        ]);

        Education::create([
            'name' => 'SMA',
            'slug' => 'sekolah-menengah-atas',
          ]);

        Education::create([
            'name' => 'SMP',
            'slug' => 'sekolah-menengah-pertama',
        ]);

        Education::create([
            'name' => 'Peguruan Tinggi',
            'slug' => 'perguruan-tinggi',
        ]);

        Region::create([
            'nama_provinsi' => 'Daerah Istimewa Yogyakarta',
        ]);

        Subregion::create([
          'nama_kabupaten' => 'Sleman',
        ]);
        
        Subregion::create([
          'nama_kabupaten' => 'Bantul',
        ]);
        
        Subregion::create([
          'nama_kabupaten' => 'Kota Yogyakarta',
        ]);
    }
}
