<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Role extends EntrustRole
{
  use SoftDeletes;
  protected $fillable = [
      'name', 'display_name', 'description',
  ];
  public function permissions()
  {
      return $this->belongsToMany(Config::get('entrust.permission'), Config::get('entrust.permission_role_table'), Config::get('entrust.role_foreign_key'), Config::get('entrust.permission_foreign_key'));
  }
}
