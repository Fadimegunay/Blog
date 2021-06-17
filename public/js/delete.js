$(document).ready(function () {
    $('.users-delete').click(function () {
        var element = $(this);
        var result = confirm("Kullanıcıyı silmek istediğinize emin misiniz?");
        if (result) {
            $.ajax({
                
                  url: '/users/' + element.data('id'),
                  type: 'DELETE',
                  data: {
                     _token : $('meta[name="csrf-token"]').attr('content')
                  },
                  dataType: "text",
                success: function (response) {
                    if(response) {
                        alert("Silme işlemi başarılı.");
                        location.replace('/users');
                    } else {
                        alert("Silme işlemi başarısız daha sonra tekrar deneyiniz!");
                    }
                }
            });
        }
    });

    $('.blogs-delete').click(function () {
        var element = $(this);
        var result = confirm("Makaleyi kalıcı olarak silmek istediğinize emin misiniz?");
        if (result) {
            $.ajax({
                
                  url: '/blogs/' + element.data('id'),
                  type: 'DELETE',
                  data: {
                     _token : $('meta[name="csrf-token"]').attr('content')
                  },
                  dataType: "text",
                success: function (response) {
                    if(response) {
                        alert("Silme işlemi başarılı.");
                        location.replace('/blogs');
                    } else {
                        alert("Silme işlemi başarısız daha sonra tekrar deneyiniz!");
                    }
                }
            });
        }
    });
});