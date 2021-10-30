<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\MessageForm;
use App\Mail\UserMessageSent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class MessageFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_message_from_platform_user_can_be_sent_to_admin()
    {
        Mail::fake();
        $user = User::factory()->create();
        $message = "Este es un mensaje de  prueba";

        $this->actingAs($user);

        Livewire::test(MessageForm::class)
            ->set("message", $message)
            ->call("sendMessage");

        // Assert that a mailable was sent...
        Mail::assertSent(UserMessageSent::class);
    }
}
