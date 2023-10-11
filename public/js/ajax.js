// public/js/ajax.js

$(document).ready(function () {
    $('#karyawan_id').on('change', function () {
        var karyawanId = $(this).val();
        if (karyawanId) {
            $.ajax({
                url: '/nilai_komunikasi/' + karyawanId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#nik_karyawan').val(data.nik_karyawan);
                    $('#departments_id').val(data.departments_id);
                    $('#employee-details').show();
                },
                error: function () {
                    // Handle error if needed
                }
            });
        } else {
            $('#nik_karyawan').val('');
            $('#departments_id').val('');
            $('#employee-details').hide();
        }
    });
});
