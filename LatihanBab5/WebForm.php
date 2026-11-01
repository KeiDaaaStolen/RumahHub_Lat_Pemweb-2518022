<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan Produk</title>
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      body {
        background-color: #dde8ec;
        font-family: "Segoe UI", Arial, sans-serif;
        color: #14263a;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
      }

      h1 {
        margin-bottom: 20px;
        text-align: center;
      }

      .container {
        background-color: #ffffff;
        width: 100%;
        max-width: 450px;
        padding: 24px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(20, 38, 58, 0.15);
      }

      .input {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
      }

      label {
        margin-bottom: 6px;
        font-weight: 600;
        text-align: left;
      }

      input {
        width: 100%;
        padding: 10px;
        border: 2px solid #c3d1d9;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.2s;
      }

      input:focus {
        outline: none;
        border-color: #2457f5;
      }

      .button {
        width: 100%;
        margin-top: 8px;
        padding: 12px;
        background-color: #14263a;
        border-radius: 8px;
        cursor: pointer;
        border: none;
        color: #ffffff;
        font-weight: bold;
        font-size: 14px;
        transition: background-color 0.2s;
      }

      .button:hover {
        background-color: #2457f5;
      }

      .button-reset {
        background-color: #6c757d;
        margin-top: 8px;
      }

      .button-reset:hover {
        background-color: #495057;
      }

      #hasil {
        margin-top: 20px;
        background: #f4f8fa;
        padding: 12px;
        border: 2px dashed #c3d1d9;
        border-radius: 8px;
        text-align: left;
      }

      /* Style untuk Tabel Hasil */
      .table-hasil {
        width: 100%;
        border-collapse: collapse;
        margin-top: 5px;
      }

      .table-hasil th, .table-hasil td {
        padding: 8px;
        font-size: 13px;
        border-bottom: 1px solid #d1dce3;
      }

      .table-hasil td:last-child {
        text-align: right;
        font-weight: 600;
      }

      .alert-error {
        color: #d9534f;
        font-weight: bold;
        text-align: center;
        padding: 10px;
      }
    </style>
  </head>

  <body>
    <h1>Form Pemesanan Produk</h1>

    <div class="container">
      <form action="" method="POST">
        <div class="input">
          <label for="produk">Nama Produk</label>
          <input type="text" name="produk" id="produk" required />
        </div>

        <div class="input">
          <label for="jumlah">Jumlah</label>
          <input type="number" name="jumlah" id="jumlah" min="1" required />
        </div>

        <div class="input">
          <label for="harga">Harga Satuan (Rp)</label>
          <input type="number" name="harga" id="harga" min="1" step="any" required />
        </div>

        <button type="submit" class="button" name="btn_proses">Hitung Total</button>
        
        <button 
          type="reset" 
          class="button button-reset" 
          onclick="document.getElementById('hasil').innerHTML = 'Hasil perhitungan akan tampil di sini.';"
        >
          Hapus
        </button>

        <div id="hasil">
          <?php
            // Function untuk menghitung total, diskon 10% jika > 100.000
            function hitungTotalPembayaran($jumlah, $harga) {
                $subtotal = $jumlah * $harga;
                $diskon = 0;

                if ($subtotal > 100000) {
                    $diskon = 0.10 * $subtotal;
                }

                $total_akhir = $subtotal - $diskon;

                return [
                    'subtotal' => $subtotal,
                    'diskon' => $diskon,
                    'total_akhir' => $total_akhir
                ];
            }

            if (isset($_POST['btn_proses'])) {
                $produk = trim($_POST['produk']);
                $jumlah = (int) $_POST['jumlah'];
                $harga  = (float) $_POST['harga'];
                
                // Validasi if-else: Wajib diisi & tidak boleh <= 0
                if (empty($produk) || $jumlah <= 0 || $harga <= 0) {
                    echo "<div class='alert-error'>Error: Semua field wajib diisi dan Jumlah serta Harga tidak boleh bernilai negatif atau nol!</div>";
                } else {
                    $sanitized_produk = htmlspecialchars($produk);
                    $hasil_hitung = hitungTotalPembayaran($jumlah, $harga);

                    echo "<b>Detail Pemesanan:</b>";
                    echo "<table class='table-hasil'>";
                    echo "<tr><td>Nama Produk</td><td>: $sanitized_produk</td></tr>";
                    echo "<tr><td>Jumlah</td><td>: $jumlah</td></tr>";
                    echo "<tr><td>Harga Satuan</td><td>: Rp " . number_format($harga, 0, ',', '.') . "</td></tr>";
                    echo "<tr><td>Subtotal</td><td>: Rp " . number_format($hasil_hitung['subtotal'], 0, ',', '.') . "</td></tr>";
                    echo "<tr><td>Diskon (10%)</td><td>: Rp " . number_format($hasil_hitung['diskon'], 0, ',', '.') . "</td></tr>";
                    echo "<tr style='border-top: 2px solid #14263a;'><td><b>Total Bayar</b></td><td><b>: Rp " . number_format($hasil_hitung['total_akhir'], 0, ',', '.') . "</b></td></tr>";
                    echo "</table>";
                }
            } else {
                echo "Hasil perhitungan akan tampil di sini.";
            }
          ?>
        </div>
      </form>
    </div>
  </body>
</html>



COBA LATIHAN 2 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nilai Mahasiswa</title>
    <style>
      * {
        box-sizing: border-box;
      }
      body {
        background-color: #dde8ec;
        font-family: "Segoe UI", Arial, sans-serif;
        color: #14263a;
      }
      h1 {
        margin-bottom: 30px;
      }
      .container {
        display: flex;
        flex-direction: column;
        background-color: white;
        width: 35%;
        min-width: 320px;
        margin: 40px auto;
        padding: 20px;
        justify-content: center;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(20, 38, 58, 0.15);
      }
      .input {
        display: flex;
        flex-direction: column;
        margin: 10px 0;
        text-align: left;
      }
      label {
        margin-bottom: 5px;
        font-weight: 600;
      }
      input[type="text"],
      input[type="number"] {
        width: 100%;
        padding: 8px;
        border: 2px solid #c3d1d9;
        border-radius: 8px;
      }
      input:focus {
        outline: none;
        border-color: #2457f5;
      }
      .button {
        width: 100%;
        margin: 5px 0;
        padding: 10px;
        background: #14263a;
        border-radius: 8px;
        cursor: pointer;
        border: none;
        color: white;
        font-weight: bold;
      }
      .button:hover {
        background-color: #2457f5;
      }
      .button-reset {
        background-color: #718096;
      }
      .button-reset:hover {
        background-color: #e53e3e;
      }
      #hasil {
        margin-top: 15px;
        background: #f4f8fa;
        padding: 12px;
        border: 2px dashed #c3d1d9;
        border-radius: 8px;
        text-align: left;
        line-height: 1.6;
      }
      #hasil b {
        background: #ffd84d;
        padding: 2px 6px;
        border-radius: 4px;
      }
    </style>
  </head>

  <body>
    <center>
      <h1>Form Nilai Mahasiswa</h1>
      <div class="container">
        <form action="" method="POST" id="formNilai">
          <div class="input">
            <label for="nama">Nama Mahasiswa</label>
            <input type="text" name="nama" id="nama" required />
          </div>

          <div class="input">
            <label for="tugas">Nilai Tugas (30%)</label>
            <input type="number" name="tugas" id="tugas" min="0" max="100" step="any" required />
          </div>

          <div class="input">
            <label for="uts">Nilai UTS (30%)</label>
            <input type="number" name="uts" id="uts" min="0" max="100" step="any" required />
          </div>

          <div class="input">
            <label for="uas">Nilai UAS (40%)</label>
            <input type="number" name="uas" id="uas" min="0" max="100" step="any" required />
          </div>

          <input type="submit" class="button" name="btn_proses" value="Hitung Nilai" />
          
          <input type="button" class="button" value="Hapus" onclick="window.location.href=window.location.pathname;" />
          <div id="hasil">

            <?php
              if (isset($_POST['btn_proses'])) {
                  $nama  = $_POST['nama'];
                  $tugas = (float) $_POST['tugas'];
                  $uts   = (float) $_POST['uts'];
                  $uas   = (float) $_POST['uas'];

                  $akhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

                  if ($akhir >= 85) {
                      $grade = "A";
                  } elseif ($akhir >= 75) {
                      $grade = "B";
                  } elseif ($akhir >= 65) {
                      $grade = "C";
                  } elseif ($akhir >= 50) {
                      $grade = "D";
                  } else {
                      $grade = "E";
                  }

                  if ($akhir >= 60) {
                      $status = "LULUS";
                  } else {
                      $status = "TIDAK LULUS";
                  }

                  echo "Nama : " . htmlspecialchars($nama) . "<br>";
                  echo "Nilai Akhir : " . number_format($akhir, 1) . "<br>";
                  echo "Grade : " . $grade . "<br>";
                  echo "Status : <b>" . $status . "</b>";
              } else {
                  echo "HASIL MUNCUL DISINI";
              }
            ?>
          </div>
        </form>
      </div>
    </center>

        <script>
        function resetForm() {
        document.getElementById("formNilai").reset();
        document.getElementById("hasil").innerHTML = "Hasil perhitungan akan tampil di sini.";
      }
    </script>
  </body>
</html>