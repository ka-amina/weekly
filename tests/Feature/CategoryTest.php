<?php

namespace Tests\Feature;
use App\Models\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_categories_list()
{
    $response = $this->get('/categories');

    $response->assertStatus(200);  
    $response->assertSee('Categories');  
}

public function test_can_create_a_category_and_delete_it(){
    $response = $this->get('/categories');
    $response->assertStatus(200);
    $category = Category::factory()->create();
    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => $category->name,
        'slug' => $category->slug,
    ]);
    $category->delete();
    $this->assertDatabaseMissing('categories', [
        'id' => $category->id,
    ]);

}

public function test_can_update_a_category(){
    $response = $this->get('/categories');
    $response->assertStatus(200);
    $category = Category::factory()->create([
        'name'=>'category',
        'slug'=>'slug',
    ]);
    $updatdeData=[
        'name'=>'updated_category',
        'slug'=>'updated_slug',
    ];
    $response = $this->put(route('categories.update', $category->id), $updatdeData);
    $response->assertRedirect(route('categories'));

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'updated_category',
        'slug' => 'updated_slug',
    ]);

    $this->assertDatabaseMissing('categories', [
        'name' => 'category',
        'slug' => 'slug',
    ]);

    $category->delete();

}


    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
