<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
  use SoftDeletes;
  protected $fillable = [
      'name', 'display_name', 'description',
  ];
}
