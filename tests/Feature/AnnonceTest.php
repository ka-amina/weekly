<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Annonce;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class AnnonceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Annonces_List(): void
    {
        $response = $this->get('/annonces');
        $response->assertStatus(200);
        $response->assertSee('Annonces');
    }

    public function test_can_add_an_annonce_and_delete_it()
    {
        $response = $this->get('/annonces');
        $response->assertStatus(200);
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $img = UploadedFile::fake()->image('img.jpg');
        $annonce = Annonce::factory()->create([
            'title' => 'annonce',
            'description' => 'this is a sample description.',
            'price' => 99.99,
            'image' => $img,
            'user_id' => $user->id,
            'categorie_id' => $category->id,
            'status' => 'actif',
        ]);

        $annonce->delete();
        $category->delete();
        $user->delete();
        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
        $this->assertDatabaseMissing('annonces', [
            'id' => $annonce->id,
        ]);
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
