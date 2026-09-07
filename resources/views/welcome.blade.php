<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SkillMate mempertemukan kamu dengan partner belajar yang tepat.">
    <title>SkillMate — Temukan partner belajar terbaikmu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <style>
        :root { --ink:#10233f; --muted:#637087; --navy:#102a56; --blue:#2765df; --sky:#eaf2ff; --line:#e7edf6; --gold:#ffbd59; }
        * { box-sizing:border-box; }
        html { scroll-behavior:smooth; }
        body { margin:0; color:var(--ink); background:#fff; font-family:'DM Sans',sans-serif; }
        .container { width:min(1150px,calc(100% - 40px)); margin:auto; }
        .navbar { height:78px; display:flex; align-items:center; justify-content:space-between; position:relative; z-index:2; }
        .brand { display:flex; align-items:center; gap:10px; color:var(--ink); text-decoration:none; font-family:'Plus Jakarta Sans',sans-serif; font-size:21px; font-weight:800; }
        .brand-mark { width:34px; height:34px; display:grid; place-items:center; color:#fff; font-size:14px; background:linear-gradient(135deg,#3879ff,#2457c7); border-radius:11px 11px 11px 3px; box-shadow:0 7px 14px #2765df3a; }
        .nav-links { display:flex; gap:29px; align-items:center; }
        .nav-links a { color:#536078; text-decoration:none; font-size:14px; font-weight:600; }
        .nav-actions { display:flex; align-items:center; gap:12px; }
        .btn { display:inline-flex; justify-content:center; align-items:center; gap:9px; border-radius:9px; padding:12px 18px; font-weight:700; font-size:14px; text-decoration:none; transition:.2s ease; }
        .btn:hover { transform:translateY(-2px); }
        .btn-ghost { color:var(--blue); }
        .btn-primary { color:#fff; background:var(--blue); box-shadow:0 10px 19px #2765df38; }
        .hero-shell { overflow:hidden; background:linear-gradient(118deg,#f5f9ff 0%,#eaf3ff 48%,#f7fbff 100%); border-bottom:1px solid #edf3fc; }
        .hero { min-height:580px; display:grid; grid-template-columns:1.02fr .98fr; align-items:center; gap:40px; padding:58px 0 78px; position:relative; }
        .hero:before, .hero:after { content:''; position:absolute; border:1px solid #cfe0fc; border-radius:50%; pointer-events:none; }
        .hero:before { width:460px;height:460px;right:-135px;top:18px; } .hero:after { width:680px;height:680px;right:-235px;top:-92px; }
        .eyebrow { display:inline-flex; align-items:center; gap:8px; padding:7px 11px; color:#2560ce; background:#e4efff; border:1px solid #cce0ff; border-radius:100px; font-size:12px; font-weight:700; letter-spacing:.02em; }
        .eyebrow i { font-size:10px; }
        h1,h2,h3 { font-family:'Plus Jakarta Sans',sans-serif; letter-spacing:-.04em; }
        h1 { max-width:600px; margin:19px 0; font-size:clamp(38px,5vw,59px); line-height:1.13; font-weight:800; }
        h1 span { color:var(--blue); }
        .hero-copy { max-width:505px; color:var(--muted); font-size:17px; line-height:1.7; margin:0 0 27px; }
        .hero-buttons { display:flex; flex-wrap:wrap; gap:12px; }
        .btn-lg { padding:14px 20px; border-radius:10px; font-size:15px; } .btn-outline { color:#244472; background:#fff; border:1px solid #d9e3f0; }
        .trust { display:flex; align-items:center; gap:12px; margin-top:30px; color:#68758a; font-size:13px; font-weight:600; }
        .faces { display:flex; padding-left:6px; } .faces span { display:grid; place-items:center; width:27px; height:27px; margin-left:-6px; color:#fff; border:2px solid #f1f7ff; border-radius:50%; font-size:10px; font-weight:700; }
        .faces span:nth-child(1){background:#ff8f70}.faces span:nth-child(2){background:#775be7}.faces span:nth-child(3){background:#24a68a}.faces span:nth-child(4){background:#4a79ce}
        .hero-visual { position:relative; z-index:1; min-height:390px; }
        .dashboard { position:absolute; inset:17px 0 0 15px; padding:21px; background:#fff; border:1px solid #dce8f7; border-radius:20px; box-shadow:0 28px 50px #2f5a8f24; transform:rotate(1.3deg); }
        .dash-head { display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid var(--line); padding-bottom:15px; } .dash-brand { font-weight:800;font-size:13px; }.dot { width:8px;height:8px;border-radius:50%;background:#31c48d;display:inline-block;margin-right:5px; }.dash-menu { display:flex;gap:6px;}.dash-menu i{width:20px;height:4px;background:#dfe8f3;border-radius:5px;}
        .dash-body { display:grid;grid-template-columns:43% 1fr;gap:19px;padding-top:20px; }.profile-card,.suggestions { background:#f7faff;border-radius:13px;padding:15px; }.mini-person { width:44px;height:44px;border-radius:14px;background:linear-gradient(145deg,#f7ad76,#b96855);display:grid;place-items:end center;color:#fff;overflow:hidden;font-size:28px; }.profile-card h3{margin:10px 0 2px;font-size:13px;letter-spacing:0}.profile-card p{margin:0;color:#7a8699;font-size:10px}.tag{display:inline-block;background:#e6efff;color:#3967bd;padding:5px 7px;border-radius:5px;font-size:9px;font-weight:700;margin:11px 3px 0 0}.progress{height:6px;border-radius:5px;background:#dbe7f8;margin-top:16px;overflow:hidden}.progress span{display:block;width:72%;height:100%;background:#3675ec;border-radius:5px}.suggestions h3{font-size:12px;letter-spacing:0;margin:0 0 11px}.person-row{display:flex;align-items:center;gap:8px;margin:9px 0}.avatar{width:27px;height:27px;border-radius:9px;display:grid;place-items:center;color:white;font-size:11px;font-weight:700}.avatar.a{background:#6559d8}.avatar.b{background:#eb8665}.avatar.c{background:#1eaa8a}.person-row b{font-size:10px;display:block}.person-row small{color:#8490a2;font-size:9px}.match{margin-left:auto;color:#2a9b72;background:#ddf6ec;padding:4px 5px;border-radius:5px;font-size:8px;font-weight:800}.float-card { position:absolute; background:#fff; border:1px solid #e1ebf7; border-radius:12px; box-shadow:0 14px 30px #193d7117; z-index:2; }.float-card.match-card{right:-24px;top:0;padding:12px 15px;font-size:11px}.match-card strong{display:block;font-size:15px;margin-top:3px}.float-card.course-card{left:-18px;bottom:2px;padding:11px 14px;display:flex;align-items:center;gap:9px}.course-icon{width:31px;height:31px;display:grid;place-items:center;color:#f09134;background:#fff1db;border-radius:9px}.course-card b{font-size:11px;display:block}.course-card small{font-size:9px;color:#8490a2}
        .stats-wrap { margin-top:-35px; position:relative; z-index:3; }.stats { display:grid; grid-template-columns:repeat(3,1fr); background:#fff; border:1px solid #e7edf6; border-radius:15px; box-shadow:0 14px 32px #203b6410; }.stat { padding:22px 35px; display:flex;align-items:center;gap:14px; border-right:1px solid #e8eef6; }.stat:last-child{border:0}.stat-icon{width:41px;height:41px;display:grid;place-items:center;border-radius:11px;color:#2765df;background:#eaf2ff}.stat b{display:block;font-size:20px;font-family:'Plus Jakarta Sans',sans-serif}.stat span{color:#758196;font-size:12px}
        .section { padding:98px 0; }.section-heading { max-width:590px;text-align:center;margin:0 auto 47px; }.section-heading .eyebrow{font-size:11px}.section-heading h2 { font-size:36px;line-height:1.22;margin:16px 0 12px; }.section-heading p{color:var(--muted);line-height:1.65;margin:0;font-size:15px}.steps{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;position:relative}.step{padding:27px;background:#fff;border:1px solid #e7edf6;border-radius:16px;transition:.25s;}.step:hover{transform:translateY(-5px);box-shadow:0 16px 32px #1d406a12}.step-num{display:inline-grid;place-items:center;width:31px;height:31px;border-radius:9px;color:#2460d6;background:#eaf2ff;font-size:13px;font-weight:800}.step:nth-child(2) .step-num{color:#d57916;background:#fff1dc}.step:nth-child(3) .step-num{color:#168766;background:#dff8ef}.step h3{font-size:17px;margin:20px 0 9px;letter-spacing:-.02em}.step p{color:var(--muted);font-size:14px;line-height:1.6;margin:0}.quote-section{background:#f7faff;padding:82px 0}.quote-grid{display:grid;grid-template-columns:.9fr 1.1fr;gap:70px;align-items:center}.quote-grid h2{text-align:left;margin:14px 0;font-size:35px}.quote-grid p{color:var(--muted);line-height:1.7;font-size:15px}.quote-card{background:#fff;padding:32px;border-radius:18px;border:1px solid #e3ebf7;box-shadow:0 15px 33px #34527d0d}.quote-mark{color:#4780ed;font-size:35px;line-height:.6}.quote-card blockquote{font-family:'Plus Jakarta Sans',sans-serif;font-size:19px;line-height:1.55;margin:16px 0 22px}.quote-author{display:flex;align-items:center;gap:10px}.quote-author .avatar{width:38px;height:38px;border-radius:12px;background:#b6775f}.quote-author b{font-size:13px;display:block}.quote-author span{font-size:11px;color:#8490a2}
        .cta { padding:78px 0; }.cta-box{text-align:center;color:#fff;background:linear-gradient(118deg,#173d82,#2765df);padding:60px 25px;border-radius:22px;position:relative;overflow:hidden}.cta-box:before,.cta-box:after{content:'';position:absolute;width:260px;height:260px;border:1px solid #ffffff32;border-radius:50%}.cta-box:before{left:-110px;bottom:-160px}.cta-box:after{right:-100px;top:-155px}.cta-box>*{position:relative}.cta-box h2{font-size:34px;margin:0 0 12px}.cta-box p{margin:0 auto 25px;opacity:.84;max-width:465px;line-height:1.6}.cta-box .btn{background:#fff;color:#2457bb}.footer{border-top:1px solid #edf0f5;padding:30px 0;color:#79859a;font-size:13px}.footer-inner{display:flex;justify-content:space-between;align-items:center}.footer .brand{font-size:16px}.footer .brand-mark{width:27px;height:27px;border-radius:8px;font-size:11px}
        @media(max-width:800px){.nav-links{display:none}.hero{grid-template-columns:1fr;padding:54px 0 65px;gap:25px}.hero-visual{min-height:345px;max-width:500px;width:94%;margin:auto}.dashboard{inset:10px 0 0}.stats{grid-template-columns:1fr}.stat{border-right:0;border-bottom:1px solid #e8eef6}.stat:last-child{border:0}.section{padding:70px 0}.steps,.quote-grid{grid-template-columns:1fr;gap:16px}.quote-grid{gap:30px}.quote-grid h2{text-align:left}.section-heading h2,.cta-box h2{font-size:29px}.footer-inner{gap:17px;align-items:flex-start;flex-direction:column}.float-card.match-card{right:-12px}.dash-body{gap:10px;padding-top:12px}.dashboard{padding:15px}.profile-card,.suggestions{padding:11px}}
        @media(max-width:480px){.container{width:min(100% - 28px,1150px)}.navbar{height:69px}.btn-ghost{display:none}.nav-actions{gap:0}.nav-actions .btn-primary{padding:10px 13px}h1{font-size:37px}.hero-copy{font-size:15px}.hero-visual{min-height:300px}.dashboard{transform:none}.course-card{left:-5px!important}.match-card{right:-6px!important}.stats-wrap{margin-top:-25px}.stat{padding:17px 20px}.quote-card{padding:24px}.cta-box{padding:48px 17px}.cta{padding:55px 0}}
    </style>
</head>
<body>
    <div class="hero-shell">
        <nav class="container navbar">
            <a class="brand" href="/"><span class="brand-mark"><i class="fa-solid fa-sparkles"></i></span>SkillMate</a>
            <div class="nav-links"><a href="#cara-kerja">Cara kerja</a><a href="#komunitas">Komunitas</a><a href="#tentang">Tentang kami</a></div>
            <div class="nav-actions">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a class="btn btn-ghost" href="{{ route('admin.dashboard') }}">Admin</a>
                    @endif
                    <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard <i class="fa-solid fa-arrow-right"></i></a>
                @else
                    <a class="btn btn-ghost" href="{{ route('login') }}">Masuk</a><a class="btn btn-primary" href="{{ route('register') }}">Mulai belajar <i class="fa-solid fa-arrow-right"></i></a>
                @endauth
            </div>
        </nav>
        <main class="container hero">
            <div>
                <span class="eyebrow"><i class="fa-solid fa-circle-check"></i> Ruang tumbuh untuk semua pembelajar</span>
                <h1>Belajar lebih seru, <span>bertumbuh bersama.</span></h1>
                <p class="hero-copy">Temukan partner belajar yang sejalan dengan tujuanmu. Berbagi keahlian, membangun kebiasaan, dan capai progres nyata bersama komunitas.</p>
                <div class="hero-buttons"><a href="{{ route('register') }}" class="btn btn-primary btn-lg">Cari partner belajar <i class="fa-solid fa-arrow-right"></i></a><a href="#cara-kerja" class="btn btn-outline btn-lg"><i class="fa-regular fa-circle-play"></i> Lihat cara kerja</a></div>
                <div class="trust"><div class="faces"><span>AR</span><span>NA</span><span>DI</span><span>+2</span></div><span>Bergabung dengan pembelajar lainnya</span></div>
            </div>
            <div class="hero-visual" aria-label="Ilustrasi dashboard SkillMate">
                <div class="float-card match-card"><span class="dot"></span>Partner yang cocok<strong>98% Match</strong></div>
                <div class="dashboard"><div class="dash-head"><span class="dash-brand">Good morning, Agus!</span><span class="dash-menu"><i></i><i></i><i></i></span></div><div class="dash-body"><div class="profile-card"><div class="mini-person"><i class="fa-solid fa-user"></i></div><h3> Agus Rahma</h3><p>UI/UX Explorer</p><span class="tag">Figma</span><span class="tag">Design</span><div class="progress"><span></span></div></div><div class="suggestions"><h3>Rekomendasi partner</h3><div class="person-row"><span class="avatar a">DK</span><span><b>Dimas Iman Ismail</b><small>Product Design</small></span><span class="match">96%</span></div><div class="person-row"><span class="avatar b">SP</span><span><b>Salsa Putri</b><small>UI Design</small></span><span class="match">92%</span></div><div class="person-row"><span class="avatar c">RN</span><span><b>Raka Nugraha</b><small>UX Research</small></span><span class="match">89%</span></div></div></div></div>
                <div class="float-card course-card"><span class="course-icon"><i class="fa-solid fa-book-open"></i></span><span><b>Belajar bareng minggu ini</b><small>3 sesi terjadwal</small></span></div>
            </div>
        </main>
    </div>

    <div class="container stats-wrap"><section class="stats" aria-label="Statistik SkillMate"><div class="stat"><span class="stat-icon"><i class="fa-solid fa-users"></i></span><div><b>{{ number_format($totalUsers) }}+</b><span>Pembelajar aktif</span></div></div><div class="stat"><span class="stat-icon"><i class="fa-solid fa-layer-group"></i></span><div><b>{{ number_format($totalSkills) }}+</b><span>Keahlian tersedia</span></div></div><div class="stat"><span class="stat-icon"><i class="fa-solid fa-handshake"></i></span><div><b>{{ number_format($totalPartners) }}+</b><span>Koneksi terbangun</span></div></div></section></div>

    <section id="cara-kerja" class="section"><div class="container"><div class="section-heading"><span class="eyebrow">MUDAH DIMULAI</span><h2>Dari tujuan kecil, jadi progres yang berarti.</h2><p>SkillMate membuat proses menemukan teman belajar terasa sederhana dan personal.</p></div><div class="steps"><article class="step"><span class="step-num">01</span><h3>Ceritakan tujuanmu</h3><p>Tambahkan kemampuan yang ingin kamu kembangkan dan keahlian yang ingin kamu bagikan.</p></article><article class="step"><span class="step-num">02</span><h3>Temukan partner yang pas</h3><p>Jelajahi profil pembelajar dengan minat dan target yang selaras denganmu.</p></article><article class="step"><span class="step-num">03</span><h3>Belajar dan bertumbuh</h3><p>Atur sesi, saling memberi dukungan, lalu rayakan setiap kemajuan bersama.</p></article></div></div></section>

    <section id="komunitas" class="quote-section"><div class="container quote-grid"><div><span class="eyebrow">KOMUNITAS YANG SUPORTIF</span><h2>Karena proses belajar tidak harus sendirian.</h2><p>Di SkillMate, setiap keahlian bisa menjadi pintu untuk terhubung. Temukan energi baru dari orang-orang yang juga ingin berkembang.</p></div><article class="quote-card"><div class="quote-mark">“</div><blockquote>Aku jadi lebih konsisten belajar karena punya partner yang saling mengingatkan. Rasanya seperti punya tim kecil untuk mengejar mimpi.</blockquote><div class="quote-author"><span class="avatar">AP</span><span><b>Dimas Iman Ismail</b><span>UI/UX Design learner</span></span></div></article></div></section>

    <section id="tentang" class="cta"><div class="container"><div class="cta-box"><h2>Siap menemukan teman bertumbuhmu?</h2><p>Buat profilmu hari ini dan mulailah perjalanan belajar yang lebih bermakna.</p><a href="{{ route('register') }}" class="btn btn-lg">Buat akun gratis <i class="fa-solid fa-arrow-right"></i></a></div></div></section>
    <footer class="footer"><div class="container footer-inner"><a class="brand" href="/"><span class="brand-mark"><i class="fa-solid fa-sparkles"></i></span>SkillMate</a><span>&copy; {{ date('Y') }} SkillMate. Belajar, berbagi, bertumbuh.</span></div></footer>
</body>
</html>
