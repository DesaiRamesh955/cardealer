$('document').ready(function () {

    $('#signupForm').on('submit', function (e) {
        e.preventDefault()

        let fname = $('#fname')
        let lname = $('#lname')
        let email = $('#email')
        let mobile = $('#mobile')
        let password = $('#password')
        let re_password = $('#re_password')
        let role = $('#role')

        let status = 0

        //first name
        if (!validate(fname)) {
            status = 0;
            return false
        } else { status = 1 }

        //first name
        if (!validate(lname)) {
            status = 0;
            return false
        } else { status = 1 }

        //first name
        if (!validate(email)) {
            status = 0;
            return false
        } else { status = 1 }

        //first name
        if (!validate(mobile)) {
            status = 0;
            return false
        } else { status = 1 }

        //first name
        if (!validate(password)) {
            status = 0;
            return false
        } else { status = 1 }

        //first name
        if (!validate(re_password)) {
            status = 0;
            return false
        } else { status = 1 }

        //first name
        if (!validate(role)) {
            status = 0;
            return false
        } else { status = 1 }

        if (status == 1) {
            $.ajax({
                method: 'post',
                url: 'includes/auth.php',
                data: $('#signupForm').serialize(),
                success: function (response) {
                   
                    let data = JSON.parse(response)
                    let alert = $('.alert')
                    if (data.res == "USER_CREATED_SUCCESSFULLY") {
                        alert.addClass('show')
                        $('#alertmsg').text("User created successfully!!!!")
                        $('#signupForm')[0].reset()
                    } else if (data.res == "USER_CREATED_FAILED") {
                        alert.addClass('show')
                        $('#alertmsg').text("User created failed!!!!")
                    } else if (data.res == "MOBILE_EXIST") {
                        $('#mobile_err').text("Mobile number already exist")
                    } else if (data.res == "EMAIL_EXIST") {
                        $('#email_err').text("Email already exist")
                    }
                }
            })
        }
    })



    $('#signinForm').on('submit', function (e) {
        e.preventDefault()

        let user = $('#user')
        let password = $('#password')

        let status = 0

        //user name
        if (!validate(user)) {
            status = 0;
            return false
        } else { status = 1 }

        //password
        if (!validate(password)) {
            status = 0;
            return false
        } else { status = 1 }

        if (status == 1) {
            $.ajax({
                method: 'post',
                url: 'includes/auth.php',
                data: $('#signinForm').serialize(),
                success: function (response) {
                    let data = JSON.parse(response)
                    $('.message').empty()
                    if (data.res == "INVALID_CREDENTIALS") {
                        $('.message').html(alertView('danger', 'Invalid username password'))
                    } else if (data.res == "SUCCESS") {
                            window.location.href = 'index.php'
                    }

                }
            })
        }

    })

})