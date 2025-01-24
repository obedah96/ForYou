<?php
// app\Infrastructure\Repositories\Interfaces\ElectricalApplianceRepositoryInterface.php
namespace App\Infrastructure\Repositories\Interfaces;

interface ElectricalApplianceRepositoryInterface
{
    public function getLatestThreeAppliances(); 
    public function getAllAppliances(); 
}
