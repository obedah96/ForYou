<?php
//app\Infrastructure\Repositories\Eloquent\UserRepository.php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Infrastructure\Repositories\Interfaces\UserRepositoryInterface;
use App\Domain\Entities\User as EloquentUser;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function save(EloquentUser $user): EloquentUser
    {
        $user->save();
        return $user;
    }

    public function findByEmail(string $email): ?EloquentUser
    {
        return EloquentUser::where('email', $email)->first();
    }
    public function LoginUser($identifier,$password): ?EloquentUser
    {
        $field = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'phoneNumber';

        $user = EloquentUser::where($field, $identifier)->first();
    
        if (!$user||!Hash::check($password, $user->password)) {
            return null;
        }
        return $user;
    }
    public function findByVerificationToken(string $token): ?EloquentUser
    {
        return EloquentUser::where('verification_token', $token)->first();
    }

    public function markEmailAsVerified(EloquentUser $user)
    {
        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();
    }
}
