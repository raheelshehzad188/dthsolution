
 $('.datepicker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: 'M d yyyy'
        });
    $("#save_blog").click(function(e){
        e.preventDefault();
        var title = $('#title').val();
        var subject = $('#subject').val();
        var content = CKEDITOR.instances['content'].getData();
        var author = $('#author').val();
        var blog_date = $('#blog_date').val();
        var fd = new FormData();
        var files = $('#image')[0].files[0];
        fd.append('file',files);
        fd.append('title',title);
        fd.append('subject',subject);
        fd.append('content',content);
        fd.append('author',author);
        fd.append('blog_date',blog_date);
        fd.append('blog_upload',1);
        $.ajax({
            url: 'ajax.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response);
                if(response > 0){
                    '<?php $_SESSION["msg1"]="Success.Your Blog has been Saved." ?>';
                }
            },
        });
    });