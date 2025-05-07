<!DOCTYPE html>
<html lang="en" dir="rtl">
<head> … </head>
<body class="bg-black">
  <div class="flex items-center justify-center min-h-screen">
    <form id="login-form" class="gradient-form …">
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
    
      <button type="submit" class="w-full …">تسجيل الدخول</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    document.getElementById('login-form')
      .addEventListener('submit', async function(e) {
        e.preventDefault();
        const email    = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const errorBox = document.getElementById('error-message');
        errorBox.style.display = 'none';

        try {
          const res = await axios.post(
            'https://foryou.cash/api/dashboard/login',
            { email, password },
            { headers: { 'Accept':'application/json' } }
          );

          // إذا نجحنا:
          if (res.status === 200 && res.data.token) {
            // 1. خزّن التوكن
            localStorage.setItem('admin_token', res.data.token);
            // 2. أعِد التوجيه إلى dashboard
            window.location.href = "{{ route('dashboard.home') }}";
          }
        } catch (err) {
          if (err.response?.status === 401) {
            errorBox.textContent = 'الإيميل أو كلمة المرور غير صحيحة.';
          } else {
            errorBox.textContent = 'حدث خطأ، حاول مرة أخرى.';
          }
          errorBox.style.display = 'block';
        }
      });
  </script>
</body>
</html>
