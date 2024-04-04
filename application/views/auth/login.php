<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEKAR JAYA | Log in</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
 
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
             <a href="."><img src="<?php echo base_url(); ?>assets/dist/img/2logo.png" height="250" width="250" alt=""></a>
            <a href="../../index2.html"><b>Aplikasi Inventory Stok Barang Mekar Jaya</b></a>
        </div>

        <div class="card px-8">
            <div class="card-body-lg login-card-body">
                <p class="login-box-msg"><b>Silahkan Login</b></p>
                <form class="card card-md" action="<?php echo base_url(); ?>auth/ceklogin" method="POST" autocomplete="off">
                <div class="card-body">
                  
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                           
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                            <span class="input-group-text">
                                <!-- <a href="#" class="link-secondary" title="Show password" data-toggle="tooltip" onclick="lihat()" ><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a> -->
                                <button type="button"  onclick="lihat()"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" />
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                </div>
              
              
            </form>
           
        </div>
    </div>


</div>
</div>

    <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/sweetAlert/sweetalert2.min.js"></script>

</body>



</html>


<script>
    function lihat()
    {
        var password = document.getElementById('password'),
            button = document.getElementsByTagName('button')[0];
 
        if(button.textContent === 'Lihat Password'){
          password.setAttribute('type', 'text');
          button.textContent = 'Sembunyikan';
        }else{
          password.setAttribute('type', 'password');
          button.textContent = 'Lihat Password';
        }
        return false;
    }
</script>
   <script nonce="7b0dc30f-1d8b-4ceb-a248-3200efe3398e">
    (function(w, d) {
        ! function(a, b, c, d) {
            a[c] = a[c] || {};
            a[c].executed = [];
            a.zaraz = {
                deferred: [],
                listeners: []
            };
            a.zaraz.q = [];
            a.zaraz._f = function(e) {
                return function() {
                    var f = Array.prototype.slice.call(arguments);
                    a.zaraz.q.push({
                        m: e,
                        a: f
                    })
                }
            };
            for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
            a.zaraz.init = () => {
                var h = b.getElementsByTagName(d)[0],
                    i = b.createElement(d),
                    j = b.getElementsByTagName("title")[0];
                j && (a[c].t = b.getElementsByTagName("title")[0].text);
                a[c].x = Math.random();
                a[c].w = a.screen.width;
                a[c].h = a.screen.height;
                a[c].j = a.innerHeight;
                a[c].e = a.innerWidth;
                a[c].l = a.location.href;
                a[c].r = b.referrer;
                a[c].k = a.screen.colorDepth;
                a[c].n = b.characterSet;
                a[c].o = (new Date).getTimezoneOffset();
                if (a.dataLayer)
                    for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({
                            ...o[1],
                            ...p[1]
                        })), {}))) zaraz.set(n[0], n[1], {
                        scope: "page"
                    });
                a[c].q = [];
                for (; a.zaraz.q.length;) {
                    const q = a.zaraz.q.shift();
                    a[c].q.push(q)
                }
                i.defer = !0;
                for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith(
                    "_zaraz_"))).forEach((s => {
                    try {
                        a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
                    } catch {
                        a[c]["z_" + s.slice(7)] = r.getItem(s)
                    }
                }));
                i.referrerPolicy = "origin";
                i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
                h.parentNode.insertBefore(i, h)
            };
            ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener(
                "DOMContentLoaded", zaraz.init)
        }(w, d, "zarazData", "script");
    })(window, document);
    </script>