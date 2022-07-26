<?php


use App\Models\Category;
use App\Models\Lot;
use Tests\TestCase;

class ApiCategoryControllerTest extends TestCase
{
    public function test_show_all_categories()
    {
        Category::factory()->times(10)->create();
        $response = $this->getJson('api/categories');
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                [
                    'id',
                    'title',
                ]
            ]
        ]);
    }

    public function test_show_all_lots_by_category()
    {
        $categories = Category::factory()->times(10)->create();
        Lot::factory(50)->create()->each(function ($lot) use ($categories) {
            $lot->categories()->attach($categories->random(rand(2, 4)));
        });
        $response = $this->getJson('api/categories/1');
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                [
                    'id',
                    'title',
                    'pivot' => [
                        'category_id',
                    ],
                ],
            ]
        ]);
    }
}
