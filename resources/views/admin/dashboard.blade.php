<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>تسجيل دخول لوحة التحكم</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
</head>
<body class="bg-black flex items-center justify-center min-h-screen">
    <form id="login-form"
          class="gradient-form p-8 rounded-lg shadow-lg w-full max-w-md bg-white">
        <h1 class="text-center text-2xl font-semibold mb-6 text-black">
            أهلاً بك في لوحة التحكم
        </h1>

        <div id="error-message" class="mb-4 text-red-500 hidden"></div>

        <div class="mb-4">
            <label for="email" class="block text-black mb-1">الإيميل</label>
            <input type="email" id="email" required
                   class="w-full px-4 py-2 rounded focus:outline-none"
                   placeholder="example@domain.com">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-black mb-1">كلمة المرور</label>
            <input type="password" id="password" required
                   class="w-full px-4 py-2 rounded focus:outline-none"
                   placeholder="••••••••">
        </div>

        <button type="submit"
                class="w-full py-2 rounded text-white bg-black hover:opacity-90 transition">
            تسجيل الدخول
        </button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
      document.getElementById('login-form')
        .addEventListener('submit', async function(e) {
          e.preventDefault();

          const email    = document.getElementById('email').value;
          const password = document.getElementById('password').value;
          const errorBox = document.getElementById('error-message');

          errorBox.classList.add('hidden');
          errorBox.textContent = '';

          try {
            const res = await axios.post(
              'https://foryou.cash/api/dashboard/login',
              { email, password },
              { headers: { 'Accept':'application/json' } }
            );

            if (res.status === 200 && res.data.token) {
              // 1. خزّن التوكن والإيميل
              localStorage.setItem('admin_token', res.data.token);
              localStorage.setItem('admin_email', email);
              // 2. أعِد التوجيه لصفحة لوحة التحكم
              window.location.href = "{{ route('dashboard.home') }}";
            }
          } catch (err) {
            if (err.response?.status === 401) {
              errorBox.textContent = 'الإيميل أو كلمة المرور غير صحيحة.';
            } else {
              errorBox.textContent = 'حدث خطأ، حاول مرة أخرى.';
            }
            errorBox.classList.remove('hidden');
          }
        });
    </script>
</body>
</html>
