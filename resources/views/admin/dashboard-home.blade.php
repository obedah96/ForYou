<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>لوحة التحكم الرئيسية</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard-home.css') }}"/>
</head>
<body class="flex h-screen bg-gray-100">

  {{-- Sidebar --}}
  <aside class="w-64 bg-white shadow-lg p-4 flex flex-col">
    <div class="mb-6">
      <h2 class="text-xl font-semibold text-gray-800">الأدمن الحالي</h2>
      <p id="admin-email" class="mt-2 text-gray-600">جارٍ التحميل…</p>
    </div>

    <button id="toggle-add-admin"
            class="w-full py-2 mb-4 bg-blue-600 hover:bg-blue-700 text-white rounded transition">
      إضافة أدمن جديد
    </button>

    <form id="add-admin-form" class="space-y-3 hidden">
      <div>
        <label for="new-admin-email" class="block text-gray-700">إيميل الأدمن</label>
        <input type="email" id="new-admin-email" name="email" required
               class="w-full px-3 py-2 border rounded focus:outline-none"/>
      </div>
      <div>
        <label for="new-admin-password" class="block text-gray-700">كلمة المرور</label>
        <input type="password" id="new-admin-password" name="password" required
               class="w-full px-3 py-2 border rounded focus:outline-none"/>
      </div>
      <button type="submit"
              class="w-full py-2 bg-green-600 hover:bg-green-700 text-white rounded transition">
        حفظ الأدمن
      </button>
    </form>
  </aside>

  {{-- Main Content --}}
  <main class="flex-1 flex flex-col justify-center items-center">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      {{-- صورة السيارات --}}
      <a href="{{ route('dashboard.cars') }}" class="flex flex-col items-center">
        <img src="{{ asset('images/cars.jpg') }}"
             alt="السيارات"
             class="w-48 h-48 object-cover rounded shadow-lg"/>
        <span class="mt-2 font-semibold text-gray-700">السيارات</span>
      </a>

      {{-- صورة الأجهزة الكهربائية --}}
      <a href="{{ route('dashboard.electrical') }}" class="flex flex-col items-center">
        <img src="{{ asset('images/electrical.jpg') }}"
             alt="الأجهزة الكهربائية"
             class="w-48 h-48 object-cover rounded shadow-lg"/>
        <span class="mt-2 font-semibold text-gray-700">الأجهزة الكهربائية</span>
      </a>

      {{-- صورة الأجهزة المنزلية --}}
      <a href="{{ route('dashboard.home_appliances') }}" class="flex flex-col items-center">
        <img src="{{ asset('images/home_appliances.jpg') }}"
             alt="الأجهزة المنزلية"
             class="w-48 h-48 object-cover rounded shadow-lg"/>
        <span class="mt-2 font-semibold text-gray-700">الأجهزة المنزلية</span>
      </a>

      {{-- صورة العقارات --}}
      <a href="{{ route('dashboard.real_estates') }}" class="flex flex-col items-center">
        <img src="{{ asset('images/real_estates.jpg') }}"
             alt="العقارات"
             class="w-48 h-48 object-cover rounded shadow-lg"/>
        <span class="mt-2 font-semibold text-gray-700">العقارات</span>
      </a>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    // جلب التوكن والإيميل من localStorage
    const token = localStorage.getItem('admin_token');
    const email = localStorage.getItem('admin_email');

    if (!token || !email) {
      window.location.href = "{{ route('dashboard') }}";
    }

    // إعداد هيدر المصادقة
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    // عرض الإيميل
    document.getElementById('admin-email').textContent = email;

    // تفعيل زر إظهار/إخفاء نموذج إضافة الأدمن
    document.getElementById('toggle-add-admin')
      .addEventListener('click', () => {
        document.getElementById('add-admin-form').classList.toggle('hidden');
      });
  </script>
</body>
</html>
