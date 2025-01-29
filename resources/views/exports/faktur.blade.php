<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h2 {
            margin: 0;
        }
        .invoice-header p {
            margin: 5px 0;
            font-size: 12px;
        }

        .invoice-details {
            width: 100%;
            margin-bottom: 20px;
        }

        .invoice-details td, .invoice-details th {
            padding: 5px;
        }

        .invoice-details th {
            text-align: left;
            width: 150px;
        }

        .invoice-details td {
            font-size: 12px;
        }

        .items, .payment-details {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .items th, .payment-details th, .items td, .payment-details td {
            border: 1px solid #000;
            padding: 5px;
        }

        .items th, .payment-details th {
            background-color: #f4f4f4;
            text-align: left;
        }

        .items td {
            text-align: right;
        }

        .total {
            font-weight: bold;
            font-size: 14px;
            text-align: right;
            padding-top: 20px;
        }

        .dp-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #000;
        }

        .dp-table td {
            padding: 5px;
            font-size: 12px;
        }

        .dp-table th {
            padding: 5px;
        }

        .dp-table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h2>Tersimpan Cerita</h2>
        <p>Jalan Kertanegara Gang Dalem No. 22</p>
        <p>Banyumanik, Jawa Tengah 51222</p>
        <p>+6282131125632 | tersimpancerita@gmail.com</p>
    </div>

    <div class="invoice-details">
        <table>
            <tr>
                <td><strong>Dikirim Kepada:</strong></td>
                <td><strong>Faktur #</strong></td>
            </tr>
            <tr>
                <td>Siska Salis 1912, Ambar</td>
                <td>TC1203</td>
            </tr>
            <tr>
                <td><strong>Telepon:</strong></td>
                <td><strong>Tanggal</strong></td>
            </tr>
            <tr>
                <td>+6282131125632</td>
                <td>12 Desember 2014</td>
            </tr>
        </table>
    </div>

    <div class="items">
        <table>
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Kuantitas</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PRIVATE 3 JATENG-MALANG 2014</td>
                    <td>1</td>
                    <td>Rp400.000</td>
                    <td>Rp400.000</td>
                </tr>
                <tr>
                    <td>- 1 Gradasi</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>- 1 Harga Private Session</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>- 1 Lunch & Dinner</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>- 25 Photos Session</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>- 1 Photographer</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>- Location On Campus/Grad Venue</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="payment-details">
        <table>
            <thead>
                <tr>
                    <th>Instalasi Pembayaran</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bank Mandiri: 1480210148102349 (Al Ahmad Riza Rifqi Arsy A)</td>
                    <td>Rp400.000</td>
                    <td>Rp400.000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="total">
        <p>Jumlah yang Harus Dibayar: Rp400.000</p>
    </div>

    <div class="dp-section">
        <table class="dp-table">
            <thead>
                <tr>
                    <th>DP Rp 150.000</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>- Siska Eko Utomo</td>
                </tr>
                <tr>
                    <td>- Tanggal 11 Desember 2014</td>
                </tr>
                <tr>
                    <td>- 1 jam foto di Lokasi Fakultas Hukum Solo</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
