<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>     
        .transaction-history {
            background-color: #646464; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        .transaction-item {
            margin-bottom: 15px; 
            padding: 10px; 
            background-color: gray; 
            border-radius: 4px; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
        }

        .transaction-item p {
            margin: 5px 0; 
        }

       
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: left; 
            background-color: #747171;
            color: #fff;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Transaction History</h1>
    </header>

    <div class="container">
        <h2>Riwayat Transaksi Anda</h2>
        <div class="transaction-history" id="transactionDetails">
        </div>
    </div>

    <footer>
        <p>&copy; Fahmi Custom Motor Rent.</p>
    </footer>

    <script>
        const transactionData = JSON.parse(sessionStorage.getItem('transactionData'));

        if (transactionData) {
            const transactionDetails = document.getElementById('transactionDetails');

            for (const key in transactionData) {
                let label;
                switch (key) {
                    case 'motorType':
                        label = 'Tipe Motor';
                        break;
                    case 'motorYear':
                        label = 'Tahun Motor';
                        break;
                    case 'motorBrand':
                        label = 'Merek Motor';
                        break;
                    case 'startDate':
                        label = 'Tanggal Mulai';
                        break;
                    case 'duration':
                        label = 'Durasi';
                        break;
                    case 'totalPrice':
                        label = 'Total Harga';
                        break;
                    case 'formattedPrice':
                        label = 'Total Harga (Format)';
                        break;
                    default:
                        label = key;
                        break;
                }
                const transactionItem = document.createElement('div');
                transactionItem.classList.add('transaction-item');
                transactionItem.innerHTML = `<p><strong>${label}:</strong> ${transactionData[key]}</p>`;
                transactionDetails.appendChild(transactionItem);
            }
        } else {
            // Jika tidak ada data transaksi, tampilkan pesan kosong
            const transactionDetails = document.getElementById('transactionDetails');
            transactionDetails.innerHTML = "<p>Tidak ada data transaksi yang tersedia</p>";
        }
    </script>
</body>
</html>
