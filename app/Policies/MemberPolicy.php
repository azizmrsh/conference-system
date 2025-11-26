<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_member');
    }

    public function view(AuthUser $authUser, Member $member): bool
    {
        return $authUser->can('view_member');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_member');
    }

    public function update(AuthUser $authUser, Member $member): bool
    {
        return $authUser->can('update_member');
    }

    public function delete(AuthUser $authUser, Member $member): bool
    {
        return $authUser->can('delete_member');
    }

    public function restore(AuthUser $authUser, Member $member): bool
    {
        return $authUser->can('restore_member');
    }

    public function forceDelete(AuthUser $authUser, Member $member): bool
    {
        return $authUser->can('force_delete_member');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_member');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_member');
    }

    public function replicate(AuthUser $authUser, Member $member): bool
    {
        return $authUser->can('replicate_member');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_member');
    }

}