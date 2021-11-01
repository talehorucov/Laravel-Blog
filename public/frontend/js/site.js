$('#send-comment').on('click', function () {
    var id = $('#post_id').val();
    var content = $('#form-message').val();
    $.ajax({
        url: "/comment/add",
        type: "POST",
        dataType : "json",
        data: { id:id, content:content },
        success: function (data) {
                console.log(data);
                return false;     
            if(data.comment){           
                $('.comments-area').append(data.comment);
                $('#form-message').value = '';
            }
        }
    })
})
