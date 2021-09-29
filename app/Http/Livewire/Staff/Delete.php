<?php

namespace App\Http\Livewire\Staff;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use Livewire\Component;

class Delete extends Component
{
    use AuthorizesRequests;

    public $selectedUser;

    public $confirmingUserDeletion = false;

    public function mount(User $user) {
        $this->selectedUser = $user->id;
    }

    public function confirmUserDeletion() {
        $this->confirmingUserDeletion = true;
    }

    public function deleteUser() {
        $userDelete = User::find($this->selectedUser);
        $this->authorize('delete', $userDelete);
        $userDelete->delete();

        $this->confirmingUserDeletion = false;

        $this->emit('updateUsersList');
    }

    public function render()
    {
        return view('livewire.staff.delete');
    }
}
