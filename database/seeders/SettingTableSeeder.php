<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan'=> 'tokoku',
            'alamat' => 'jl. H baping no 1',
            'telepon' => '021988233',
            'tipe_nota' => 1,
            'diskon' => 5,
            'path_logo' => '/image/logo_tokoku.svg',
            'path_kartu_member' => '/image/member.png',
        ]);
    }
}
