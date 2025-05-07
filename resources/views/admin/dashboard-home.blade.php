<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>لوحة التحكم</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="flex h-screen bg-gray-100">

  {{-- Sidebar --}}
  <aside class="w-64 bg-white shadow-lg p-4 flex flex-col">
    <div class="mb-6">
      <h2 class="text-xl font-semibold text-gray-800">الأدمن الحالي</h2>
      {{-- هنا يمكنك عرض اسم الأدمن من الجلسة --}}
      <p class="mt-2 text-gray-600">{{ Auth::user()->name }}</p>
    </div>

    <button id="toggle-add-admin"
            class="w-full py-2 mb-4 bg-blue-600 hover:bg-blue-700 text-white rounded transition">
      إضافة أدمن جديد
    </button>

    <form id="add-admin-form" class="space-y-3 hidden">
      <div>
        <label for="new-admin-email" class="block text-gray-700">إيميل الأدمن</label>
        <input type="email" id="new-admin-email" name="email" required
               class="w-full px-3 py-2 border rounded focus:outline-none">
      </div>
      <div>
        <label for="new-admin-password" class="block text-gray-700">كلمة المرور</label>
        <input type="password" id="new-admin-password" name="password" required
               class="w-full px-3 py-2 border rounded focus:outline-none">
      </div>
      <button type="submit"
              class="w-full py-2 bg-green-600 hover:bg-green-700 text-white rounded transition">
        حفظ الأدمن
      </button>
    </form>
  </aside>

  {{-- Main Content --}}
  <main class="flex-1 p-6 overflow-y-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      {{-- قسم السيارات --}}
      <section class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold mb-3">آخر السيارات</h3>
        <ul id="cars-list" class="space-y-2"></ul>
      </section>

      {{-- قسم الأجهزة الكهربائية --}}
      <section class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold mb-3">آخر الأجهزة الكهربائية</h3>
        <ul id="electrical-list" class="space-y-2"></ul>
      </section>

      {{-- قسم الأجهزة المنزلية --}}
      <section class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold mb-3">آخر الأجهزة المنزلية</h3>
        <ul id="home-appliances-list" class="space-y-2"></ul>
      </section>

      {{-- قسم العقارات --}}
      <section class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold mb-3">آخر العقارات</h3>
        <ul id="real-estates-list" class="space-y-2"></ul>
      </section>

    </div>
  </main>

  {{-- Axios CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    // 1. حاول جلب التوكن من التخزين المحلي
    const token = localStorage.getItem('admin_token');
    if (!token) {
      // إذا لم يوجد توكن، أعِد التوجيه لصفحة تسجيل الدخول
      window.location.href = "{{ route('login.page') }}";
    }

    // 2. أضف هيدر المصادقة لجميع طلبات Axios
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    // 3. نقاط النهاية والقوائم
    const endpoints = {
      cars:         'https://foryou.cash/api/cars/latest',
      electrical:   'https://foryou.cash/api/ElectricalAppliances/latest',
      home:         'https://foryou.cash/api/home-appliances/latest',
      realEstates:  'https://foryou.cash/api/real-estates/latest'
    };
    const lists = {
      cars:         document.getElementById('cars-list'),
      electrical:   document.getElementById('electrical-list'),
      home:         document.getElementById('home-appliances-list'),
      realEstates:  document.getElementById('real-estates-list')
    };

    // 4. دالة لجلب وعرض البيانات
    function fetchAndFill(key) {
      axios.get(endpoints[key])
        .then(res => {
          lists[key].innerHTML = '';
          res.data.slice(0, 3).forEach(item => {
            const li = document.createElement('li');
            li.className = 'p-2 border rounded';
            li.textContent = item.name || item.title || '—';
            lists[key].appendChild(li);
          });
        })
        .catch(() => {
          lists[key].innerHTML = '<li class="text-red-500">فشل جلب البيانات</li>';
        });
    }

    // 5. نداء لكل قسم
    Object.keys(endpoints).forEach(fetchAndFill);

    // 6. إظهار/إخفاء نموذج إضافة الأدمن
    document.getElementById('toggle-add-admin').addEventListener('click', () => {
      document.getElementById('add-admin-form').classList.toggle('hidden');
    });
  </script>
</body>
</html>
