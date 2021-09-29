<?php

namespace App\Http\Livewire\Staff;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('viewAny', User::class);
        return view('livewire.staff.show');
    }
}
