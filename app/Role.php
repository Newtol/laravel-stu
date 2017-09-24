<?php namespace App;

use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use Spatie\Permission\Traits\HasRoles;
use Spatie \ Permission \ Models \ Permission ;
class Role extends EntrustRole
{
    use EntrustUserTrait; 
}
