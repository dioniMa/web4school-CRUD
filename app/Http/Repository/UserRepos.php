<?php

namespace App\Http\Repository;

class UserRepos
{
  protected $post;
  public function _construct(User $user){
      $this->user=$user;
  }

}
