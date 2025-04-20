<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="{{ asset('resources/css/admin.css') }}">
</head>
<body class="bg-black">
    <div class="flex items-center justify-center min-h-screen">
        <form action="#" method="POST"
              class="gradient-form p-8 rounded-lg shadow-lg w-full max-w-md">
            @csrf
            <h1 class="text-center text-2xl font-semibold mb-6 text-black">
                أهلا بك في لوحة التحكم
            </h1>

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
</body>
</html>