<?php

namespace App\Mail;

use App\League;
use App\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangeInformationTeam extends Mailable
{
    use Queueable, SerializesModels;
    protected $team;
    /**
     * Create a new message instance.
     * @param  \App\Team $team
     * @return void
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this

            ->view('emails.changeInformationTeam')
            ->subject("Zmiana godziny i miejsca drużyny ".$this->team->name)
            ->with([
                'team' => $this->team->name,
                'league' => League::find($this->team->league_id)->name
            ]);
    }
}
