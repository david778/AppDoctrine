/**
 * Created by David on 10/03/2016.
 */
$(document).on('ready',function(){

    $("form #submit").click(function(e){
        e.preventDefault();
        $.ajax({
            url:$('form').attr('action'),
            type:$('form').attr('method'),
            data:$('form').serialize(),
            success: function(data){
                var json = JSON.parse(data);
                $('#successLoginAlert, #errorName, #errorPassword').html("");
                $('#successLoginAlert, #errorName, #errorPassword').slideUp();
                if(json.result == "error")
                {
                    if(json.username)
                    {
                        $('#errorName').append(json.username).slideDown();
                    }
                    if(json.password)
                    {
                        $('#errorPassword').append(json.password).slideDown();
                    }
                }else
                    {
                        $('#successLoginAlert').append('Success..').slideDown();
                        setTimeout('location.href="http://localhost/MyAppLogin/home/welcome";',1000);
                        /*location.href = 'http://localhost/MyAppLogin/home/welcome';*/
                    }
            },
            error: function(xhr, error){
                /*console.log(error);*/
            },
        })

    });

});