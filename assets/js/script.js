// Show password
function showPasswords() {
    var showPassword = document.getElementById('password');

    if (showPassword.type === 'password') {
        showPassword.type = 'text';
    } else {
        showPassword.type = 'password';
    }
}

// Show password in registration page
function showPasswordRegistration() {
    var password = document.getElementById("Password");
    var open = document.getElementById("eye-open");
    var close = document.getElementById("eye-close");

    if (password.type === 'password') {
        password.type = "text";
        open.style.display = "block";
        close.style.display = "none";
    } else {
        password.type = "password";
        open.style.display = "none";
        close.style.display = "block";
    }
}

// Show Confirm Password in Registration page
function showConfirmPasswordRegistration() {
    var conpassword = document.getElementById("ConfirmPassword");
    var conopen = document.getElementById("Coneye-open");
    var conclose = document.getElementById("Coneye-close");

    if (conpassword.type === 'password') {
        conpassword.type = "text";
        conopen.style.display = "block";
        conclose.style.display = "none";
    } else {
        conpassword.type = "password";
        conopen.style.display = "none";
        conclose.style.display = "block";
    }
}


// Password Input Checker
$(function () {
    var $password = $("#Password");
    var $passwordAlert = $(".password-alert");
    var $requirements = $(".requirements");
    var leng, bigLetter, smallLetter, num, specialChar;
    var $leng = $(".leng");
    var $bigLetter = $(".big-letter");
    var $smallLetter = $(".small-letter");
    var $num = $(".num");
    var numbers = "0123456789";
    var lowercaseLetters = "abcdefghijklmnopqrstuvwxyz";

    $requirements.addClass("wrong");
    $password.on("focus", function () {
        $passwordAlert.show();
    });

    $password.on("input blur", function (e) {
        var el = $(this);
        var val = el.val();
        $passwordAlert.show();

        if (val.length < 8) {
            leng = false;
        } else {
            leng = true;
        }

        if (val.toLowerCase() == val) {
            bigLetter = false;
        } else {
            bigLetter = true;
        }

        smallLetter = false;
        for (var i = 0; i < val.length; i++) {
            for (var j = 0; j < lowercaseLetters.length; j++) {
                if (val[i] == lowercaseLetters[j]) {
                    smallLetter = true;
                }
            }
        }

        num = false;
        for (var i = 0; i < val.length; i++) {
            for (var j = 0; j < numbers.length; j++) {
                if (val[i] == numbers[j]) {
                    num = true;
                }
            }
        }

        if (leng == true && bigLetter == true && smallLetter == true && num == true) {
            $(this).addClass("valid").removeClass("invalid");
            $requirements.removeClass("wrong").addClass("good");
            $passwordAlert.removeClass("alert-warning").addClass("alert-success");
        } else {
            $(this).addClass("invalid").removeClass("valid");
            $passwordAlert.removeClass("alert-success").addClass("alert-warning");

            if (leng == false) {
                $leng.addClass("wrong").removeClass("good");
            } else {
                $leng.addClass("good").removeClass("wrong");
            }

            if (bigLetter == false) {
                $bigLetter.addClass("wrong").removeClass("good");
            } else {
                $bigLetter.addClass("good").removeClass("wrong");
            }

            if (smallLetter == false) {
                $smallLetter.addClass("wrong").removeClass("good");
            } else {
                $smallLetter.addClass("good").removeClass("wrong");
            }

            if (num == false) {
                $num.addClass("wrong").removeClass("good");
            } else {
                $num.addClass("good").removeClass("wrong");
            }
        }

        if (e.type == "blur") {
            $passwordAlert.hide();
        }
    });
});