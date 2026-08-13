<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GUI | Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            font-family: "Segoe UI", Arial, Helvetica, sans-serif;
        }

        body {
            overflow: hidden;
        }

        /* =========================================================
           HALAMAN UTAMA
        ========================================================= */

        .login-page {
            width: 100%;
            height: 100vh;
            min-height: 650px;

            position: relative;
            overflow: hidden;

            /* GAMBAR YANG KAMU MASUKKAN */
            background-image: url("{{ asset('images/container.jpeg') }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }


        /* =========================================================
           LAPISAN PUTIH TIPIS DI BAGIAN KIRI
           Supaya tulisan mudah dibaca tetapi foto tetap terlihat
        ========================================================= */

        .login-page::before {
            content: "";
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.18) 0%,
                    rgba(255, 255, 255, 0.04) 48%,
                    rgba(255, 255, 255, 0) 75%
                );

            z-index: 0;
            pointer-events: none;
        }


        /* =========================================================
           AKSEN MERAH POJOK ATAS
        ========================================================= */

        .red-corner-top {
            position: absolute;

            top: -115px;
            left: -100px;

            width: 350px;
            height: 220px;

            background: #d71920;

            transform: rotate(-42deg);

            z-index: 2;
        }

        .white-line-top {
            position: absolute;

            top: -55px;
            left: -90px;

            width: 350px;
            height: 7px;

            background: #ffffff;

            transform: rotate(-42deg);

            z-index: 3;
        }


        /* =========================================================
           AKSEN MERAH POJOK BAWAH
        ========================================================= */

        .red-corner-bottom {
            position: absolute;

            right: -150px;
            bottom: -130px;

            width: 560px;
            height: 270px;

            background: #d71920;

            transform: rotate(-25deg);

            z-index: 2;
        }

        .white-line-bottom {
            position: absolute;

            right: -130px;
            bottom: 45px;

            width: 520px;
            height: 7px;

            background: #ffffff;

            transform: rotate(-25deg);

            z-index: 3;
        }


        /* =========================================================
           LAYOUT UTAMA
        ========================================================= */

        .content {
            position: relative;
            z-index: 5;

            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 50px;

            padding: 45px 6%;
        }


        /* =========================================================
           BAGIAN KIRI
        ========================================================= */

        .left-content {
            width: calc(100% - 550px);
            max-width: 700px;

            padding-left: 25px;

            color: #172033;
        }


        /* =========================================================
           JUDUL
        ========================================================= */

        .system-title {
            margin-bottom: 20px;
        }

        .system-title h1 {
            font-size: clamp(42px, 4vw, 58px);

            line-height: 1.05;

            font-weight: 800;

            letter-spacing: -2px;

            text-transform: uppercase;

            color: #172033;

            text-shadow:
                0 2px 4px rgba(255,255,255,0.55);
        }

        .system-title h1 span {
            color: #d71920;
        }

        .system-subtitle {
            margin-top: 12px;

            font-size: 17px;

            font-weight: 500;

            color: #293142;
        }

        .title-line {
            width: 80px;
            height: 4px;

            margin-top: 18px;

            background: #d71920;

            border-radius: 20px;
        }


        /* =========================================================
           DESKRIPSI
        ========================================================= */

        .description {
            max-width: 520px;

            margin-top: 25px;

            color: #293142;

            font-size: 15px;

            line-height: 1.7;

            font-weight: 500;

            text-shadow:
                0 1px 3px rgba(255,255,255,0.7);
        }


        /* =========================================================
           FITUR
        ========================================================= */

        .features {
            display: flex;

            gap: 15px;

            margin-top: 38px;

            max-width: 620px;

            padding: 18px 20px;

            border-radius: 15px;

            background: rgba(23, 32, 51, 0.82);

            box-shadow:
                0 15px 35px rgba(0,0,0,0.20);

            backdrop-filter: blur(8px);
        }

        .feature {
            flex: 1;

            display: flex;

            align-items: center;

            gap: 10px;

            min-width: 0;
        }

        .feature-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            color: white;

            font-size: 19px;

            background: rgba(215, 25, 32, 0.25);

            border: 1px solid rgba(215, 25, 32, 0.9);
        }

        .feature-text h3 {
            font-size: 11px;

            color: white;

            margin-bottom: 4px;

            line-height: 1.2;
        }

        .feature-text p {
            font-size: 9px;

            color: rgba(255,255,255,0.78);

            line-height: 1.35;
        }


        /* =========================================================
           LOGIN CARD
        ========================================================= */

        .login-container {
            width: 500px;

            flex-shrink: 0;

            background: rgba(255,255,255,0.97);

            border-radius: 28px;

            padding: 32px 42px 30px;

            box-shadow:
                0 25px 60px rgba(0,0,0,0.30);

            border: 1px solid rgba(255,255,255,0.9);

            backdrop-filter: blur(10px);
        }


        /* =========================================================
           LOGO GUI
           HANYA SATU LOGO
        ========================================================= */

        .login-logo {
            text-align: center;

            margin-bottom: 12px;
        }

        .login-logo img {
            width: 88px;
            height: 88px;

            object-fit: contain;

            display: inline-block;
        }


        /* =========================================================
           HEADER LOGIN
        ========================================================= */

        .login-header {
            text-align: center;

            margin-bottom: 25px;
        }

        .login-header h2 {
            font-size: 29px;

            color: #172033;

            font-weight: 800;
        }

        .login-header h2 span {
            color: #d71920;
        }

        .login-header p {
            margin-top: 7px;

            font-size: 13px;

            color: #7a808c;
        }


        /* =========================================================
           ERROR LOGIN
        ========================================================= */

        .alert {
            background: #fff1f1;

            color: #c81d25;

            border: 1px solid #ffcaca;

            padding: 10px 13px;

            border-radius: 9px;

            font-size: 12px;

            margin-bottom: 18px;
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;

            margin-bottom: 7px;

            font-size: 13px;

            font-weight: 700;

            color: #293142;
        }

        .input-box {
            position: relative;
        }

        .input-icon {
            position: absolute;

            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            color: #d71920;

            font-size: 17px;

            z-index: 2;
        }

        .form-control {
            width: 100%;

            height: 50px;

            padding: 0 45px;

            border-radius: 10px;

            border: 1px solid #d9dde4;

            outline: none;

            font-size: 13px;

            color: #222936;

            background: #ffffff;

            transition: all .2s ease;
        }

        .form-control::placeholder {
            color: #9ba1ad;
        }

        .form-control:focus {
            border-color: #d71920;

            box-shadow:
                0 0 0 3px rgba(215,25,32,0.10);
        }


        /* =========================================================
           PASSWORD EYE
        ========================================================= */

        .password-toggle {
            position: absolute;

            right: 14px;
            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            cursor: pointer;

            color: #8b919c;

            font-size: 16px;
        }

        .password-toggle:hover {
            color: #d71920;
        }


        /* =========================================================
           REMEMBER + FORGOT
        ========================================================= */

        .form-options {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 3px;

            margin-bottom: 23px;
        }

        .remember {
            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 12px;

            color: #6d7480;

            cursor: pointer;
        }

        .remember input {
            width: 17px;
            height: 17px;

            accent-color: #d71920;

            cursor: pointer;
        }

        .forgot {
            color: #d71920;

            text-decoration: underline;

            font-size: 12px;

            font-weight: 600;
        }


        /* =========================================================
           BUTTON LOGIN
        ========================================================= */

        .login-button {
            width: 100%;

            height: 50px;

            border: none;

            border-radius: 26px;

            background: #d71920;

            color: white;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition: all .2s ease;

            box-shadow:
                0 8px 20px rgba(215,25,32,0.25);
        }

        .login-button:hover {
            background: #bd151b;

            transform: translateY(-1px);

            box-shadow:
                0 10px 24px rgba(215,25,32,0.30);
        }

        .login-button:active {
            transform: translateY(0);
        }


        /* =========================================================
           DIVIDER
        ========================================================= */

        .divider {
            display: flex;

            align-items: center;

            gap: 13px;

            margin: 23px 0 17px;

            color: #9298a3;

            font-size: 11px;

            white-space: nowrap;
        }

        .divider::before,
        .divider::after {
            content: "";

            height: 1px;

            background: #e4e6ea;

            flex: 1;
        }


        /* =========================================================
           QUICK LOGIN
        ========================================================= */

        .quick-login {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 10px;
        }

        .quick-button {
            height: 72px;

            border-radius: 13px;

            background: white;

            cursor: pointer;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            gap: 6px;

            font-size: 12px;

            font-weight: 700;

            transition: all .2s ease;
        }

        .quick-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 7px 18px rgba(0,0,0,0.08);
        }

        .quick-icon {
            width: 31px;
            height: 31px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 15px;
        }


        /* ADMIN */

        .admin {
            color: #d71920;

            border: 1px solid #f1d0d0;
        }

        .admin .quick-icon {
            color: #d71920;

            border: 1px solid #d71920;
        }


        /* OPERASIONAL */

        .operasional {
            color: #374151;

            border: 1px solid #dce2ea;
        }

        .operasional .quick-icon {
            color: #1769e0;

            border: 1px solid #a9c8f8;
        }


        /* PIMPINAN */

        .pimpinan {
            color: #374151;

            border: 1px solid #e5d8f5;
        }

        .pimpinan .quick-icon {
            color: #8b3fd4;

            border: 1px solid #cfa8ed;
        }


        /* =========================================================
           RESPONSIVE LAPTOP
        ========================================================= */

        @media (max-width: 1200px) {

            .content {
                padding: 35px 4%;
                gap: 30px;
            }

            .left-content {
                width: calc(100% - 480px);
            }

            .login-container {
                width: 460px;
            }

            .system-title h1 {
                font-size: 43px;
            }

            .features {
                gap: 12px;
                padding: 15px;
            }
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 950px) {

            body {
                overflow: auto;
            }

            .login-page {
                height: auto;
                min-height: 100vh;

                background-position: center;
            }

            .content {
                min-height: 100vh;
                height: auto;

                flex-direction: column;

                justify-content: center;

                padding: 50px 25px;

                gap: 35px;
            }

            .left-content {
                width: 100%;

                max-width: 700px;

                padding-left: 0;

                text-align: center;
            }

            .system-title h1 {
                font-size: 42px;
            }

            .title-line {
                margin-left: auto;
                margin-right: auto;
            }

            .description {
                margin-left: auto;
                margin-right: auto;
            }

            .features {
                margin-left: auto;
                margin-right: auto;
            }

            .login-container {
                width: 100%;

                max-width: 500px;
            }
        }


        /* =========================================================
           HP
        ========================================================= */

        @media (max-width: 560px) {

            .content {
                padding: 30px 15px;
            }

            .system-title h1 {
                font-size: 34px;
            }

            .system-subtitle {
                font-size: 14px;
            }

            .description {
                font-size: 13px;
            }

            .features {
                display: none;
            }

            .login-container {
                padding: 28px 22px;

                border-radius: 22px;
            }

            .login-logo img {
                width: 72px;
                height: 72px;
            }

            .login-header h2 {
                font-size: 24px;
            }

            .quick-login {
                grid-template-columns: 1fr;
            }

            .quick-button {
                height: 52px;

                flex-direction: row;

                gap: 10px;
            }
        }

    </style>
</head>


<body>

<div class="login-page">

    {{-- AKSEN POJOK --}}
    <div class="red-corner-top"></div>
    <div class="white-line-top"></div>

    <div class="red-corner-bottom"></div>
    <div class="white-line-bottom"></div>


    <div class="content">


        {{-- =====================================================
             BAGIAN KIRI
        ====================================================== --}}

        <div class="left-content">

            <div class="system-title">

                <h1>
                    AKSES <span>SISTEM</span>
                </h1>

                <p class="system-subtitle">
                    Admin, Operasional & Pimpinan
                </p>

                <div class="title-line"></div>

            </div>


            <p class="description">
                Sistem informasi terpadu untuk mendukung
                pengelolaan operasional peti kemas secara
                efisien dan terkontrol.
            </p>


            {{-- FITUR --}}

            <div class="features">

                <div class="feature">

                    <div class="feature-icon">
                        ✓
                    </div>

                    <div class="feature-text">

                        <h3>
                            Aman & Terpercaya
                        </h3>

                        <p>
                            Sistem dilengkapi dengan
                            keamanan berlapis.
                        </p>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        ↗
                    </div>

                    <div class="feature-text">

                        <h3>
                            Monitoring Real-Time
                        </h3>

                        <p>
                            Pantau operasional secara
                            real-time dan akurat.
                        </p>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        ⚙
                    </div>

                    <div class="feature-text">

                        <h3>
                            Terintegrasi
                        </h3>

                        <p>
                            Semua proses terhubung
                            dalam satu sistem.
                        </p>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             LOGIN
        ====================================================== --}}

        <div class="login-container">


            {{-- LOGO GUI
                 HANYA SATU LOGO
                 File berada di public/logo.png
            --}}

            <div class="login-logo">

                <img
                    src="{{ asset('logo.png') }}"
                    alt="Logo GUI"
                >

            </div>


            {{-- HEADER LOGIN --}}

            <div class="login-header">

                <h2>
                    Login ke <span>Sistem</span>
                </h2>

                <p>
                    Silakan masuk untuk melanjutkan
                </p>

            </div>


            {{-- ERROR LOGIN --}}

            @if ($errors->any())

                <div class="alert">

                    @foreach ($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            {{-- =================================================
                 FORM LOGIN
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


                {{-- EMAIL --}}

                <div class="form-group">

                    <label
                        class="form-label"
                        for="email"
                    >
                        Email
                    </label>


                    <div class="input-box">

                        <span class="input-icon">
                            ✉
                        </span>


                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            placeholder="Masukkan email Anda"
                            required
                            autofocus
                            autocomplete="email"
                        >

                    </div>

                </div>



                {{-- PASSWORD --}}

                <div class="form-group">

                    <label
                        class="form-label"
                        for="password"
                    >
                        Password
                    </label>


                    <div class="input-box">

                        <span class="input-icon">
                            🔒
                        </span>


                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password Anda"
                            required
                            autocomplete="current-password"
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            id="passwordToggle"
                        >
                            ◉
                        </button>

                    </div>

                </div>



                {{-- INGAT SAYA + LUPA PASSWORD --}}

                <div class="form-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            {{ old('remember') ? 'checked' : '' }}
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot"
                        >
                            Lupa password?
                        </a>

                    @endif

                </div>



                {{-- BUTTON LOGIN --}}

                <button
                    type="submit"
                    class="login-button"
                >
                    ⇥ &nbsp; MASUK
                </button>

            </form>



            {{-- =================================================
                 DIVIDER
            ================================================== --}}

            <div class="divider">
                atau login cepat sebagai
            </div>



            {{-- =================================================
                 QUICK LOGIN
            ================================================== --}}

            <div class="quick-login">


                {{-- ADMIN --}}

                <button
                    type="button"
                    class="quick-button admin"
                    onclick="quickLogin('admin')"
                >

                    <span class="quick-icon">
                        ♟
                    </span>

                    Admin

                </button>


                {{-- OPERASIONAL --}}

                <button
                    type="button"
                    class="quick-button operasional"
                    onclick="quickLogin('operator')"
                >

                    <span class="quick-icon">
                        ♙
                    </span>

                    Operasional

                </button>


                {{-- PIMPINAN --}}

                <button
                    type="button"
                    class="quick-button pimpinan"
                    onclick="quickLogin('manajemen')"
                >

                    <span class="quick-icon">
                        ♟
                    </span>

                    Pimpinan

                </button>

            </div>

        </div>

    </div>

</div>



<script>

    /* =========================================================
       TAMPILKAN / SEMBUNYIKAN PASSWORD
    ========================================================= */

    function togglePassword() {

        const password =
            document.getElementById('password');

        const button =
            document.getElementById('passwordToggle');


        if (password.type === 'password') {

            password.type = 'text';

            button.innerHTML = '◉';

        } else {

            password.type = 'password';

            button.innerHTML = '◉';

        }
    }



    /* =========================================================
       QUICK LOGIN
       Tombol hanya mengisi email.
       Password tetap dimasukkan sendiri.
    ========================================================= */

    function quickLogin(role) {

        const email =
            document.getElementById('email');

        const password =
            document.getElementById('password');


        if (role === 'admin') {

            email.value = 'admin@gui.com';

        }


        if (role === 'operator') {

            email.value = 'operator@gui.com';

        }


        if (role === 'manajemen') {

            email.value = 'pimpinan@gui.com';

        }


        password.focus();
    }

</script>

</body>
</html>