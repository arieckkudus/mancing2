<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kartu Member (Abu, Polos)</title>
    <style>
        :root {
            --bg: #ffffff;
            --card: #f5f5f5;
            --accent: #9e9e9e;
            --accent-2: #bdbdbd;
            --text: #333333;
            --muted: #777777;
            --border: #e0e0e0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--bg);
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Ubuntu, Arial, sans-serif;
            color: var(--text);
        }

        .wrap {
            padding: 24px;
        }

        .card {
            width: 880px;
            max-width: 95vw;
            border-radius: 16px;
            background: var(--card);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .card__head {
            padding: 10px 20px;
            border-bottom: 2px solid var(--accent-2);
        }

        .logo {
            width: 75px;
            height: 75px;
            background: #fff;
            text-align: center;
            vertical-align: middle;
            display: table-cell;
        }

        .logo img {
            width: 75px;
            height: 75px;
            fill: var(--accent);
        }

        .brand {
            display: table-cell;
            padding-left: 16px;
            vertical-align: middle;
        }

        .brand h1 {
            margin: 0;
            font-size: 22px;
            color: var(--accent);
        }

        .brand .sub {
            margin-top: 4px;
            font-weight: 700;
            font-size: 12px;
            color: var(--muted);
        }

        .card__body {
            padding: 20px;
            display: table;
            width: 100%;
        }

        .left {
            display: table-cell;
            width: 260px;
            vertical-align: top;
        }

        .photo {
            border: 3px solid var(--accent-2);
            border-radius: 8px;
            height: 240px;
            background: #fff;
            text-align: center;
            vertical-align: middle;
            line-height: 240px;
        }

        .photo svg {
            width: 140px;
            height: 140px;
            vertical-align: middle;
        }

        .barcode {
            margin-top: 18px;
            height: 64px;
            background: #fff;
            border-radius: 6px;
            border: 1px solid var(--border);
            text-align: center;
            line-height: 64px;
        }

        .fields {
            display: table-cell;
            padding-left: 24px;
            vertical-align: top;
        }

        .fields table {
            width: 100%;
            border-collapse: collapse;
        }

        .fields td {
            padding: 4px 0;
        }

        .label {
            font-weight: 800;
            color: var(--accent);
            text-transform: uppercase;
            font-size: 14px;
            width: 140px;
        }

        .colon {
            width: 8px;
            color: var(--muted);
        }

        .value {
            font-weight: 700;
            font-size: 16px;
            color: var(--text);
        }

        .card__foot {
            padding: 14px 20px 20px;
            border-top: 1px solid var(--border);
            text-align: right;
            font-size: 12px;
            color: var(--muted);
        }

        @media print {
            .card {
                box-shadow: none;
                border: 1px solid #bbb;
            }
        }
    </style>
</head>

<body>
    <main class="wrap">
        <section class="card">
            <header class="card__head">
                <table>
                    <tr>
                        <td class="logo">
                            <img src="{{ public_path('Arsha/assets/img/logo.png') }}" alt="logo">
                        </td>
                        <td class="brand">
                            <h1>DPK APRI KOTA BONTANG</h1>
                            <span class="sub">KARTU ANGGOTA</span>
                        </td>
                    </tr>
                </table>
            </header>

            <div class="card__body">
                <div class="left">
                    <div class="photo">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5zm0 2c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z" />
                        </svg>
                    </div>
                    <div class="barcode">
                        <!-- Barcode placeholder -->
                        <svg viewBox="0 0 400 64" preserveAspectRatio="none">
                            <rect width="400" height="64" fill="#fff" />
                        </svg>
                    </div>
                </div>

                <div class="fields">
                    <table>
                        <tr>
                            <td class="label">Nama</td>
                            <td class="colon">:</td>
                            <td class="value">{{ $anggota->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td class="label">TTL</td>
                            <td class="colon">:</td>
                            <td class="value">{{ $anggota->tempat_lahir . ', ' . $anggota->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="label">Jenis Kelamin</td>
                            <td class="colon">:</td>
                            <td class="value">
                                @if ($anggota->gender == 'L')
                                    Laki-Laki
                                @elseif ($anggota->gender == 'P')
                                    Perempuan
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Alamat</td>
                            <td class="colon">:</td>
                            <td class="value">{{ $anggota->alamat . ', ' . $anggota->kota_kabupaten . ', ' . $anggota->provinsi }}</td>
                        </tr>
                        <tr>
                            <td class="label">Pekerjaan</td>
                            <td class="colon">:</td>
                            <td class="value">{{ $anggota->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td class="label">Komunitas</td>
                            <td class="colon">:</td>
                            <td class="value">{{ $anggota->nama_komunitas ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <footer class="card__foot">
                Kode: PX-0001
            </footer>
        </section>
    </main>
</body>

</html>
