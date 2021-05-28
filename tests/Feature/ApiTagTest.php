<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class APITagTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Index Test
     * Create 5 record and get them.
     * 
     * @return void
     */
    public function test_index()
    {
        // 5 record added to database
        Tag::factory()->count(5)->create();

        // request
        $response = $this->get('api/tags');

        // assert response data count 
        $response->assertJsonCount(5, 'data');

        // assert response code 200
        $response->assertStatus(200);
    }

    /**
     * Store Test
     * Make a template and call create api with this data.
     * 
     * @return void
     */
    public function test_store()
    {
        // create a record template and get attributes
        $attributes = Tag::factory()->make()->getAttributes();

        // request
        $response = $this->postJson('api/tags', $attributes);

        // assert response
        $response->assertStatus(200);
        $response->assertJson([
            'title' => $attributes['title'],
            'blog_id' => $attributes['blog_id'],
        ]);

        // assert database with will create data.
        $this->assertDatabaseHas('tags', $attributes);
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
        $model = Tag::factory()->create();

        // create new record template 
        $newModel = Tag::factory()->make()->getAttributes();

        // request
        $response = $this->putJson('api/tags/' . $model->id, $newModel);

        // assert response
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $model->id,
            'title' => $newModel['title'],
            'blog_id' => $newModel['blog_id'],
        ]);

        // assert database with will create data.
        $this->assertDatabaseHas('tags', $newModel);
    }


    /**
     * Destroy Test
     * Create a record. Call delete request.
     * 
     * @return void
     */
    public function test_destroy()
    {
        // add a record
        $model = Tag::factory()->create();

        // request
        $response = $this->delete('api/tags/' . $model->id);

        // assert response
        $response->assertStatus(200);

        // assert database with will create data.
        $this->assertDeleted('tags', $model->getAttributes());
    }

    /**
     * Show Test
     * Create a record and get this data with Api.
     * 
     * @return void
     */
    public function test_show()
    {
        // 5 record added to database
        $model = Tag::factory()->create();

        // request
        $response = $this->get('api/tags/' . $model->id);

        // response control
        $response->assertJson([
            'id' => $model->id,
            'title' => $model['title'],
            'blog_id' => $model['blog_id'],
        ]);

        // response code 200
        $response->assertStatus(200);
    }
}
