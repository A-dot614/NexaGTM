<?php

namespace Tests\Feature;

use App\Models\Playbook;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PlaybookTest extends TestCase
{
    use RefreshDatabase;

    public function test_playbook_can_be_created_with_video_upload(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/dashboard/playbooks', [
            'name' => 'Cold Email Playbook',
            'template_url' => 'https://docs.google.com/template',
            'video' => UploadedFile::fake()->create('walkthrough.mp4', 2048, 'video/mp4'),
        ]);

        $response->assertRedirect('/dashboard/playbooks');

        $playbook = Playbook::firstOrFail();
        $this->assertSame('Cold Email Playbook', $playbook->name);
        $this->assertNotNull($playbook->video_url);
        $this->assertStringContainsString('/storage/playbooks/videos/', $playbook->video_url);

        Storage::disk('public')->assertExists(
            str_replace('/storage/', '', parse_url($playbook->video_url, PHP_URL_PATH))
        );
    }

    public function test_playbook_can_be_created_without_video(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/dashboard/playbooks', [
            'name' => 'No Video Playbook',
            'template_url' => 'https://docs.google.com/template',
        ]);

        $response->assertRedirect('/dashboard/playbooks');
        $this->assertNull(Playbook::firstOrFail()->video_url);
    }

    public function test_playbook_rejects_non_video_upload(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->from('/dashboard/playbooks/create')->post('/dashboard/playbooks', [
            'name' => 'Bad Upload',
            'template_url' => 'https://docs.google.com/template',
            'video' => UploadedFile::fake()->create('notes.txt', 10, 'text/plain'),
        ]);

        $response->assertSessionHasErrors('video');
        $this->assertDatabaseCount('playbooks', 0);
    }

    public function test_playbook_store_returns_json_for_ajax_requests(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/dashboard/playbooks', [
            'name' => 'Ajax Playbook',
            'template_url' => 'https://docs.google.com/template',
            'video' => UploadedFile::fake()->create('walkthrough.webm', 1024, 'video/webm'),
        ]);

        $response->assertOk()
            ->assertJsonStructure(['message', 'redirect']);
        $this->assertDatabaseCount('playbooks', 1);
    }

    public function test_playbook_update_replaces_video_and_frees_old_file(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $playbook = Playbook::create([
            'name' => 'Existing',
            'template_url' => 'https://docs.google.com/template',
            'video_url' => Storage::disk('public')->url('playbooks/videos/old.mp4'),
        ]);

        Storage::disk('public')->put('playbooks/videos/old.mp4', 'fake');

        $response = $this->actingAs($user)->patchJson('/dashboard/playbooks/' . $playbook->id, [
            'name' => 'Existing',
            'template_url' => 'https://docs.google.com/template',
            'video' => UploadedFile::fake()->create('new.mp4', 1024, 'video/mp4'),
        ]);

        $response->assertOk();

        $playbook->refresh();
        $this->assertStringContainsString('/storage/playbooks/videos/', $playbook->video_url);
        Storage::disk('public')->assertMissing('playbooks/videos/old.mp4');
    }

    public function test_destroy_removes_uploaded_video_file(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        Storage::disk('public')->put('playbooks/videos/old.mp4', 'fake');

        $playbook = Playbook::create([
            'name' => 'To Delete',
            'template_url' => 'https://docs.google.com/template',
            'video_url' => Storage::disk('public')->url('playbooks/videos/old.mp4'),
        ]);

        $this->actingAs($user)->delete('/dashboard/playbooks/' . $playbook->id);

        $this->assertDatabaseMissing('playbooks', ['id' => $playbook->id]);
        Storage::disk('public')->assertMissing('playbooks/videos/old.mp4');
    }

    public function test_playbook_can_be_created_with_description_and_video_url(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/dashboard/playbooks', [
            'name' => 'B2B Outbound Blueprint',
            'description' => "This is line one.\nThis is a longer line detailing the entire outreach system with Clay and Smartlead.",
            'template_url' => 'https://docs.google.com/template',
            'video_source_type' => 'url',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        $response->assertRedirect('/dashboard/playbooks');

        $playbook = Playbook::firstOrFail();
        $this->assertSame('B2B Outbound Blueprint', $playbook->name);
        $this->assertStringContainsString('This is line one.', $playbook->description);
        $this->assertSame('https://www.youtube.com/watch?v=dQw4w9WgXcQ', $playbook->video_url);
    }

    public function test_playbook_can_switch_from_uploaded_video_to_video_url_and_frees_old_file(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $playbook = Playbook::create([
            'name' => 'Initial File Playbook',
            'description' => 'Initial description',
            'template_url' => 'https://docs.google.com/template',
            'video_url' => Storage::disk('public')->url('playbooks/videos/initial.mp4'),
        ]);

        Storage::disk('public')->put('playbooks/videos/initial.mp4', 'fake-video-content');

        $response = $this->actingAs($user)->patchJson('/dashboard/playbooks/' . $playbook->id, [
            'name' => 'Updated Playbook Name',
            'description' => 'Updated multi-line description text.',
            'template_url' => 'https://docs.google.com/template',
            'video_source_type' => 'url',
            'video_url' => 'https://www.loom.com/share/abcdef123456',
        ]);

        $response->assertOk();

        $playbook->refresh();
        $this->assertSame('Updated Playbook Name', $playbook->name);
        $this->assertSame('Updated multi-line description text.', $playbook->description);
        $this->assertSame('https://www.loom.com/share/abcdef123456', $playbook->video_url);
        Storage::disk('public')->assertMissing('playbooks/videos/initial.mp4');
    }

    public function test_playbook_can_remove_video(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $playbook = Playbook::create([
            'name' => 'Has Video',
            'template_url' => 'https://docs.google.com/template',
            'video_url' => Storage::disk('public')->url('playbooks/videos/test.mp4'),
        ]);

        Storage::disk('public')->put('playbooks/videos/test.mp4', 'fake');

        $response = $this->actingAs($user)->patchJson('/dashboard/playbooks/' . $playbook->id, [
            'name' => 'Has Video',
            'template_url' => 'https://docs.google.com/template',
            'remove_video' => 1,
        ]);

        $response->assertOk();

        $playbook->refresh();
        $this->assertNull($playbook->video_url);
        Storage::disk('public')->assertMissing('playbooks/videos/test.mp4');
    }
}