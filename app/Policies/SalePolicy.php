<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return mixed
     */
    public function view(User $user, Sale $sale)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id == Role::IS_ADMIN || $user->role_id == Role::IS_CASHIER;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return mixed
     */
    public function update(User $user, Sale $sale)
    {
        return $user->role_id == Role::IS_ADMIN || (auth()->check() && $sale->user_id == auth()->id());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return mixed
     */
    public function delete(User $user, Sale $sale)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return mixed
     */
    public function restore(User $user, Sale $sale)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return mixed
     */
    public function forceDelete(User $user, Sale $sale)
    {
        //
    }
}
