
$(document).ready(function () {


    $("#no_surat").click(function () {
        $("#clear_no_surat").remove();
    });

    $("#id_instansi")
        .change(function () {
            $("#id_instansi option:selected").each(function () {
                $("#clear_instansi").remove();
            });
        });

    $("#id_status_surat")
        .change(function () {
            $("#id_status_surat option:selected").each(function () {
                $("#clear_jenis_surat").remove();
            });
        });

    $("#tanggal_surat").click(function () {
        $("#clear_tanggal_surat").remove();
    });

    $("#tanggal_diterima").click(function () {
        $("#clear_tanggal_diterima").remove();
    });

    $("#batas_waktu").click(function () {
        $("#clear_batas_waktu").remove();
    });

    $("#isi").click(function () {
        $("#clear_isi").remove();
    });
});
