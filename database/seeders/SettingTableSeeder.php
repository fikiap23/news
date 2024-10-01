<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logoUrl = '/assets/image/logo_dpmtsp.png';
        $favicon = '/assets/image/logo_dpmtsp.png';

        Setting::create(['key' => 'application_name', 'value' => 'PTSP']);
        Setting::create(['key' => 'contact_no', 'value' => '0821-1617-1515']);
        Setting::create(['key' => 'email', 'value' => 'dpmptsp@sumedangkab.go.id']);
        Setting::create(['key' => 'copy_right_text', 'value' => 'Copyrights © 2018 - 2024 DPMPTSP Kabupaten Sumedang']);
        Setting::create(['key' => 'site_key', 'value' => '1234567890ABCDEF']); // Example site key
        Setting::create(['key' => 'secret_key', 'value' => 'FEDCBA0987654321']); // Example secret key
        Setting::create(['key' => 'show_captcha', 'value' => 0]);
        Setting::create(['key' => 'facebook_url', 'value' => 'https://www.facebook.com']);
        Setting::create(['key' => 'twitter_url', 'value' => 'https://twitter.com']);
        Setting::create(['key' => 'instagram_url', 'value' => 'https://www.instagram.com']);
        Setting::create(['key' => 'pinterest_url', 'value' => 'https://www.pinterest.com']);
        Setting::create(['key' => 'linkedin_url', 'value' => 'https://www.linkedin.com']);
        Setting::create(['key' => 'vk_url', 'value' => 'https://vk.com']);
        Setting::create(['key' => 'telegram_url', 'value' => 'https://www.telegram.org/k/']);
        Setting::create(['key' => 'youtube_url', 'value' => 'https://www.youtube.com/']);
        Setting::create(['key' => 'show_cookie', 'value' => 1]);
        Setting::create(['key' => 'cookie_warning', 'value' => 'Pengalaman Anda di situs ini akan ditingkatkan dengan mengizinkan cookie.']);
        Setting::create(['key' => 'logo', 'value' => $logoUrl]);
        Setting::create(['key' => 'favicon', 'value' => $favicon]);
        Setting::create(['key' => 'contact_address', 'value' => 'Jalan Prabu Geusan Ulun No. 36 Sumedang']);
        Setting::create(['key' => 'about_text', 'value' => "Website DPMPTSP. Portal Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Sumedang."]);
        Setting::create(['key' => 'terms&conditions', 'value' => 'Syarat dan ketentuan layanan diatur sesuai dengan peraturan yang berlaku.']); // Example terms & conditions
        Setting::create(['key' => 'privacy', 'value' => 'Kami menghormati privasi Anda dan berkomitmen untuk melindungi informasi pribadi Anda.']); // Example privacy policy
        Setting::create(['key' => 'support', 'value' => 'Hubungi kami melalui email atau nomor kontak jika membutuhkan bantuan.']); // Example support info
        Setting::create(['key' => 'comment_approved', 'value' => '1']);
        Setting::create(['key' => 'front_language', 'value' => '1']); // Example language setting
    }
}
