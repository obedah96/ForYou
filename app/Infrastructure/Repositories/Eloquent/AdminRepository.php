<?php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Infrastructure\Repositories\Interfaces\AdminRepositoryInterface;
use APP\Domain\Entities\Admin;
use Illuminate\Support\Facades\DB;


class AdminRepository implements AdminRepositoryInterface{

    public function findByEmail(string $email):?Admin
    {
        $admin=DB::table('admins')->where('email',$email)->first();
        if(!$admin)
            return null;

        return new Admin(
            id:$admin->id,
            email:$admin->email,
            password:$admin->password
        );
    }

}