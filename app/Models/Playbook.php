<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'template_url',
        'video_url',
        'status',
    ];

    /**
     * Parse and return video embed metadata for rendering on pages.
     */
    public function getVideoEmbedAttribute(): ?array
    {
        if (empty($this->video_url)) {
            return null;
        }

        $url = trim($this->video_url);

        // Uploaded or direct video files
        $isStorage = str_contains($url, '/storage/');
        $path = strtolower(parse_url($url, PHP_URL_PATH) ?? '');
        $hasVideoExt = str_ends_with($path, '.mp4')
            || str_ends_with($path, '.webm')
            || str_ends_with($path, '.mov')
            || str_ends_with($path, '.ogg')
            || str_ends_with($path, '.m4v');

        if ($isStorage || $hasVideoExt) {
            return [
                'type' => 'html5',
                'src' => $url,
                'platform' => $isStorage ? 'Uploaded Video' : 'Direct Video File',
                'raw_url' => $url,
            ];
        }

        // YouTube
        if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|shorts\/|watch\?(?:.*&)?v=))([a-zA-Z0-9_-]{11})/i', $url, $matches)) {
            return [
                'type' => 'iframe',
                'src' => "https://www.youtube-nocookie.com/embed/{$matches[1]}?rel=0",
                'platform' => 'YouTube',
                'raw_url' => $url,
            ];
        }

        // Loom
        if (preg_match('/loom\.com\/(?:share|embed)\/([a-zA-Z0-9]+)/i', $url, $matches)) {
            return [
                'type' => 'iframe',
                'src' => "https://www.loom.com/embed/{$matches[1]}",
                'platform' => 'Loom',
                'raw_url' => $url,
            ];
        }

        // Vimeo
        if (preg_match('/(?:vimeo\.com\/|player\.vimeo\.com\/video\/)(\d+)/i', $url, $matches)) {
            return [
                'type' => 'iframe',
                'src' => "https://player.vimeo.com/video/{$matches[1]}",
                'platform' => 'Vimeo',
                'raw_url' => $url,
            ];
        }

        // Google Drive
        if (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)/i', $url, $matches)) {
            return [
                'type' => 'iframe',
                'src' => "https://drive.google.com/file/d/{$matches[1]}/preview",
                'platform' => 'Google Drive',
                'raw_url' => $url,
            ];
        }

        // Fallback: Attempt HTML5 video tag, with external link button
        return [
            'type' => 'html5',
            'src' => $url,
            'platform' => 'External Video',
            'raw_url' => $url,
        ];
    }
}