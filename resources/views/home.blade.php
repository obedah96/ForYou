<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ForYou.cash</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  {{-- تأكد من تضمين Font Awesome إذا كنت تستخدمه --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="..." crossorigin="anonymous">
</head>
<body>

  {{-- ——— Navigation ——— --}}
  <nav class="navbar">
    <div class="container nav-container">
      <h1 class="logo">FORYOU</h1>
      <div class="nav-links">
        <a href="#features">الخدمات</a>
        <a href="#contact-info">تواصل معنا</a>
      </div>
    </div>
  </nav>

    {{-- ——— Contact Hero ——— --}}
    <section class="contact-hero">
    <div class="container hero-container">
        {{-- ——— Left: one phone image ——— --}}
        <div class="phones">
        <img src="{{ asset('images/phone-side.jpeg') }}"
            alt="For You App Phone"
            class="phone-side">
        </div>

        {{-- ——— Right: content ——— --}}
        <div class="hero-content">
        <h2>أفضل طريقة للتواصل مع العملاء</h2>
        <p>
            اكتشف التطبيق الرائد في سوريا الذي يسمح لك بالتسوّق لجميع المنتجات التي تريدها
            وبيع منتجاتك الخاصة بكل سهولة.
        </p>
        <div class="download-buttons">
            <a href="#" class="btn appstore">
            <i class="fab fa-apple"></i> App Store
            </a>
            <a href="#" class="btn googleplay">
            <i class="fab fa-google-play"></i> Google Play
            </a>
        </div>
        </div>
    </div>
    </section>

    <section id="features" class="features-section">
  <div class="container features-grid">

    <div class="feature-item">
      <div class="icon-wrapper">
        <i class="fa-solid fa-mobile-screen-button"></i>
      </div>
      <h3>سهل الاستخدام</h3>
      <p>يتميز تطبيقنا بسهولة التنقل وتصميمه الواضح، مما يجعل من السهل على المستخدمين العثور على ما يحتاجون إليه.</p>
    </div>

    <div class="feature-item">
      <div class="icon-wrapper">
        <i class="fa-solid fa-chart-line-up"></i>
      </div>
      <h3>أداء موثوق</h3>
      <p>يعمل التطبيق بسلاسة مع الحد الأدنى من الأعطال وأوقات تحميل سريعة، مما يوفر تجربة مستخدم مستقرة.</p>
    </div>

    <div class="feature-item">
      <div class="icon-wrapper">
        <i class="fa-solid fa-lock"></i>
      </div>
      <h3>أمان قوي</h3>
      <p>نعطي الأولوية لحماية البيانات من خلال تدابير أمنية قوية وتحديثات منتظمة لضمان سلامة المستخدم.</p>
    </div>

  </div>
</section>

  

  {{-- ——— Shopping Experience ——— --}}
  <section class="shopping-experience">
    <div class="overlay-shape"></div>
    <div class="container shop-container">
      <div class="shop-content">
        <h2>تجربة تسوّق سلسة</h2>
        <p>تم تصميم هذا التطبيق من قبل مطورينا المهرة لتقديم أفضل تجربة للمستخدم وتوفير الوقت لك بفضل ميزاته المدروسة.</p>
        <ul class="features-list">
          <li>مجاني تمامًا بدون أي رسوم.</li>
          <li>أضف عناصر بسهولة وتواصل مع جمهور أوسع.</li>
          <li>تصفية متقدمة للعثور على المنتجات المثالية.</li>
          <li>معلومات مفصلة لاتخاذ قرارات سريعة ومستنيرة.</li>
          <li>واجهة سهلة الاستخدام تُعزّز رحلة التسوّق الخاصة بك.</li>
        </ul>
      </div>
      <div class="phones-single">
        <img src="{{ asset('images/phones.jpeg') }}" alt="For You App Phones" class="phones-image">
      </div>
    </div>
  </section>

        {{-- ——— Call to Action ——— --}}
    <section id="cta-download" class="cta-section">
        {{-- الجزء العلوي --}}
        <div class="cta-top">
            <div class="container text-center">
            <h2>حمل تطبيقنا الآن</h2>
            <p>
                احصل على تطبيقنا الآن وافتح عالمًا من تجارب التسوق والبيع السلسة! 
                استمتع بالوصول الفوري إلى المنتجات والمعاملات السريعة والآمنة.
            </p>
            </div>
        </div>

        {{-- الجزء السفلي المنحني --}}
        <div class="cta-bottom">
            <div class="container buttons-container">
            <a href="#" class="btn-store">
                <span class="btn-label">حمل من :</span>
                <i class="fab fa-apple"></i>
                <span>App Store</span>
            </a>
            <a href="#" class="btn-store">
                <span class="btn-label">حمل من :</span>
                <i class="fab fa-google-play"></i>
                <span>Google Play</span>
            </a>
            </div>
        </div>
    </section>

    {{-- ——— Categories ——— --}}
    <section id="categories" class="categories-section">
    <div class="container">
        {{-- عنوان وشرح --}}
        <div class="categories-header text-center">
        <h2>فئات التطبيق</h2>
        <p>
            استكشف الفئات الواسعة في تطبيقنا، من الإلكترونيات إلى الأدوات المنزلية، وابحث 
            عن ما تحتاجه بالضبط.
        </p>
        </div>

        {{-- المحتوى الرئيسي: عمودان جانبيان مع صورة في الوسط --}}
        <div class="categories-content">
        {{-- العمود الأيسر --}}
        <div class="categories-col">
            <div class="category-item">
            <div class="icon"><img src="{{ asset('images/estate.png') }}" alt=""></div>
            <div class="text">
                <h3>العقارات</h3>
                <p>قم بشراء وبيع العقارات مثل المنازل والفيلات بكل سهولة من خلال تطبيقنا.</p>
            </div>
            </div>
            <div class="category-item">
            <div class="icon"><img src="{{ asset('images/housewares.png') }}" alt=""></div>
            <div class="text">
                <h3>الأدوات المنزلية</h3>
                <p>قم بشراء وبيع الأدوات المنزلية بسرعة وسلاسة باستخدام تطبيقنا.</p>
            </div>
            </div>
        </div>

        {{-- العمود الأوسط: صورة الهاتف --}}
        <div class="categories-col phone-col">
            <img src="{{ asset('images/phone-mid.jpeg') }}" alt="App Phone">
        </div>

        {{-- العمود الأيمن --}}
        <div class="categories-col">
            <div class="category-item">
            <div class="icon"><img src="{{ asset('images/cars.png') }}" alt=""></div>
            <div class="text">
                <h3>السيارات</h3>
                <p>قم بشراء وبيع السيارات بكل سهولة وسرعة باستخدام تطبيقنا.</p>
            </div>
            </div>
            <div class="category-item">
            <div class="icon"><img src="{{ asset('images/electronic.png') }}" alt=""></div>
            <div class="text">
                <h3>الإلكترونيات</h3>
                <p>قم بشراء وبيع الأجهزة الإلكترونية مثل الهواتف والحواسيب بسرعة وسهولة.</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="promo-section">
        <div class="container">
            
            <!-- يسار: الشعار والصور الصغيرة -->
            <div class="promo-left">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="logo-img">
            <div class="bottom-phones">
                <img src="{{ asset('images/phone-side.jpeg') }}" alt="Phone 1">
                
            </div>
            </div>

            <!-- وسط: العنوان والأزرار -->
            <div class="promo-center">
            <h1>قريباً!</h1>
            <h2>باقات الإعلانية</h2>
            <h3>عمليات بيع أسرع</h3>
            <p class="download-text">حمل التطبيق الآن</p>
            <div class="download-buttons">
                <a href="#" class="btn appstore"><i class="fab fa-apple"></i> App Store</a>
                <a href="#" class="btn googleplay"><i class="fab fa-google-play"></i> Google Play</a>
            </div>
            </div>

            <!-- يمين: صورة الهاتف الكبيرة -->
            <div class="promo-right">
            <img src="{{ asset('images/promo-side.jpeg') }}" alt="Main Phone" class="main-phone-img">
            </div>
            
        </div>
    </section>

        <section id="contact-form" class="contact-section">
        <div class="container contact-container">

            <!-- اليسار: صورة -->
            <div class="contact-image">
            <img src="{{ asset('images/contact.png') }}" alt="Contact">
            </div>

            <!-- اليمين: المحتوى والنموذج -->
            <div class="contact-content">
            <h2>التواصل</h2>
            <p class="intro">
                تواصل معنا لأي استفسارات أو تعليقات أو دعم، نحن هنا لمساعدتك!
            </p>

            <form action="#" method="POST" class="form-wrapper">
                @csrf

                <div class="row two-cols">
                <input type="text" name="name" id="name" placeholder="الاسم" required>
                <input type="email" name="email" id="email" placeholder="الايميل" required>
                </div>

                <div class="row">
                <input type="text" name="subject" id="subject" placeholder="الموضوع" required>
                </div>

                <div class="row">
                <textarea name="message" id="message" rows="6" placeholder="اكتب الرسالة هنا" required></textarea>
                </div>

                <div class="row">
                <button type="submit" class="btn-submit">أرسل الرسالة</button>
                </div>
            </form>
            </div>

        </div>
    </section>

    <section class="footer-section">
  <div class="container footer-grid">

    {{-- LEFT: Download Links & QR --}}
    <div class="footer-col footer-left">
      <div class="footer-title">روابط التنزيل:</div>
      <div class="download-buttons">
        <a href="#" class="btn appstore">
          <span class="btn-small">حمل من :</span>
          <i class="fab fa-apple"></i> App Store
        </a>
        <a href="#" class="btn googleplay">
          <span class="btn-small">حمل من :</span>
          <i class="fab fa-google-play"></i> Google Play
        </a>
      </div>
      <div class="qr-codes">
        <img src="{{ asset('images/qr-appstore.png') }}" alt="QR App Store">
        <img src="{{ asset('images/qr-googleplay.png') }}" alt="QR Google Play">
      </div>
      <a href="#" class="btn direct-download">
        <i class="fas fa-download"></i> تحميل مباشر
      </a>
    </div>

    {{-- CENTER: Contact Info --}}
    <div class="footer-col footer-center">
      <div class="footer-title">الوصول إلينا :</div>
      <p>العنوان: سوريا، دمشق</p>
      <p>info@foryou.net</p>
      <p>+963 944 33 2334</p>
    </div>

    {{-- RIGHT: Logo & Social --}}
    <div class="footer-col footer-right">
      <img src="{{ asset('images/logo.jpeg') }}" alt="For You" class="footer-logo">
      <div class="social-text">لا تنسى المتابعة على الصفحات التواصل الاجتماعي:</div>
      <div class="social-links">
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
      </div>
      <div class="footer-legal">
        <a href="#">الشروط والخصوصية</a>
        <p>© 2024 ForYou. جميع الحقوق محفوظة.</p>
      </div>
    </div>

  </div>
</section>


</body>
</html>
