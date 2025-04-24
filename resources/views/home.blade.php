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
    <div class="bg-overlay"></div>
    <div class="container hero-container">
      <div class="phones">
        <img src="{{ asset('images/phoneback.jpeg') }}"  alt="Phone Back"  class="phone-back">
        <img src="{{ asset('images/phonefront.jpeg') }}" alt="Phone Front" class="phone-front">
      </div>
      
    </div>
    <div class="hero-content">
        <h2>أفضل طريقة للتواصل مع العملاء</h2>
        <p>اكتشف التطبيق الرائد في سوريا الذي يسمح لك بالتسوّق لجميع المنتجات التي تريدها وبيع منتجاتك الخاصة بكل سهولة.</p>
        <div class="download-buttons">
          <a href="#" class="btn appstore">
            <i class="fab fa-apple"></i> App Store
          </a>
          <a href="#" class="btn googleplay">
            <i class="fab fa-google-play"></i> Google Play
          </a>
        </div>
      </div>
   
  </section>

  {{-- ——— Contact Info & Social ——— --}}
  <section id="contact-info" class="contact-info">
    <div class="container">
      <p>الوصول إلينا :</p>
      <p>سوريا، دمشق</p>
      <p>info@foryou.net</p>
      <p>+963 944 33 2334</p>
      <p>تابعنا على شبكات التواصل الاجتماعي:</p>
      <div class="social-links">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </section>

  {{-- ——— Features ——— --}}
  <section id="features" class="features-section">
    <div class="container features-grid">
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
        <img src="{{ asset('images/phones.jpeg') }}" alt="For You App Phones">
      </div>
    </div>
  </section>

  {{-- ——— Call to Action ——— --}}
  <section id="cta-download" class="cta-section">
    <div class="container">
      <h2>حمل تطبيقنا الآن</h2>
      <p>افتح عالمًا من تجارب التسوّق والبيع السريع والآمن على هاتفك.</p>
      <div class="store-links">
        <a href="#"><img src="{{ asset('images/appstore.png') }}" alt="App Store"></a>
        <a href="#"><img src="{{ asset('images/googleplay.png') }}" alt="Google Play"></a>
      </div>
    </div>
  </section>

  {{-- ——— Contact Form ——— --}}
  <section id="contact-form" class="contact-form">
    <div class="container">
      <h2>تواصل معنا</h2>
      <form action="#" method="POST" class="form-wrapper">
        @csrf
        <label for="email">الايميل</label>
        <input type="email" id="email" name="email" required placeholder="example@domain.com">
        <label for="name">الاسم</label>
        <input type="text" id="name" name="name" required placeholder="اسمك">
        <label for="subject">الموضوع</label>
        <input type="text" id="subject" name="subject" required placeholder="موضوع الرسالة">
        <label for="message">الرسالة</label>
        <textarea id="message" name="message" rows="4" required placeholder="نص الرسالة..."></textarea>
        <button type="submit" class="btn-submit">أرسل الرسالة</button>
      </form>
    </div>
  </section>

  {{-- ——— Categories ——— --}}
  <section id="categories" class="categories-section">
    <div class="container categories-grid">
      <div class="category-item">
        <h3>السيارات</h3>
        <p>شراء وبيع السيارات بسهولة وسرعة.</p>
      </div>
      <div class="category-item">
        <h3>الإلكترونيات</h3>
        <p>هواتف، حواسيب، سماعات وما إلى ذلك.</p>
      </div>
      <div class="category-item">
        <h3>العقارات</h3>
        <p>منازل، فيلات، وشقق للبيع والشراء.</p>
      </div>
      <div class="category-item">
        <h3>الأدوات المنزلية</h3>
        <p>أسرة، أرائك، أدوات مطبخ وأكثر.</p>
      </div>
    </div>
  </section>

  {{-- ——— Footer ——— --}}
  <footer class="footer">
    <div class="container">
      <p>© 2024 ForYou. جميع الحقوق محفوظة.</p>
      <a href="#">الشروط والخصوصية</a>
    </div>
  </footer>

</body>
</html>
