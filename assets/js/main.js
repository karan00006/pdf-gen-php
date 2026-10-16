$(document).ready(function () {

    $(function () {
        $('#portsTable').DataTable({
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100, 200, 500, 1000],
            order: [[1, 'desc']],
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            language: {
                emptyTable: 'No virtual hosts found.'
            }
        });
    });

    // $('#fileupload').fileupload({
    //     url: 'upload.php'
    // });
    const image = $('#imagee');
    var file = [];
    var src;
    var ic = 0;
    $('#fileupload').on('change', function (e) {
        file[ic] = e.target.files[0];

        var reader = new FileReader();
        reader.onload = function () { 
            src = reader.result;
            image.attr('src', src);
        };
        
        reader.readAsDataURL(file[ic]);
        ic++;
    });


});