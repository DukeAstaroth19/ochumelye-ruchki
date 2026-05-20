<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Craft;
use App\Models\User;
use App\Models\MasterClass;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MasterClassTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_master_class()
    {
        $craft = Craft::create([
            'name' => 'Test Craft',
            'description' => 'Test Description'
        ]);

        $teacher = User::create([
            'name' => 'Test Teacher',
            'email' => 'teacher@test.com',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);

        $masterClass = MasterClass::create([
            'craft_id' => $craft->id,
            'teacher_id' => $teacher->id,
            'title' => 'Test Master Class',
            'description' => 'Test Description',
            'date' => '2026-06-15',
            'time' => '14:00:00',
            'max_participants' => 10,
            'price' => 1500,
            'available_seats' => 10
        ]);

        $this->assertNotNull($masterClass);
        $this->assertEquals('Test Master Class', $masterClass->title);
    }

    public function test_master_class_has_available_seats()
    {
        $craft = Craft::create([
            'name' => 'Test Craft',
            'description' => 'Test Description'
        ]);

        $teacher = User::create([
            'name' => 'Test Teacher',
            'email' => 'teacher2@test.com',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);

        $masterClass = MasterClass::create([
            'craft_id' => $craft->id,
            'teacher_id' => $teacher->id,
            'title' => 'Test Class',
            'description' => 'Test Description',
            'date' => '2026-06-15',
            'time' => '14:00:00',
            'max_participants' => 10,
            'price' => 1500,
            'available_seats' => 5
        ]);

        $this->assertFalse($masterClass->isAvailable());
        $this->assertEquals(5, $masterClass->availableSeats());
    }

    public function test_can_book_master_class()
    {
        $craft = Craft::create([
            'name' => 'Test Craft',
            'description' => 'Test Description'
        ]);

        $teacher = User::create([
            'name' => 'Test Teacher',
            'email' => 'teacher3@test.com',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);

        $masterClass = MasterClass::create([
            'craft_id' => $craft->id,
            'teacher_id' => $teacher->id,
            'title' => 'Test Class',
            'description' => 'Test Description',
            'date' => '2026-06-15',
            'time' => '14:00:00',
            'max_participants' => 10,
            'price' => 1500,
            'available_seats' => 10
        ]);

        $initialSeats = $masterClass->available_seats;
        $masterClass->decrement('available_seats');
        
        $this->assertEquals($initialSeats - 1, $masterClass->fresh()->available_seats);
    }
}
