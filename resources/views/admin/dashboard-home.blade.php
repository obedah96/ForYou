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
      <p class="mt-2 text-gray-600">obedah</p>
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
    // إظهار/إخفاء نموذج إضافة أدمن جديد
    document.getElementById('toggle-add-admin')
      .addEventListener('click', () => {
        document.getElementById('add-admin-form').classList.toggle('hidden');
      });

    // نقاط النهاية وجمع القوائم
    const endpoints = {
      cars:           'https://foryou.cash/api/cars/latest',
      electrical:    'https://foryou.cash/api/ElectricalAppliances/latest',
      home:          'https://foryou.cash/api/home-appliances/latest',
      realEstates:   'https://foryou.cash/api/real-estates/latest'
    };

    const lists = {
      cars:           document.getElementById('cars-list'),
      electrical:    document.getElementById('electrical-list'),
      home:          document.getElementById('home-appliances-list'),
      realEstates:   document.getElementById('real-estates-list')
    };

    // دالة للمسح ثم التعبئة
    function fetchAndFill(key) {
      axios.get(endpoints[key])
        .then(res => {
          lists[key].innerHTML = ''; // مسح المحتوى القديم
          // نفترض أن الـ API يرجع مصفوفة من الكائنات
          res.data.slice(0, 3).forEach(item => {
            const li = document.createElement('li');
            li.className = 'p-2 border rounded';
            // ابحث هنا عن الخاصية المناسبة للعرض: name أو title إلخ
            li.textContent = item.name || item.title || JSON.stringify(item);
            lists[key].appendChild(li);
          });
        })
        .catch(err => {
          lists[key].innerHTML = '<li class="text-red-500">فشل جلب البيانات</li>';
          console.error(err);
        });
    }

    // استدعاء لكل قسم
    Object.keys(endpoints).forEach(fetchAndFill);
  </script>
</body>
</html>
