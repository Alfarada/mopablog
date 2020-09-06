<?php 

namespace Tests;

use App\{User,Post};

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

    public function defaultPost( array $attributes = [])
    {
        return $this->defaultPost = factory(Post::class)->create($attributes);
    }
}
