<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Faktur Tersimpan Cerita</title>
    <style>
        @page {
        margin: 10mm; /* Narrow margin, bisa kamu ubah sesuai kebutuhan */
    }
        body {
        font-family: Arial, sans-serif;
        margin: 40px;
        color: #000;
        margin: 0;
        padding: 0;
        }
        .header,
        .footer,
        .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        }
        .header .logo {
        width: 120px;
        }
        .header .company-info {
        text-align: right;
        }
        .invoice-to,
        .invoice-details {
        background-color: #f0f2f2;
        padding: 10px;
        }
        .invoice-header {
        margin-top: 20px;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        }
        th,
        td {
        padding: 15px;
        text-align: left;
        vertical-align: top;
        }
        th {
        background-color: #f0f2f2;
        }
        .total {
        margin-top: 20px;
        padding: 10px;
        background-color: #f0f2f2;
        text-align: right;
        font-size: 16px;
        }
        .payment-info {
        margin-top: 20px;
        font-size: 16px;
        }
        .dp-info {
        margin-top: 40px;
        font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="header">
        <table style="width: 100%; margin-bottom: 20px;">
            <tr>
                <td style="width: 120px; vertical-align: top;">
                    <img src="img/tc-hitam.png" alt="Logo" style="width: 100%;">
                </td>
                <td style="text-align: right; vertical-align: top;">
                    <strong>Tersimpan Cerita</strong><br>
                    Jl.Kober, Gang Dahlia No.22<br>
                    Banyumas Jawa Tengah 54132<br>
                    ID<br>
                    +62851-5627-2866<br>
                    tersimpancerita@gmail.com
                </td>
            </tr>
        </table>
    </div>

    <div class="invoice-header">
        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td style="width: 50%; vertical-align: top; background-color: #f0f2f2; padding: 10px; text-align: left;">
                    <strong>DITAGIH KEPADA</strong><br>
                    Prof. Moestopo 14/05/25, Tata samantha<br>
                    +6281288942654
                </td>
                <td style="width: 50%; vertical-align: top; background-color: #f0f2f2; padding: 10px; text-align: right;">
                    <strong>Tersimpan Cerita #</strong> TC3659<br>
                    <strong>Tanggal</strong> 3 Apr 2025
                </td>
            </tr>
        </table>
    </div>

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
                <td>
                    <strong>PRIVATE II '25 (JABODETABEK,BGD,SBY)</strong><br>
                    JABODETABEK,BGD,SBY<br>
                    - 1 Graduated<br>
                    - 1 Hours Photo Session<br>
                    - Unlimited Shots<br>
                    - Photo Session with Family and Friends (Guest)<br>
                    - 35 Photo Edit<br>
                    - All File On G-drive<br>
                    - Location On Campus/Grad Venue
                </td>
                <td style="text-align: center">1</td>
                <td>Rp550.000</td>
                <td>Rp550.000</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; margin-top: 20px;">
        <tr>
            <td style="vertical-align: top; width: 60%;">
                <div class="payment-info">
                <strong>Instruksi pembayaran</strong>
                </div>
                <div style="font-size: 16px; color: rgb(51, 51, 51);">Bank BluBCA : 0900-12011708 (A.N Ahmad Reza Rizky Setio Aji)</div>
            </td>

            <td style="vertical-align: top; text-align: right;">
                <div class="total" style="text-align: right; background-color: transparent; padding: 0;">
                    <table style="width: 100%; border-spacing: 0; margin-top: 0;">
                        <tr>
                            <td style="text-align: right; padding-top: 6px; padding-bottom: 2px;">Subtotal:</td>
                            <td style="text-align: right; padding-top: 6px; padding-bottom: 2px;">Rp550.000</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; padding-top: 6px; padding-bottom: 2px;">Total:</td>
                            <td style="text-align: right; padding-top: 6px; padding-bottom: 2px;">Rp550.000</td>
                        </tr>
                    </table>
                    <div style="background-color: #f0f2f2; padding: 10px; margin-top: 10px;">
                        <div style="font-size: 16px; text-align: left">Jumlah yang Harus Dibayar</div>
                        <div style="font-size: 24px;"><strong>Rp550.000</strong></div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <div class="dp-info">
        <strong style="text-decoration: underline;">DP RP 250.000</strong><br>
        - Univ Prof. Moestopo JKT<br>
        - Tanggal 14 Mei 2025<br>
        - Jam 14.00-15.00<br>
        - Lokasi Foto Taman Menteng
    </div>
</body>
</html>
