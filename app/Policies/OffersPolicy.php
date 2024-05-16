<?php

namespace App\Policies;

use App\Models\Offers;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OffersPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Offers $offers)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Partner $partner, Offers $offer)
    {
        return $partner->id == $offer->partner->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Offers $offers)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Offers $offers)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Offers $offers)
    {
        //
    }
}
