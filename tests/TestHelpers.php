<?php 

namespace Tests;

use App\User;

/**
 * @helpers
 */
trait TestHelpers
{   
    protected $defaultUser;
    
    public function defaultUser(array $attributes = [])
    {
        !$this->defaultUser ?: $this->defaultUser;

        return $this->defaultUser = factory(User::class)->create($attributes);
    }
}
