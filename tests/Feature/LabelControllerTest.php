<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LabelControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)->get(route('labels.auth.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $labelData = Label::factory()->make()->toArray();
        $response = $this->actingAs($this->user)->post(route('labels.auth.store'), $labelData);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('labels.index'));
        $this->assertDatabaseHas('labels', $labelData);
    }

    public function testEdit(): void
    {
        $label = Label::factory()->create();
        $response = $this->actingAs($this->user)->get(route('labels.auth.edit', $label));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $label = Label::factory()->create();
        $newLabelData = Label::factory()->make()->toArray();
        $response = $this->actingAs($this->user)->patch(route('labels.auth.update', $label), $newLabelData);
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('labels', $newLabelData);
    }

    public function testDestroy(): void
    {
        $label = Label::factory()->create();
        $response = $this->actingAs($this->user)
            ->delete(route('labels.auth.destroy', $label));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('labels', ['id' => $label->id]);
    }
}
