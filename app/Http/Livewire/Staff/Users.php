<?php

namespace App\Http\Livewire\Staff;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search;

    public $filterUsers = null;

    protected $queryString = ['search'];

    protected $listeners = [
        'updateUsersList' => 'render',
    ];

    public function updateSearch() {
        $this->resetPage();
    }

    public function selectFilterUsers($id) {
        $this->filterUsers = $id;
    }

    public function render()
    {
        return view('livewire.staff.users', [
            'users' => User::select('id','name','email','role_id','profile_photo_path','created_at')
                        ->with('role:id,title')
                        ->when($this->filterUsers, function($query) {
                            $query->where('role_id', $this->filterUsers);
                        })
                        ->search(trim($this->search))
                        ->paginate(10),
            'total_users_count' => User::count(),
            'roles' => Role::select('id','title')
                    ->withCount('users')->get(),
        ]);
    }
}
