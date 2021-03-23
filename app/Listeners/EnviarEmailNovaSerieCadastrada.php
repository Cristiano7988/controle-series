<?php

namespace App\Listeners;

use App\Events\NovaSerie as EventsNovaSerie;
use App\Mail\NovaSerie;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovaSerieCadastrada implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(EventsNovaSerie $event)
    {
        $users = User::all();
        foreach($users as $index => $user) {
            $multiplicador = $index + 1;
            $when = now()->addSecond($multiplicador * 5);
            $email = new NovaSerie($event->nome, $event->qtdTemporadas, $event->qtdEpisodios);
            $email->subject('Nova série adicionada');
            Mail::to($user)->later($when, $email);
        }
    }
}
