<?php

namespace App\Http\Livewire\Staff;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class Edit extends Component
{
    use AuthorizesRequests;

    public $name, $email, $role_id, $password;
    public $selectedUserId;

    public $roles;
    public $selectedRoleId, $selectedRoleName = 'Change role';

    public $confirmingUserEdit = false;

    protected function rules() {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->selectedUserId,
            'role_id' => 'required',
        ];

        if($this->password) {
            $rules['password'] = 'required|min:8|string';
        }

        return $rules;
    }

    public function selectingRole($id, $name) { 
        $this->selectedRoleId = $id;
        $this->role_id = $id;
        $this->selectedRoleName = $name;
    }

    public function mount(User $user){
        $this->roles = Role::select('id','title')->get();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        $this->selectedUserId = $user->id;
    }

    public function confirmUserEdit() {
        $this->resetErrorBag();
        $this->confirmingUserEdit = true;
    }

    public function editUser() {
        $this->validate();

        $update_record = User::find($this->selectedUserId);
        $this->authorize('update', $update_record);
        $update_record->update([
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'password' => Hash::make($this->password)
        ]);

        $this->confirmingUserEdit = false;

        $this->emit('updateUsersList');
    }

    public function render()
    {
        return view('livewire.staff.edit');
    }
}
