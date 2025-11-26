<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Paper;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaperPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_paper');
    }

    public function view(AuthUser $authUser, Paper $paper): bool
    {
        return $authUser->can('view_paper');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_paper');
    }

    public function update(AuthUser $authUser, Paper $paper): bool
    {
        return $authUser->can('update_paper');
    }

    public function delete(AuthUser $authUser, Paper $paper): bool
    {
        return $authUser->can('delete_paper');
    }

    public function restore(AuthUser $authUser, Paper $paper): bool
    {
        return $authUser->can('restore_paper');
    }

    public function forceDelete(AuthUser $authUser, Paper $paper): bool
    {
        return $authUser->can('force_delete_paper');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_paper');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_paper');
    }

    public function replicate(AuthUser $authUser, Paper $paper): bool
    {
        return $authUser->can('replicate_paper');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_paper');
    }

}