<?php

namespace Tests\Feature\Mail;

use App\Http\Livewire\MessageForm;
use App\Mail\UserMessageSent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class UserMessageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function mailable_has_correct_info()
    {
        $user = User::factory()->create();
        $message = "Este es un mensaje de  prueba";

        $this->actingAs($user);
        $mailable = new UserMessageSent($message);

        $mailable->assertSeeInHtml($message);
        $mailable->assertSeeInText($message);
    }
}
