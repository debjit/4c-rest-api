<?php

namespace Tests\Feature\api;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{

    public function test_get_all_posts()
    {
        Post::factory(30)->create();
        $this->getJson(route('post.index'))
                ->assertOk()
                ->assertJsonStructure(['data', 'meta', 'links'])
                ->assertJsonCount(25, 'data')
                ->assertJsonStructure(['data' => ['*' => ['id', 'title']]]);

    }

    public function test_shows_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->getJson(route('post.show',$post->id))->assertOk();
    }

    public function test_creates_a_post()
    {
        $response = $this->postJson(route('post.store',Post::factory()->raw()));
        $response->assertCreated();

        $this->assertDatabaseHas('posts', [
            'id' => $response->json('data.id')
        ]);
    }

    public function test_update_an_post()
    {
        $post = Post::factory()->create();

        $response = $this->putJson(route('post.update',$post->id),[
            'title' => 'New',
            'body'=> 'Body'
        ]);

        $response->assertOk()->assertJsonPath('data.title', 'New');

    }

    public function test_deletes_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->deleteJson(route('post.destroy',$post->id));
        $response->assertOk();
    }

}
