<?php
//app\Infrastructure\Repositories\Eloquent\ElectricalApplianceRepository.php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Entities\ElectricalAppliance;
use App\Infrastructure\Repositories\Interfaces\ElectricalApplianceRepositoryInterface;

class ElectricalApplianceRepository implements ElectricalApplianceRepositoryInterface
{
    public function paginateElectricalAppliances(int $perPage)
{
    // جلب جميع البيانات
    $allAppliances = ElectricalAppliance::select(
        'electrical_appliances.product_id',
        'electrical_appliances.product_name',
        'electrical_appliances.price',
        'electrical_appliances.image_path',
        'electrical_appliances.product_city',
        'products.product_type'
    )
    ->join('products', 'electrical_appliances.product_id', '=', 'products.id')
    ->orderBy('electrical_appliances.created_at', 'desc')
    ->get();

    // تحديد الصفحة الحالية
    $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();

    // تحديد العناصر للصفحة الحالية
    if ($currentPage == 1) {
        // عرض أول 3 عناصر في الصفحة الأولى
        $items = $allAppliances->take(3);
    } else {
        // عرض العناصر المتبقية بعد أول 3 في الصفحات التالية
        $items = $allAppliances->skip(3);
    }

    // إنشاء كائن Pagination
    return new \Illuminate\Pagination\LengthAwarePaginator(
        $items, // البيانات التي سيتم عرضها
        $allAppliances->count(), // إجمالي عدد العناصر
        $perPage, // عدد العناصر لكل صفحة
        $currentPage, // الصفحة الحالية
        ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()] // رابط الصفحة
    );
}

}
