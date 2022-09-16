@extends('layout.DashboardUser')
@section('container')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>

<div class="container">
    <div class="row border-bottom border-5 mb-5">
        <div class="col subtitle">
            <ul class="list-group fw-bold">
                <a class="text-decoration-none fs-6" href="">Home ></a>
            </ul>
            <ul class="list-group fw-bold fs-4">
                INFORMASI DESA
            </ul>

        </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/images/aparatur-desa.png" class="d-block w-100" style="min-height:50%;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/aparatur.png" class="d-block w-100" style="min-height: 50%" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/kelurahan.png" class="d-block w-100" style="min-height: 50%" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="card text-center mb-3">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">

                </div>
                <div class="col">
                    <img src="/assets/images/pak-slamet.jpg" class="img-thumbnail border-0" alt="...">
                </div>
                <div class="col">

                </div>
            </div>
            <h5 class="card-title">Assalamu’alaikum Warahmatullahi Wabarakatuh</h5>
            <p class="card-text">Selamat Datang di Sistem Informasi Wadah Aspirasi Kelurahan Kalibagor</p>
            <p>Dengan mengucapkan puji dan syukur kehadirat Allah SWT, kami sampaikan salam hangat bagi masyarakat,
                khususnya masyarakat Kelurahan Kalibagor. Selanjutnya dengan senang hati kami sampaikan informasi kepada
                Anda untuk mengenal lebih dekat mengenai pentingnya aspirasi maupun pendapat anda terhadap kualitas
                pelayanan yang ada di Kelurahan, Khususnya kelurahan Kalibagor ini.</p>

            <p>Perkembangan teknologi informasi dan komunikasi yang semakin cepat yang dibarengi dengan semakin
                kritisnya sikap masyarakat terhadap berbagai pelaksanaan dan hasil pembangunan yang sudah dilaksanakan
                maupun yang sedang dilaksanakan telah mendorong Pemerintah Pusat maupun Daerah untuk melaksanakan
                Pemerintahan secara Efektif, Efesien, dan Transparan. Adanya internet telah mendorong terjadinya
                perubahan mendasar pada Tata Laksana Pemerintahan, Maka Website ini kami hadirkan sebagai media untuk
                menyalurkan aspirasi serta pengaduan masyarakat terhadap kelurahan. Sebagai sebuah jawaban terhadap
                tuntutan tersebut maka upaya untuk menyelenggarakan pemerintahan yang berbasis E-Aspirasi diharapkan
                akan memberi dampak terhadap peningkatan penyampaian aspirasi serta mudah berkomunikasi baik secara
                langsung dengan aparatur kelurahan.</p>

            <p>Semoga Website ini akan bermanfaat sepenuhnya untuk meningkatkan penyampaian aspirasi baik kritik maupun
                saran dari masyarakat sebagai sebuah tanggungjawab pemerintah yag berbasis Good Governance. Oleh karena
                itu kritik, saran dan masukan yang konstruktif, kreatif dan inovatif sangat kami nantikan demi
                terwujudnya program Kantor Kelurahan Kalibagor yang terarah dan mengedepankan musyawarah dan mufakat.
            </p>
            <h5 class="card-title text-end me-5 mb-5 mt-5">Lurah Kalibagor</h5>
            <h5 class="card-title text-end me-5">Slamet Riyanto, S.E.</h5>
        </div>


    </div>

    <div class="card mb-3  p-2">
        <div id="map" class="mb-3" style="height: 50vh">
        </div>
        <p><strong>Kalibagor</strong> adalah Sebuah desa di kecamatan Kalibagor, Banyumas, Jawa Tengah, Indonesia. Desa
            Kalibagor Terkenal Akan Wisata Kulinernya yaitu Bakso & Mie Ayam Pentul Kuwel yang dapat dicari di Google
            Map Karena Tempat Tersebut Telah Melegenda di Wilayah Kalibagor.</p>

        <strong>Geografi</strong>
        <p>Luas wilayah Desa Kalibagor 292,674 ha, dengan keadaan wilayah antara daratan dan pegunungan dengan struktur
            pegunungan terdiri dari sebagian lembah Sungai Bener untuk tanah pertanian, sebagian dataran tinggi untuk
            pemukiman dan pekarangan, dan sebagian pegunungan untuk perkebunan Buah Kelengkeng di wilayah Grumbul
            Songgom.</p>
        <div class="col-4">
            <table class="table table-borderless">

                <tbody>
                    <tr>
                        <th scope="row">Negara</th>
                        <td>Indonesia</td>
                    </tr>
                    <tr>
                        <th scope="row">Provinsi</th>
                        <td>Jawa Tengah</td>
                    </tr>
                    <tr>
                        <th scope="row">Kabupaten</th>
                        <td>Banyumas</td>
                    </tr>
                    <tr>
                        <th scope="row">Kecamatan</th>
                        <td>Kalibagor</td>
                    </tr>
                    <tr>
                        <th scope="row">Kodepos</th>
                        <td>53191</td>
                    </tr>
                    <tr>
                        <th scope="row">Kode Kemendagri</th>
                        <td>33.02.10.2007</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card text-center mb-3">
        <div class="card-header">
            Visi
        </div>
        <div class="card-body">
            <h6 class="card-title">“TERWUJUDNYA MASYARAKAT KALIBAGOR YANG SEHAT, CERDAS, MAJU DAN BERKEMBANG SERTA
                BERAKHLAQ KARIMAH“</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            Misi
        </div>
        <div class="card-body">
            <strong>1. Bidang Pemerintahan</strong><br>
            <p class="ms-3">Mengoptimalkan tugas dan fungsi Pemerintahan Desa,
                Mewujudkan Pemerintahan yang transparan, Pelayanan yang cepat, tepat dan gratis.
                Mengoptimalkan pelayanan Administrasi Pertanahan .</p>
            <strong>2. Bidang Perekonomian</strong><br>
            <p class="ms-3">Mengoptimalkan peran BUMDes secara profesional,
                Mengoptimalkian Pasar menjadi Sentra Ekonomi Rakyat</p>
            <strong>3. Bidang Pertanian</strong><br>
            <p class="ms-3">Peningkatan saluran irigasi untuk menanggulangi kekeringan,
                Peningkatan Pemberdayaan Petani dan Kelompok Tani (Kapektan) yang didalamnya sarana prasarana pertanian
                yang memadai,
                Peningkatan sarana prasarana pertanian</p>
            <strong>4. Bidang Sosial</strong><br>
            <p class="ms-3">Peningkatan peran aktif organisasi masyarakat,
                Peningkatan pemberdayaan organisasi / Lembaga masyarakat</p>
            <strong>5. Bidang Pendidikan</strong><br>
            <p class="ms-3">
                Pencanangan program Tuntas Pendidikan dasar 12 tahun,
                Peningkatan kerja sma dengan lembaga terkait Lembaga formal / Internal untuk terwujudnya pemerataan
                pendidikan
            </p>
            <strong>6. Bidang Agama</strong><br>
            <p class="ms-3">
                Mengoptimalkan forum komunikasi remaja dalam kegiatan keagamaan dan sosial,
                Peningkatan TPQ untuk ditangani secara profesional dan sarana prasaranya dengan Iptek yang memadai.
            </p>
            <strong>7. Bidang Pemuda dan Olahraga</strong><br>
            <p class="ms-3">Peningkatan sarana prasarana olah raga sesuai dengan bidang kegiatan,
                Mengembangkan potensi Pemuda dalam bidang olah raga dan Kepemudaan untuk membentuk generasi yang sehat
                Jasmani dan Rohani.</p>
            <strong>8. Bidang Kebersihan dan Kesehatan</strong><br>
            <p class="ms-3">Mengoptimalkan penanganan sampah / limbah dengan pola pelatihan atau pemberdayaan dengan
                Teknologi Tepat Guna,
                Pemberdayaan masyarakat dalam penanganan sampah / limbah sehingga akan terwujudnya penanganan sampah
                secara mandiri dan membentuk sikap dan karakter perilaku hidup sehat.</p>
            <strong>9. Bidang Keamanan dan Ketertiban</strong><br>
            <p class="ms-3">Mengoptimalkan Linmas desa sebagai keamanan desa dan masyarakat,
                Mengoptimalkan sarpras linmas,
                Mengoptimalkan Koordinasi dengan Babinsa (Koramil) dan Babinkamtibmas (Polsek) sebagai wujud
                manunggalnya peran serta dalam kerjasama menjaga ketentraman keamanan dan ketertiban masyarakat</p>

        </div>
    </div>

</div>
<script>
    var map = L.map('map').setView([-7.480, 109.293], 13);

    var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([-7.474, 109.300]).addTo(map);

</script>

@endsection
