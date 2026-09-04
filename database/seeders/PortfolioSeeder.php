<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Settings (hanya 1 baris)
        Setting::updateOrCreate(['id' => 1], [
            'site_name' => 'Portfolio Saya',
            'owner_name' => 'Nama Kamu',
            'bio' => 'Web Developer yang suka membangun produk digital.',
            'about' => 'Tuliskan cerita singkat tentang dirimu di sini.',
            'email' => 'kamu@email.com',
            'whatsapp' => '628123456789',
            'theme_color' => '#0f172a',
            'seo_title' => 'Portfolio Saya - Web Developer',
            'seo_description' => 'Website portfolio pribadi menampilkan project, skill, dan pengalaman.',
        ]);

        // Projects
        Project::updateOrCreate(['slug' => 'contoh-project'], [
            'title' => 'Contoh Project',
            'description' => 'Deskripsi singkat project pertama.',
            'github_link' => 'https://github.com/username/contoh-project',
            'demo_link' => 'https://contoh-project.test',
            'status' => 'published',
            'order' => 1,
        ]);

        // Skills
        $skills = [
            ['name' => 'Laravel', 'percentage' => 85, 'order' => 1],
            ['name' => 'Tailwind CSS', 'percentage' => 80, 'order' => 2],
            ['name' => 'JavaScript', 'percentage' => 75, 'order' => 3],
        ];
        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // Experience
        Experience::updateOrCreate(['position' => 'Web Developer', 'company' => 'Contoh Perusahaan'], [
            'start_date' => '2024-01-01',
            'is_current' => true,
            'description' => 'Mengembangkan dan memelihara aplikasi web.',
            'order' => 1,
        ]);

        // Education
        Education::updateOrCreate(['institution' => 'Contoh Universitas'], [
            'degree' => 'S1',
            'field' => 'Informatika',
            'start_date' => '2020-08-01',
            'end_date' => '2024-06-01',
            'order' => 1,
        ]);

        // Services
        Service::updateOrCreate(['title' => 'Web Development'], [
            'description' => 'Membangun website custom sesuai kebutuhan.',
            'order' => 1,
        ]);

        // Social links
        $socials = [
            ['platform' => 'GitHub', 'url' => 'https://github.com/username', 'order' => 1],
            ['platform' => 'LinkedIn', 'url' => 'https://linkedin.com/in/username', 'order' => 2],
        ];
        foreach ($socials as $social) {
            SocialLink::updateOrCreate(['platform' => $social['platform']], $social);
        }
    }
}
