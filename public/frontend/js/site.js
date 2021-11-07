$('#send-comment').on('click', function () {
    var id = $('#post_id').val();
    var content = $('#form-message').val();
    $.ajax({
        url: "/comment/add",
        type: "POST",
        data: {
            id: id,
            content: content
        },
        success: (res) => {
            $('.comments-area').append(res);
            $('#form-message').val('');

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Mesajınız Göndərildi',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
})


$('#like').on('click', function () {
    var id = $('#post_id').val();
    var text = $("#like").text();
    let count = parseInt($('.like-count').html());
    $.ajax({
        url: "/post/like",
        type: "POST",
        dataType: "json",
        data: {
            id: id
        },
        success: function (data) {
            console.log(data)
            if (data.success) {
                if (data.like) {
                    $('.like-count').html(count + 1);
                    $("#like").html("<i class='far fa-star'></i> Bəyənmə");
                } else if (data.unlike) {
                    $('.like-count').html(count - 1);
                    $("#like").html("<i class='fas fa-star'></i> Bəyən")
                }
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            if (data.error) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: data.error,
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
        }
    })
})
