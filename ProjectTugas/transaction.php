<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="transaction.css">
</head>
<body>
    <header>
        <h1>Transaksi</h1>
    </header>

    <div class="container">
        <h2>Detail Transaksi</h2>
        <div class="transaction-details" id="transactionDetails">
        </div>
    </div>

    <footer>
        <p>&copy;Fahmi Custom Motor Rent.</p>
    </footer>

    <button onclick="handleOkButtonClick()">OK</button>

    <script>
        function handleOkButtonClick() {
            // Simpan data transaksi ke sessionStorage
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const tipeMotor = urlParams.get('motorType');
            const tahunMotor = urlParams.get('motorYear');
            const merekMotor = urlParams.get('motorYear');
            const tanggalMulai = urlParams.get('startDate');
            const durasi = urlParams.get('duration');

            let hargaSewaPerHari;
            if (tipeMotor === '120cc') {
                hargaSewaPerHari = 70000;
            } else if (tipeMotor === '150cc') {
                hargaSewaPerHari = 90000;
            } else if (tipeMotor === '200cc') {
                hargaSewaPerHari = 120000;
            } else {
                hargaSewaPerHari = 0;
            }

            const totalHarga = hargaSewaPerHari * durasi;
            const totalHargaFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHarga);

            const dataTransaksi = {
                tipeMotor: tipeMobil,
                tahunMotor: tahunMobil,
                merekMotor: merekMobil,
                tanggalMulai: tanggalMulai,
                durasi: durasi,
                totalHarga: totalHarga,
                totalHargaFormatted: totalHargaFormatted
            };
            sessionStorage.setItem('dataTransaksi', JSON.stringify(dataTransaksi));

            window.location.href = "transaction-history.html";
        }

        window.onload = function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const tipeMotor = urlParams.get('motorType');
            const tahunMotor = urlParams.get('motorYear');
            const merekMotor = urlParams.get('motorBrand');
            const tanggalMulai = urlParams.get('startDate');
            const durasi = urlParams.get('duration');

            let hargaSewaPerHari;
            if (tipeMotor === '120cc') {
                hargaSewaPerHari = 70000;
            } else if (tipeMotor === '150cc') {
                hargaSewaPerHari = 90000;
            } else if (tipeMotor === '200cc') {
                hargaSewaPerHari = 120000;
            } else {
                hargaSewaPerHari = 0;
            }

            const totalHarga = hargaSewaPerHari * durasi;
            const totalHargaFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHarga);

            const transactionDetails = document.getElementById('transactionDetails');
            transactionDetails.innerHTML = `
                <p><strong>Tipe Motor:</strong> ${tipeMotor}</p>
                <p><strong>Tahun Motor:</strong> ${tahunMotor}</p>
                <p><strong>Merek Motor:</strong> ${merekMotor}</p>
                <p><strong>Tanggal Sewa:</strong> ${tanggalMulai}</p>
                <p><strong>Durasi:</strong> ${durasi} hari</p>
                <p><strong>Total Harga:</strong> ${totalHargaFormatted}</p>
            `;
        };
    </script>
</body>
