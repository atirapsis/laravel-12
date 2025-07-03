<?php

namespace App\Policies;
use App\Models\Inventory;
use App\Models\User;

class InventoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, Inventory $inventory)
    {
        return $user->id === $post->user_id;
    }

    public function update(User $user, Inventory $inventory)
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Inventory $inventory)
    {
        return $user->id === $post->user_id;
    }
}
