Laporan Penjualan Pizza Restoran XYZ
<table border="1">
    <tr>
        <td> No </td>
        <td> Id Ukuran </td>
        <td> Nama Ukuran </td>
        <td> Harga Produk </td>
        <td> Id Konsumen </td>
        <td> Nama Konsumen </td>
        <td> Jumlah Pesan</td>
        <td> Total Harga</td>
        <td> Diskon</td>
        <td> Total Sebelum Pajak</td>
        <td> Pajak</td>
        <td> Total Setelah Pajak</td>
    </tr>
    @foreach ($data as $baris)
        <tr>
            <td> {{ $no++ }}</td>
            <td> {{ $baris->id_ukuran }} </td>
            <td> {{ $baris->nama_ukuran }} </td>
            <td> {{ $baris->harga_produk }} </td>
            <td> {{ $baris->id_konsumen }} </td>
            <td> {{ $baris->nama_konsumen }} </td>
            <td> {{ $baris->jumlah_jual }} </td>
            <td> {{ $baris->harga_produk * $baris->jumlah_jual }} </td>
            <td>
                @php($diskon = 0) {{-- AU UI UX --}}
                @if ($baris->id_ukuran == 'S' || $baris->id_ukuran == 'M')
                    @if ($baris->id_ukuran == 'S')
                        @if ($baris->jumlah_jual >= 3)
                            Diskon 10%
                            @php($diskon = 10 / 100) {{-- AU UI UX --}}
                        @else
                            Tidak Diskon
                        @endif
                    @elseif($baris->id_ukuran == 'M')
                        @if ($baris->jumlah_jual >= 2)
                            Diskon 15%
                            @php($diskon = 15 / 100) {{-- AU UI UX --}}
                        @else
                            Tidak Diskon
                        @endif
                    @endif
                @else
                    Tidak Diskon
                @endif
            </td>
            @php($totalSebelumPajak = $baris->harga_produk * $baris->jumlah_jual) {{-- AU UI UX --}}
            @php($totalDiskon = $totalSebelumPajak * $diskon) {{-- AU UI UX --}}
            @php($totalSebelumPajak = $totalSebelumPajak - $totalDiskon) {{-- AU UI UX --}}
            <td> {{ $totalSebelumPajak }} </td> {{-- ubah AU UI UX --}}
            @php($pajak = ($totalSebelumPajak * 10) / 100) {{-- AU UI UX --}}
            <td> {{ $pajak }} </td> {{-- ubah AU UI UX --}}
            @php($totalSetelahPajak = $totalSebelumPajak + $pajak) {{-- AU UI UX --}}
            <td>
                {{ $totalSetelahPajak }} {{-- ubah AU UI UX --}}
            </td>
        </tr>
    @endforeach
</table>
