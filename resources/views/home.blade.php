<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForYou.cash</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

  {{-- ——— Navigation ——— --}}
  <nav>
    <div class="container nav-container">
      <div class="nav-links">
        <a href="#about">عن التطبيق</a>
        <a href="#features">الخدمات</a>
      </div>
      <h1 class="logo">FORYOU</h1>
    </div>
  </nav>

  {{-- ——— Hero / Download Links ——— --}}
  <section id="download">
    <h2>روابط التنزيل:</h2>
    <div class="store-links">
      <a href="#"><img src="{{ asset('images/appstore.png') }}" alt="App Store"></a>
      <a href="#"><img src="{{ asset('images/googleplay.png') }}" alt="Google Play"></a>
    </div>
  </section>

  {{-- ——— Contact Info & Social ——— --}}
  <section id="contact-info">
    <p>الوصول إلينا :</p>
    <p>سوريا، دمشق</p>
    <p>info@foryou.net</p>
    <p>+963 944 33 2334</p>
    <p>لا تنسى المتابعة على صفحات التواصل الاجتماعي:</p>
    <div class="social-links">
      <a href="#" aria-label="Facebook"><i class="lab la-facebook"></i></a>
      <a href="#" aria-label="Twitter"><i class="lab la-twitter"></i></a>
      <a href="#" aria-label="Instagram"><i class="lab la-instagram"></i></a>
    </div>
  </section>

  {{-- ——— Features ——— --}}
  <section id="features">
    <div class="features-grid">
      <div class="feature-item">
        <h3>سهل الاستخدام</h3>
        <p>يتميز تطبيقنا بسهولة التنقل وتصميمه الواضح، مما يجعل من السهل على المستخدمين العثور على ما يحتاجون إليه.</p>
      </div>
      <div class="feature-item">
        <h3>أداء موثوق</h3>
        <p>يعمل التطبيق بسلاسة مع الحد الأدنى من الأعطال وأوقات تحميل سريعة، مما يوفر تجربة مستخدم مستقرة.</p>
      </div>
      <div class="feature-item">
        <h3>أمان قوي</h3>
        <p>نعطي الأولوية لحماية البيانات من خلال تدابير أمنية قوية وتحديثات منتظمة لضمان سلامة المستخدم.</p>
      </div>
      <div class="feature-item">
        <h3>تجربة تسوق سلسة</h3>
        <p>تم تصميم هذا التطبيق من قبل مطورينا المهرة لتقديم أفضل تجربة للمستخدم وتوفير الوقت لك بفضل ميزاته المدروسة.</p>
      </div>
    </div>
  </section>

  {{-- ——— Call to Action: Download Now ——— --}}
  <section id="cta-download">
    <h2>حمل تطبيقنا الآن</h2>
    <p>احصل على تطبيقنا الآن وافتح عالمًا من تجارب التسوق والبيع السلسة! استمتع بالوصول الفوري إلى المنتجات والمعاملات السريعة والآمنة.</p>
    <div class="store-links">
      <a href="#"><img src="{{ asset('images/appstore.png') }}" alt="App Store"></a>
      <a href="#"><img src="{{ asset('images/googleplay.png') }}" alt="Google Play"></a>
    </div>
  </section>

  {{-- ——— Contact Form ——— --}}
  <section id="contact-form">
    <div class="form-wrapper">
      <h2>تواصل معنا لأي استفسارات أو دعم</h2>
      <form action="#" method="POST">
        @csrf
        <label for="email">الايميل</label>
        <input type="email" name="email" id="email" required placeholder="example@domain.com">

        <label for="name">الاسم</label>
        <input type="text" name="name" id="name" required placeholder="اسمك">

        <label for="subject">الموضوع</label>
        <input type="text" name="subject" id="subject" required placeholder="موضوع الرسالة">

        <label for="message">اكتب الرسالة هنا</label>
        <textarea name="message" id="message" rows="4" required placeholder="رسالتك..."></textarea>

        <button type="submit">أرسل الرسالة</button>
      </form>
    </div>
  </section>

  {{-- ——— Categories ——— --}}
  <section id="categories">
    <h2>فئات التطبيق</h2>
    <div class="categories-grid">
      <div class="category-item">
        <h3>السيارات</h3>
        <p>قم بشراء وبيع السيارات بكل سهولة وسرعة باستخدام تطبيقنا.</p>
      </div>
      <div class="category-item">
        <h3>الألكترونيات</h3>
        <p>قم بشراء وبيع الأجهزة الإلكترونية بسرعة مثل الهواتف وأجهزة الكمبيوتر المحمولة.</p>
      </div>
      <div class="category-item">
        <h3>العقارات</h3>
        <p>قم بشراء وبيع العقارات مثل المنازل والفيلات بكل سهولة من خلال تطبيقنا.</p>
      </div>
      <div class="category-item">
        <h3>الأدوات المنزلية</h3>
        <p>قم بشراء وبيع الأدوات المنزلية بسرعة مثل الأسرة والأرائك وأدوات المطبخ.</p>
      </div>
    </div>
  </section>

  {{-- ——— Footer ——— --}}
  <footer>
    <p>© CopyRight @2024 جميع الحقوق محفوظة - وكالة الرقمية ForYou</p>
    <p><a href="#">الشروط والخصوصية</a></p>
  </footer>

</body>
</html>