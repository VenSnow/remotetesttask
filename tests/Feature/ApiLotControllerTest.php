<?php


use App\Models\Category;
use App\Models\Lot;
use Tests\TestCase;

class ApiLotControllerTest extends TestCase
{
    public function test_show_all_lots()
    {
        $categories = Category::factory()->times(10)->create();
        Lot::factory(50)->create()->each(function ($lot) use ($categories) {
            $lot->categories()->attach($categories->random(rand(2, 4)));
        });
        $response = $this->getJson('api/lots');
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                [
                    'title',
                    'description',
                    'categories' => [
                        [
                            'id',
                            'title',
                        ]
                    ],
                ],
            ]
        ]);
    }

    public function test_show_one_lot()
    {
        $categories = Category::factory()->times(10)->create();
        Lot::factory(50)->create()->each(function ($lot) use ($categories) {
            $lot->categories()->attach($categories->random(rand(2, 4)));
        });
        $firstId = Lot::latest()->first();
        $url = 'api/lots/' . $firstId->id;
        $response = $this->getJson($url);
        $response->assertJsonStructure([
            'id',
            'title',
            'description',
            'categories' => [
                [
                    'id',
                    'title',
                ]
            ]
        ]);
    }
}
