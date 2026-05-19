<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Craft;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CraftTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_craft()
    {
        $craft = Craft::create([
            'name' => 'Архитектурное моделирование',
            'description' => 'Test description for architecture modeling'
        ]);

        $this->assertDatabaseHas('crafts', ['name' => 'Архитектурное моделирование']);
        $this->assertNotNull($craft->id);
    }

    public function test_craft_has_master_classes_relation()
    {
        $craft = Craft::create([
            'name' => 'Test Craft',
            'description' => 'Test Description'
        ]);

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $craft->masterClasses);
    }
}