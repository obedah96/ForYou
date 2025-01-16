<?php
//App\Infrastructure\Repositories\Eloquent\HomeApplianceRepository.php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Entities\HomeAppliance;
use App\Infrastructure\Repositories\Interfaces\HomeApplianceRepositoryInterface;

class HomeApplianceRepository implements HomeApplianceRepositoryInterface
{
    public function paginate(int $limit, int $page)
    {
        if ($page == 1) {
            return HomeAppliance::latest()->take(3)->get();
        }

        return HomeAppliance::paginate($limit, ['*'], 'page', $page);
    }
}
