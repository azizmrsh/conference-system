<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Conference;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConferencePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_conference');
    }

    public function view(AuthUser $authUser, Conference $conference): bool
    {
        return $authUser->can('view_conference');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_conference');
    }

    public function update(AuthUser $authUser, Conference $conference): bool
    {
        return $authUser->can('update_conference');
    }

    public function delete(AuthUser $authUser, Conference $conference): bool
    {
        return $authUser->can('delete_conference');
    }

    public function restore(AuthUser $authUser, Conference $conference): bool
    {
        return $authUser->can('restore_conference');
    }

    public function forceDelete(AuthUser $authUser, Conference $conference): bool
    {
        return $authUser->can('force_delete_conference');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_conference');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_conference');
    }

    public function replicate(AuthUser $authUser, Conference $conference): bool
    {
        return $authUser->can('replicate_conference');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_conference');
    }

}