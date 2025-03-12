$(document).ready(function() {
    $('#lokasi').select2({
        placeholder: "Cari lokasi...",
        minimumInputLength: 3,
        ajax: {
            url: "/lokasi", 
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term 
                };
            },
            processResults: function (data) {
                return {
                    results: data.data.map(item => ({
                        id: item.id,
                        text: item.lokasi
                    }))
                };
            },
            cache: true
        }
    });

    $('#lokasi').on('select2:select', function (e) {
        var selectedId = e.params.data.id;
        var selectedText = e.params.data.text;

        var now = new Date();
        var tahun = now.getFullYear();
        var bulan = now.getMonth() + 1;

        var namaBulan = getNamaBulanIndonesia(bulan);

        $.ajax({
            url: `https://api.myquran.com/v2/sholat/jadwal/${selectedId}/${tahun}/${bulan}`,
            dataType: 'json',
            success: function (data) {
                var jadwal = data.data.jadwal;
                var hasilHtml = `<h2>Jadwal Sholat ${selectedText} ${namaBulan} ${tahun}</h2>`;

                hasilHtml += '<table class="table table-bordered">';
                hasilHtml += '<thead><tr><th>Tanggal</th><th>Imsak</th><th>Subuh</th><th>Terbit</th><th>Dhuha</th><th>Dzuhur</th><th>Ashar</th><th>Maghrib</th><th>Isya</th></tr></thead>';
                hasilHtml += '<tbody>';

                jadwal.forEach(function (item) {
                    var formattedDate = formatTanggal(item.tanggal);
                    
                    hasilHtml += `<tr>
                        <td>${formattedDate}</td>
                        <td>${item.imsak}</td>
                        <td>${item.subuh}</td>
                        <td>${item.terbit}</td>
                        <td>${item.dhuha}</td>
                        <td>${item.dzuhur}</td>
                        <td>${item.ashar}</td>
                        <td>${item.maghrib}</td>
                        <td>${item.isya}</td>
                    </tr>`;
                });

                hasilHtml += '</tbody></table>';
                $('#hasil-pencarian').html(hasilHtml);
            },
            error: function () {
                $('#hasil-pencarian').html('<p>Gagal mengambil jadwal sholat.</p>');
            }
        });
    });
});

function getNamaBulanIndonesia(bulan) {
    const namaBulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    return namaBulan[bulan - 1];
}

function formatTanggal(tanggal) {
    var parts = tanggal.split(', '); 
    var hari = parts[0]; 
    var tanggalParts = parts[1].split('/'); 
    var tgl = parseInt(tanggalParts[0], 10); 
    var bulan = getNamaBulanIndonesia(parseInt(tanggalParts[1], 10)); 
    var tahun = tanggalParts[2];

    return `${hari}, ${tgl} ${bulan} ${tahun}`;
}
