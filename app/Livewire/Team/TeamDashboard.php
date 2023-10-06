<?php

namespace App\Livewire\Team;

use Livewire\Component;

class TeamDashboard extends Component
{
    public function render()
    {
        return view('livewire.Team.team-dashboard')->layout('components.layouts.app',['title'=>'Team Leader - Dashboard']);
    }
}

?>