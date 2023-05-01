<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v11/images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/css/util.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/css/main.css">

    <meta name="robots" content="noindex, follow">
    <script nonce="bdfc5c46-dd03-45f0-90a5-103cdb42a81a">
        (function(w, d) {
            ! function(f, g, h, i) {
                f[h] = f[h] || {};
                f[h].executed = [];
                f.zaraz = {
                    deferred: [],
                    listeners: []
                };
                f.zaraz.q = [];
                f.zaraz._f = function(j) {
                    return function() {
                        var k = Array.prototype.slice.call(arguments);
                        f.zaraz.q.push({
                            m: j,
                            a: k
                        })
                    }
                };
                for (const l of ["track", "set", "debug"]) f.zaraz[l] = f.zaraz._f(l);
                f.zaraz.init = () => {
                    var m = g.getElementsByTagName(i)[0],
                        n = g.createElement(i),
                        o = g.getElementsByTagName("title")[0];
                    o && (f[h].t = g.getElementsByTagName("title")[0].text);
                    f[h].x = Math.random();
                    f[h].w = f.screen.width;
                    f[h].h = f.screen.height;
                    f[h].j = f.innerHeight;
                    f[h].e = f.innerWidth;
                    f[h].l = f.location.href;
                    f[h].r = g.referrer;
                    f[h].k = f.screen.colorDepth;
                    f[h].n = g.characterSet;
                    f[h].o = (new Date).getTimezoneOffset();
                    if (f.dataLayer)
                        for (const s of Object.entries(Object.entries(dataLayer).reduce(((t, u) => ({
                                ...t[1],
                                ...u[1]
                            }))))) zaraz.set(s[0], s[1], {
                            scope: "page"
                        });
                    f[h].q = [];
                    for (; f.zaraz.q.length;) {
                        const v = f.zaraz.q.shift();
                        f[h].q.push(v)
                    }
                    n.defer = !0;
                    for (const w of [localStorage, sessionStorage]) Object.keys(w || {}).filter((y => y.startsWith("_zaraz_"))).forEach((x => {
                        try {
                            f[h]["z_" + x.slice(7)] = JSON.parse(w.getItem(x))
                        } catch {
                            f[h]["z_" + x.slice(7)] = w.getItem(x)
                        }
                    }));
                    n.referrerPolicy = "origin";
                    n.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(f[h])));
                    m.parentNode.insertBefore(n, m)
                };
                ["complete", "interactive"].includes(g.readyState) ? zaraz.init() : f.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">

                <form class="login100-form validate-form" action="{{route('makeup_login')}}" method="post">
                    @csrf
                    <span class="login100-form-title p-b-55">
                        Sign in
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-envelope"></span>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                    </div>
                    <div class="container-login100-form-btn p-t-25">
                        <button type="submit" class="login100-form-btn">
                            Sign in
                        </button>
                    </div>

                    <div class="text-center w-full p-t-115">
                        <span class="txt1">
                            Not a member?
                        </span>
                        <a class="txt1 bo1 hov1" href="{{route('makeup_artist_registration')}}">
                            Sign up now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://colorlib.com/etc/lf/Login_v11/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v11/vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v11/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v11/js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a0f5ec9cc581897","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>