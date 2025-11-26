<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ConferenceSession;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConferenceSessionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_conference_session');
    }

    public function view(AuthUser $authUser, ConferenceSession $conferenceSession): bool
    {
        return $authUser->can('view_conference_session');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_conference_session');
    }

    public function update(AuthUser $authUser, ConferenceSession $conferenceSession): bool
    {
        return $authUser->can('update_conference_session');
    }

    public function delete(AuthUser $authUser, ConferenceSession $conferenceSession): bool
    {
        return $authUser->can('delete_conference_session');
    }

    public function restore(AuthUser $authUser, ConferenceSession $conferenceSession): bool
    {
        return $authUser->can('restore_conference_session');
    }

    public function forceDelete(AuthUser $authUser, ConferenceSession $conferenceSession): bool
    {
        return $authUser->can('force_delete_conference_session');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_conference_session');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_conference_session');
    }

    public function replicate(AuthUser $authUser, ConferenceSession $conferenceSession): bool
    {
        return $authUser->can('replicate_conference_session');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_conference_session');
    }

}