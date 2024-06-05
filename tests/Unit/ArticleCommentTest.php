<?php
//
namespace Tests\Unit;

use App\Models\Admin\Admin;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ArticleCommentTest extends TestCase
{
    use \Illuminate\Foundation\Testing\RefreshDatabase;

    public function test_example(): void
    {
        $admin = Admin::latest()->first();
        Auth::guard('admin')->login($admin);
        $this->assertAuthenticatedAs($admin, 'admin');

        Storage::fake('public');
        $image = UploadedFile::fake()->image('test-image.jpg');

        $articleData = [
            'title' => 'Test Article',
            'content' => 'Test Article Content',
            'is_published' => true,
            'image' => $image
        ];

        $response = $this->post('admin/articles', $articleData);
        $response->assertStatus(201);
    }
}
