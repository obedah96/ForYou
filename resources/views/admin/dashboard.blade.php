<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>لوحة التحكم</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-black">
  <div class="flex items-center justify-center min-h-screen">
    <form id="login-form" class="gradient-form p-8 rounded-lg shadow-lg w-full max-w-md">
      {{-- no need for @csrf since we’re not submitting to a Laravel route --}}
      <h1 class="text-center text-2xl font-semibold mb-6 text-black">
        أهلا بك في لوحة التحكم
      </h1>

      <div id="error-message" class="mb-4 text-red-500" style="display:none;"></div>

      <div class="mb-4">
        <label for="email" class="block text-black mb-1">الايميل</label>
        <input
          type="email"
          name="email"
          id="email"
          required
          class="w-full px-4 py-2 rounded focus:outline-none"
          placeholder="example@domain.com"
        >
      </div>

      <div class="mb-6">
        <label for="password" class="block text-black mb-1">كلمة المرور</label>
        <input
          type="password"
          name="password"
          id="password"
          required
          class="w-full px-4 py-2 rounded focus:outline-none"
          placeholder="••••••••"
        >
      </div>

      <button
        type="submit"
        class="w-full py-2 rounded text-white bg-black hover:opacity-90 transition"
      >
        تسجيل الدخول
      </button>
    </form>
  </div>

  {{-- Axios CDN for easy JSON POSTs --}}
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    document
      .getElementById('login-form')
      .addEventListener('submit', async function(e) {
        e.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const errorBox = document.getElementById('error-message');
        errorBox.style.display = 'none';
        errorBox.textContent = '';

        try {
          const res = await axios.post('https://foryou.cash/api/dashboard/login', {
            email, password
          }, {
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            }
          });

          if (res.status === 200) {
            // Redirect to your Blade page route
            window.location.href = "{{ route('dashboard.home') }}";
          }
        } catch (err) {
          // If API returns 401, show a friendly message
          if (err.response && err.response.status === 401) {
            errorBox.textContent = 'خطأ: البريد الإلكتروني أو كلمة المرور غير صحيحة.';
            errorBox.style.display = 'block';
          } else {
            // network or other errors
            errorBox.textContent = 'حدث خطأ. الرجاء المحاولة لاحقاً.';
            errorBox.style.display = 'block';
          }
        }
      });
  </script>
</body>
</html>
