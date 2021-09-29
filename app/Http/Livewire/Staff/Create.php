<?php

namespace App\Http\Livewire\Staff;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class Create extends Component
{
    use AuthorizesRequests;

    public $name, $email, $role_id, $password, $password_confirmation;

    public $roles;
    public $selectedRoleId, $selectedRoleName = 'Select role';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'role_id' => 'required',
        'password' => 'required|min:8|string|confirmed'
    ];

    public function selectingRole($id, $name) {
        $this->selectedRoleId = $id;
        $this->role_id = $id;
        $this->selectedRoleName = $name;
    }

    public function createUser() {
        $this->authorize('create', User::class);
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'password' => Hash::make($this->password)
        ]);

        return redirect('/staff');
    }

    public function mount() {
        $this->roles = Role::select('id','title')->get();
    }

    public function render()
    {
        $this->authorize('create', User::class);
        return view('livewire.staff.create');
    }
}
