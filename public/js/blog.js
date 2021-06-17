$(document).ready(function () {
    $('.blogs-pasifive').click(function () {
        var element = $(this);
        $.ajax({
            
                url: '/blogs/pasifive/' + element.data('id'),
                type: 'POST',
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "text",
            success: function (response) {
                if(response) {
                    location.replace('/blogs');
                } else {
                    alert("İşlem başarısız lütfen daha sonra tekrar deneyiniz!");
                }
            }
        });
        
    });
});