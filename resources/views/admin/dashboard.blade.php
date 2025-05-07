<!DOCTYPE html>
<html lang="en" dir="rtl">
<head> … </head>
<body class="bg-black">
  <div class="flex items-center justify-center min-h-screen">
    <form id="login-form" class="gradient-form …">
      …
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
