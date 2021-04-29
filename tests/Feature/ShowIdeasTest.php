<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /* @test */
    public function test_list_of_ideas_shows_on_main_page()
    {
        $user = User::factory()->create();
        
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);
        $statusConsidering = Status::factory()->create(['name' => 'Considering']);

        $ideaOne = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my First Idea'
        ]);

        $ideaTwo = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'category_id' => $categoryTwo->id,
            'status_id' => $statusConsidering->id,
            'description' => 'Description of my Second Idea'
        ]);


        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($categoryOne->name);
        $response->assertSee('<button class="bg-blue-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</button>', false);

        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($categoryTwo->name);
        $response->assertSee('<button class="bg-purple-500 text-white text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Considering</button>', false);
    }

    /* @test */
    public function test_single_idea_shows_correctly_on_show_page()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'title' => 'My First Idea',
            'description' => 'Description of my First Idea'
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();

        $response->assertSee($idea->title);
        $response->assertSee($categoryOne->name);
        $response->assertSee($idea->description);
        $response->assertSee('<div class="bg-blue-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>', false);
    }

    /** @test */
    public function ideas_pagination_works()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);

        Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
        ]);

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My First Idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My Eleventh Idea';
        $ideaEleven->save();

        $response = $this->get('/');

        $response->assertDontSee($ideaOne->title);
        $response->assertSee($ideaEleven->title);

        $response = $this->get('/?page=2');

        $response->assertDontSee($ideaEleven->title);
        $response->assertSee($ideaOne->title);
    }

    /** @test */
    public function same_idea_title_different_slugs()
    {
        $user = User::factory()->create();
        
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);

        $ideaOne = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'title' => 'My First Idea',
            'status_id' => $statusOpen->id,
            'description' => 'Description for my first idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'title' => 'My First Idea',
            'status_id' => $statusOpen->id,
            'description' => 'Another Description for my first idea',
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea');

        $response = $this->get(route('idea.show', $ideaTwo));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea-2');
    }
}
