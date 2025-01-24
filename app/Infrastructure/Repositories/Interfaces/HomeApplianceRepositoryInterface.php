<?php

namespace App\Infrastructure\Repositories\Interfaces;

interface HomeApplianceRepositoryInterface
{
    public function getLatestThree(): \Illuminate\Support\Collection;

    public function getAll(): \Illuminate\Support\Collection;
}
