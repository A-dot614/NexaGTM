<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Playbook;

class NexagtmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $playbooks = [
            [
                'name' => 'PaveTalent — Autonomous Sourcing Engine',
                'template_url' => 'https://docs.google.com/document/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'status' => 'published',
            ],
            [
                'name' => 'Impact11 — Scaled Outbound Pipeline',
                'template_url' => 'https://docs.google.com/document/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'status' => 'published',
            ],
            [
                'name' => 'Funding & Hiring Signal Pipeline',
                'template_url' => 'https://docs.google.com/document/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'status' => 'published',
            ],
            [
                'name' => 'Multi-Provider Waterfall Engine',
                'template_url' => 'https://docs.google.com/document/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'status' => 'published',
            ],
        ];

        foreach ($playbooks as $pb) {
            Playbook::firstOrCreate(['name' => $pb['name']], $pb);
        }
    }
}
