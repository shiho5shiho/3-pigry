<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Weight;

class WeightPolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Weight $weight): bool
    {
        return $user->id === $weight->user_id;
    }

}
