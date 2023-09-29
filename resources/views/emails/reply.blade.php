<!DOCTYPE html>
<html>
<head>
    <title>Komentar</title>
    <style>
        /* Style untuk tampilan formulir komentar */
        #komentar-form {
            width: 300px;
            margin: 20px;
        }
        #komentar-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        #komentar-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Komentar</h1>

    <!-- Formulir komentar -->
    <form id="komentar-form" action="#" method="post">
        <textarea name="komentar" rows="4" placeholder="Tambahkan komentar..." required></textarea>
        <br>
        <input type="submit" value="Kirim Komentar">
    </form>

    <!-- Daftar komentar -->
    <div id="daftar-komentar">
        <!-- Komentar pertama -->
        <div class="komentar">
            <p>Nama Pengguna 1:</p>
            <p>Komentar pertama...</p>
        </div>

        <!-- Komentar kedua -->
        <div class="komentar">
            <p>Nama Pengguna 2:</p>
            <p>Komentar kedua...</p>
        </div>

        <!-- Tambahkan komentar baru ke sini menggunakan JavaScript -->
    </div>

    <script>
        // Fungsi untuk menambahkan komentar baru ke daftar komentar
        function tambahKomentar() {
            var komentar = document.querySelector('textarea[name="komentar"]').value;

            if (komentar !== "") {
                var daftarKomentar = document.getElementById("daftar-komentar");
                var komentarBaru = document.createElement("div");
                komentarBaru.classList.add("komentar");
                komentarBaru.innerHTML = '<p>Nama Pengguna Baru:</p><p>' + komentar + '</p>';
                daftarKomentar.appendChild(komentarBaru);

                // Bersihkan textarea setelah komentar ditambahkan
                document.querySelector('textarea[name="komentar"]').value = "";
            }
        }

        // Tambahkan event listener untuk tombol Kirim Komentar
        document.querySelector('#komentar-form').addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah pengiriman formulir
            tambahKomentar();
        });
    </script>
</body>
</html>
