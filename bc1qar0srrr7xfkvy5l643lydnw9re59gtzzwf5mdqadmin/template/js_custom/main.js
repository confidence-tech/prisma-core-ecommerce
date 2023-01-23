$('document').ready(function() {
    /*
    *Авторизация пользователя в системе
    */
    $("#admin_login").click(function (exeption){
        if ($('#login-form')[0].checkValidity()) {
            exeption.preventDefault();

            $('#admin_login').val('Процес...');
            if ($('name').val() == '' || $('password').val() == ''){
                $('#error').show().text('Не все поля заполнены');
                $('#admin_login').val('Войти');
            }else {
                $('#error').hide();
                $.ajax({
                    url: '/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/login-process',
                    method: 'post',
                    data: $('#login-form').serialize(),
                    success:function (response){
                        if (response == 1){
                            window.location.href = '/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/main';
                        }if (response == 0){
                            $('#admin_login').val('Войти');

                            $('#error').show().text('Не правильный логин или пароль');
                        }
                    }
                });
            }
        }
    });


    $("#statistics1").hide();
    $("#statistics2").hide();

    $("#mounth-graph").click(function (){
        $("#statistics1").show('fast');
        $("#statistics").hide();
        $("#statistics2").hide();
    });

    $("#year-graph").click(function (){
        $("#statistics1").hide();
        $("#statistics").show('fast');
        $("#statistics2").hide()
    });

    $("#day_graph").click(function (){
        $("#statistics1").hide();
        $("#statistics").hide();
        $("#statistics2").show('fast');
    });

});