<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\TravelBooking;
use Illuminate\Auth\Access\HandlesAuthorization;

class TravelBookingPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_travel_booking');
    }

    public function view(AuthUser $authUser, TravelBooking $travelBooking): bool
    {
        return $authUser->can('view_travel_booking');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_travel_booking');
    }

    public function update(AuthUser $authUser, TravelBooking $travelBooking): bool
    {
        return $authUser->can('update_travel_booking');
    }

    public function delete(AuthUser $authUser, TravelBooking $travelBooking): bool
    {
        return $authUser->can('delete_travel_booking');
    }

    public function restore(AuthUser $authUser, TravelBooking $travelBooking): bool
    {
        return $authUser->can('restore_travel_booking');
    }

    public function forceDelete(AuthUser $authUser, TravelBooking $travelBooking): bool
    {
        return $authUser->can('force_delete_travel_booking');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_travel_booking');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_travel_booking');
    }

    public function replicate(AuthUser $authUser, TravelBooking $travelBooking): bool
    {
        return $authUser->can('replicate_travel_booking');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_travel_booking');
    }

}