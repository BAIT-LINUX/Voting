<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit(); 
}
?>
    <meta http-equiv="REFRESH" content="50;url=../Login/logout.php">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pemilihan Umum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        .candidate {
            display: inline-table;
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 200px;
        }

        .candidate img {
            height: 200px;
            width: 200px;
        }

        .candidate h2 {
            margin: 10px 0;
        }
        
        .candidate p{
            text-align: left;
        }

        .vote-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .vote-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body onload="start_timer();">
    <header>
        <h1>Pemilihan Umum</h1>
    </header>
    <div class="candidate">
        <img src="img/kandidat 1.jpeg" alt="Kandidat 1">
        <h2>Kandidat 1</h2>
        <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
        <button class="vote-button" onclick="voteForCandidate(1),disableButtonsFor10Seconds(),startCountdown()">Vote</button>
    </div>
    <div class="candidate">
        <img src="img/kandidat 2.jpg" alt="Kandidat 2">
        <h2>Kandidat 2</h2>
        <p><strong>Visi:</strong> Mendorong pertumbuhan ekonomi dan lapangan kerja.</p>
        <p><strong>Misi:</strong> Membangun infrastruktur dan menggalakkan investasi.</p>
        <button class="vote-button" onclick="voteForCandidate(2),disableButtonsFor10Seconds(),startCountdown()">Vote</button>
    </div>
    <div class="candidate">
        <img src="img/kandidat 3.jpeg" alt="Kandidat 3">
        <h2>Kandidat 3</h2>
        <p><strong>Visi:</strong> Memperkuat sektor kesehatan dan lingkungan.</p>
        <p><strong>Misi:</strong> Meningkatkan akses layanan kesehatan dan menjaga keberlanjutan lingkungan.</p>
        <button class="vote-button" onclick="voteForCandidate(3),disableButtonsFor10Seconds(),startCountdown()">Vote</button>
    </div>
    <div class="candidate">
        <img src="img/kandidat 4.jpg" alt="Kandidat 4">
        <h2>Kandidat 4</h2>
        <p><strong>Visi:</strong> Membangun masyarakat yang inklusif dan adil.</p>
        <p><strong>Misi:</strong> Melindungi hak-hak minoritas dan mengurangi ketidaksetaraan.</p>
        <button class="vote-button" onclick="voteForCandidate(4),disableButtonsFor10Seconds(),startCountdown()">Vote</button>
    </div>
    <div class="candidate">
        <img src="img/kandidat 4.jpg" alt="Kandidat 5">
        <h2>Kandidat 5</h2>
        <p><strong>Visi:</strong> Membangun masyarakat yang inklusif dan adil.</p>
        <p><strong>Misi:</strong> Melindungi hak-hak minoritas dan mengurangi ketidaksetaraan.</p>
        <button class="vote-button" onclick="voteForCandidate(5),disableButtonsFor10Seconds(),startCountdown()">Vote</button>
    </div>
    <p>Sesi Anda Berakhir Dalam :   <span id="time">00:00:50</span></p>
<!-- Alarm-->
<script type="text/javascript">
    function start_timer(){
      var timer = document.getElementById("time").innerHTML;
      var arr = timer.split(":");
      var hour = arr[0];
      var min = arr[1];
      var sec = arr[2];
      if(sec == 0) {
        if(min == 0) {
          if(hour == 0) {
            alert("Waktu Habis");
            window.location.reload();
            return;
          }
          hour--;
          min = 60;
          if(hour < 10) hour = "0" + hour;
        }
        min--;
        if(min < 10) min = "0" + min;
        sec = 59;
      }
      else sec--;
      if (sec < 10) sec == "0" + sec;
 
      document.getElementById("time").innerHTML = hour + ":" + min + ":" + sec;
      setTimeout(start_timer, 1000);
    }
  </script>
  
    <script>
function voteForCandidate(candidateId) {
    // Kirim permintaan ke server untuk mengupdate suara kandidat
    fetch('update_suara.php', {
        method: 'POST',
        body: JSON.stringify({ candidateId: candidateId }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Suara Anda telah dicatat`);
        } else {
            alert('Gagal memproses pemilihan.');
        }
    })
    .catch(error => {
        console.error('Terjadi kesalahan:', error);
    });
}
</script>

<script>
    function disableButtonsFor10Seconds() {
        // Menemukan semua elemen tombol pada halaman
        var buttons = document.querySelectorAll("button");

        // Menonaktifkan semua tombol
        buttons.forEach(function(button) {
            button.disabled = true;
        });

        // Setelah 10 detik, mengaktifkan kembali semua tombol
        setTimeout(function() {
            buttons.forEach(function(button) {
                button.disabled = false;
            });
        }, 60000); // 10 detik
    }
</script>

<script>
    var seconds = 60; // Jumlah detik yang akan dihitung mundur
    var interval; // Variabel untuk menyimpan interval

    function updateCountdown() {
        var countdownDisplay = document.getElementById("countdown");
        countdownDisplay.textContent = seconds + " detik";
        seconds--;

        if (seconds < 0) {
            clearInterval(interval);
            countdownDisplay.textContent = "Silahkan pilih kandidat";
        }
    }

    function startCountdown() {
        clearInterval(interval); // Menghentikan interval yang ada jika ada
        seconds = 60; // Mengatur ulang waktu menjadi 60 detik
        updateCountdown(); // Pertama kali memperbarui tampilan hitung mundur
        interval = setInterval(updateCountdown, 1000); // Memperbarui tampilan setiap 1 detik
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>