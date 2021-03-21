<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * List Test
     * Create 5 record and get them.
     * 
     * @return void
     */
    public function test_list()
    {
        // 5 record added to database
        Blog::factory()->count(5)->create();

        // request
        $response = $this->get('api/blogs');

        // assert response data count 
        $response->assertJsonCount(5, 'data');

        // assert response code 200
        $response->assertStatus(200);
    }

    /**
     * Create Test
     * Make a template and call create api with this data.
     * 
     * @return void
     */
    public function test_create()
    {
        // create a record template and get attributes
        $blog = Blog::factory()->make()->getAttributes();

        // request
        $response = $this->postJson('api/blogs', $blog);

        // assert response
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'title' => $blog['title'],
                'body' => $blog['body'],
            ]
        ]);

        // assert database with will create data.
        $this->assertDatabaseHas('blogs', $blog);
    }

    /**
     * Update Test
     * Create a record. After create new template, then call update api. 
     * 
     * @return void
     */
    public function test_update()
    {
        // add a record
        $blog = Blog::factory()->create();

        // create new record template 
        $newBlog = Blog::factory()->make()->getAttributes();

        // request
        $response = $this->putJson('api/blogs/' . $blog->id, $newBlog);

        // assert response
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $blog->id,
                'title' => $newBlog['title'],
                'body' => $newBlog['body'],
            ]
        ]);

        // assert database with will create data.
        $this->assertDatabaseHas('blogs', $newBlog);
    }


    /**
     * Delete Test
     * Create a record. Call delete request.
     * 
     * @return void
     */
    public function test_delete()
    {
        // add a record
        $blog = Blog::factory()->create();

        // request
        $response = $this->deleteJson('api/blogs/' . $blog->id);

        // assert response
        $response->assertStatus(200);

        // assert database with will create data.
        $this->assertSoftDeleted('blogs', $blog->getAttributes());
    }

    /**
     * Detail Test
     * Create a record and get this data with Api.
     * 
     * @return void
     */
    public function test_detail()
    {
        // 5 record added to database
        $blog = Blog::factory()->create();

        // request
        $response = $this->get('api/blogs/detail/'. $blog->id);

        // response control
        $response->assertJson([
            'data' => [
                'id' => $blog->id,
                'title' => $blog['title'],
                'body' => $blog['body'],
            ]
        ]);

        // response code 200
        $response->assertStatus(200);
    }
}
