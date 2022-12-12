<?php
include "varWebSite.php";
$A = new varWebSite();
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>صفحه پروفایل</title>
    <meta charset="UTF-8">
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link href="CSS/all.css" rel="stylesheet">
    <link href="CSS/MYstyle.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/bootstrap-datepicker.min.css" />
    <!--alert-->
    <link href="CSS/notiflix-1.8.0.css" rel="stylesheet"/>
    <script src="JS/notiflix-1.8.0.js"></script>
</head>
<body>
<!------------------------header------------------------>
<?php
if (isset($_SESSION['login']) && $_SESSION['login']==true && $_SESSION['user']='user') {
}
else {
    ?>

    <script>
        window.onload = function() {
            $('#voroodd').css({"opacity": "1", "display": "block"});
        };
    </script>

    <!-----------برای ورود یا ثبت نام...------>
    <div id="voroodd" class="modal fade IRANSans backModal" role="dialog" >
        <div class="modal-dialog" style="padding-top:13%;">
            <div class="text-modal-vorood">
                <br>
                <span class="closeBtn close" data-dismiss="modal" onclick="remBc()"></span>
                <h4>برای ورود شماره موبایل خود را وارد کنید</h4>
                <div class="form-wrapper" style="margin-top: 2rem">
                    <form action="" class="form Fstyle">
                        <div class="form-group">
                            <label class="form-label" for="first">شماره موبایل</label>
                            <input id="phone" class="form-input number-input" type="tel"/>
                        </div>
                    </form>
                    <form action="" class="form Fstyle">
                        <div class="form-group">
                            <label class="form-label" for="firstt">رمز عبور</label>
                            <input id="pass" class="form-input number-input" type="password"/>
                        </div>
                    </form>
                </div>
                <br>
                <a class="ramz-q" data-dismiss="modal" data-toggle="modal" data-target="#phoneN" id="bt1" onclick="reModal()"><p>
                        رمز عبور خود را فراموش کرده اید؟
                    </p>
                </a>
                <a class="sabteNam" data-dismiss="modal" data-toggle="modal" data-target="#phoneN2" onclick="reModal()">
                    <p>ثبت نام</p></a>
                <button onclick="CheckLogIn()" class="IRANSans edameBtn">ورود به سایت</button>
            </div>
            <script>
                function CheckLogIn() {
                    var phone = $('#phone').val();
                    var pass = $('#pass').val();

                    if (phone == '') {
                        document.getElementById('phone').style.border = '2px solid red';
                        let inputTimeOut = setTimeout(function () {
                            document.getElementById('phone').style.borderColor = '#ced4da';
                            document.getElementById('phone').style.borderWidth = '1px';
                            clearTimeout(
                                inputTimeOut
                            );
                        }, 1500);
                        Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                        return;
                    }
                    if (pass == '') {
                        document.getElementById('pass').style.border = '2px solid red';
                        let inputTimeOut = setTimeout(function () {
                            document.getElementById('pass').style.borderColor = '#ced4da';
                            document.getElementById('pass').style.borderWidth = '1px';
                            clearTimeout(
                                inputTimeOut
                            );
                        }, 1500);
                        Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                        return;
                    }

                    Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                        'بله', 'خیر',
                        function () {// Yes button callback
                            $.ajax({
                                url: "1-5websiteLogin.php",
                                data: {
                                    PhoneNumber: phone,
                                    Password: pass,
                                },
                                dataType: "json",
                                type: "POST",
                                success: function (jsonData) {
                                    if (jsonData['error']) {
                                        Notiflix.Notify.Failure(jsonData['MSG']);

                                    } else {
                                        Notiflix.Notify.Success(jsonData['MSG']);
                                        window.location='profile.php'
                                    }
                                }
                            });
                        },
                        function () { // No button callback
                            return;
                        }
                    );
                }

            </script>
        </div>
    </div>
    <!----VRUD------------------------------------------------------->
    <!-----------شماره خود را وارد کنید-------->
    <div id="phoneN" class="modal fade IRANSans backModal" role="dialog">
        <div class="modal-dialog">
            <div class="text-modal-vorood">
                <br>
                <span class="closeBtn close" data-dismiss="modal"></span>
                <div class="flex-am" style="margin-top: 2rem">
                    <div class="parent-input-code">
                        <div class="form-wrapper">
                            <form action="" class="form ">
                                <div class="form-group">
                                    <label class="form-label label23" for="four">شماره خود را وارد کنید</label>
                                    <input id="phone2" class="form-input number-input " style="width: 300px"
                                           type="tel"/>
                                </div>
                            </form>
                        </div>
                        <button onclick="CheckNumber1()" class="IRANSans daryaft-code">ادامه</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function CheckNumber1() {
                var phone2 = $('#phone2').val();

                if (phone2 == '') {
                    document.getElementById('phone2').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('phone2').style.borderColor = '#ced4da';
                        document.getElementById('phone2').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }

                Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                    'بله', 'خیر',
                    function () {// Yes button callback
                        $.ajax({
                            url: "1-4websiteLogin.php",
                            data: {
                                phoneNumber: phone2,
                            },
                            dataType: "json",
                            type: "POST",
                            success: function (jsonData) {
                                if (jsonData['error']) {
                                    Notiflix.Notify.Failure(jsonData['MSG']);

                                } else {
                                    Notiflix.Notify.Success(jsonData['MSG']);
                                    $('#phoneN').modal('hide');
                                    $('#code-Dastresi').modal('show');
                                }
                            }
                        });
                    },
                    function () { // No button callback
                        return;
                    }
                );


            }

        </script>
    </div>
    <!-----------کد دسترسی برای رمز عبور مجدد...-------->
    <div id="code-Dastresi" class="modal fade IRANSans backModal" role="dialog">
        <div class="modal-dialog">
            <div class="text-modal-vorood">
                <br>
                <span class="closeBtn close" data-dismiss="modal"></span>
                <div class="flex-am" style="margin-top: 2rem">
                    <div class="parent-input-code">
                        <div class="form-wrapper">
                            <form action="" class="form ">
                                <div class="form-group">
                                    <label class="form-label label23" for="fouri">کد دسترسی</label>
                                    <input id="code22" class="form-input number-input " style="width: 300px"
                                           type="tel"/>
                                </div>
                            </form>
                        </div>
                        <button onclick="CheckNumber()" class="IRANSans daryaft-code">"تایید</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function CheckNumber() {
                var phone2 = $('#phone2').val();
                var code22 = $('#code22').val();

                if (code22 == '') {
                    document.getElementById('code22').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('code22').style.borderColor = '#ced4da';
                        document.getElementById('code22').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }

                Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                    'بله', 'خیر',
                    function () {// Yes button callback
                        $.ajax({
                            url: "1-2websiteLogin.php",
                            data: {
                                phoneNumber: phone2,
                                code: code22,
                            },
                            dataType: "json",
                            type: "POST",
                            success: function (jsonData) {
                                if (jsonData['error']) {
                                    Notiflix.Notify.Failure(jsonData['MSG']);

                                } else {
                                    Notiflix.Notify.Success(jsonData['MSG']);
                                    $('#code-Dastresi').modal('hide');
                                    $('#Ramz-OBUR').modal('show');

                                }
                            }
                        });
                    },
                    function () { // No button callback
                        return;
                    }
                );


            }

        </script>
    </div>
    <!-----------رمز عبور جدید...------->
    <div id="Ramz-OBUR" class="modal fade IRANSans backModal" role="dialog">
        <div class="modal-dialog">
            <div class="text-modal-vorood">
                <br>
                <span class="closeBtn close" data-dismiss="modal"></span>
                <div class="flex-am" style="margin-top: 2rem">
                    <div class="parent-input-code">
                        <div class="form-wrapper">
                            <form action="" class="form">
                                <div class="form-group">
                                    <label class="form-label label23" for="fourii">رمز عبور جدید</label>
                                    <input id="fourii" class="form-input number-input " style="width: 300px"
                                           type="password"/>
                                </div>
                            </form>
                            <form action="" class="form">
                                <div class="form-group">
                                    <label class="form-label label23" for="fourix">تکرار عبور جدید</label>
                                    <input id="fourix" class="form-input number-input " style="width: 300px"
                                           type="password"/>
                                </div>
                            </form>
                        </div>
                        <button onclick="passwords()" class="IRANSans daryaft-code">تایید</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function passwords() {
                var phone2 = $('#phone2').val();
                var fourii = $('#fourii').val();
                var fourix = $('#fourix').val();
                if (fourii == '') {
                    document.getElementById('fourii').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('fourii').style.borderColor = '#ced4da';
                        document.getElementById('fourii').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }
                if (fourii != fourix) {
                    document.getElementById('fourii').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('fourii').style.borderColor = '#ced4da';
                        document.getElementById('fourii').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('پسورد ها یکسان نیستند');
                    return;
                }

                Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                    'بله', 'خیر',
                    function () {// Yes button callback
                        $.ajax({
                            url: "1-6websiteLogin.php",
                            data: {
                                phoneNumber: phone2,
                                password: fourii,
                            },
                            dataType: "json",
                            type: "POST",
                            success: function (jsonData) {
                                if (jsonData['error']) {
                                    Notiflix.Notify.Failure(jsonData['MSG']);

                                } else {
                                    Notiflix.Notify.Success(jsonData['MSG']);
                                    $('#Ramz-OBUR').modal('hide');
                                    $('#voroodd').modal('show');

                                }
                            }
                        });
                    },
                    function () { // No button callback
                        return;
                    }
                );


            }

        </script>
    </div>
    <!----SABTNAM------------------------------------------------------->
    <!-----------شماره خود را وارد کنید...-------->
    <div id="phoneN2" class="modal fade IRANSans backModal" role="dialog">
        <div class="modal-dialog">
            <div class="text-modal-vorood">
                <br>
                <span class="closeBtn close" data-dismiss="modal"></span>
                <div class="flex-am" style=";margin-top: 2rem">
                    <div class="parent-input-code">
                        <div class="form-wrapper">
                            <form action="" class="form">
                                <div class="form-group">
                                    <label class="form-label label23" for="three2"> شماره خود را وارد کنید</label>
                                    <input id="three2" class="form-input number-input " style="width: 300px"
                                           type="tel"/>
                                </div>
                            </form>
                        </div>
                        <br>
                        <button onclick="CheckNumber2()" class="IRANSans daryaft-code">ادامه</button>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function CheckNumber2() {
                var three2 = $('#three2').val();

                if (three2 == '') {
                    document.getElementById('three2').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('three2').style.borderColor = '#ced4da';
                        document.getElementById('three2').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }

                Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                    'بله', 'خیر',
                    function () {// Yes button callback
                        $.ajax({
                            url: "1-1websiteLogin.php",
                            data: {
                                phoneNumber: three2,
                            },
                            dataType: "json",
                            type: "POST",
                            success: function (jsonData) {
                                if (jsonData['error']) {
                                    Notiflix.Notify.Failure(jsonData['MSG']);

                                } else {
                                    Notiflix.Notify.Success(jsonData['MSG']);
                                    $('#phoneN2').modal('hide');
                                    $('#code-Dastresi2').modal('show');

                                }
                            }
                        });
                    },
                    function () { // No button callback
                        return;
                    }
                );


            }

        </script>
    </div>
    <!-----------کد دسترسی مجدد...-------->
    <div id="code-Dastresi2" class="modal fade IRANSans backModal" role="dialog">
        <div class="modal-dialog">
            <div class="text-modal-vorood">
                <br>
                <span class="closeBtn close" data-dismiss="modal"></span>
                <div class="flex-am" style="margin-top: 2rem">
                    <div class="parent-input-code">
                        <div class="form-wrapper">
                            <form action="" class="form">
                                <div class="form-group">
                                    <label class="form-label label23" for="four2">کد دسترسی را وارد کنید</label>
                                    <input id="four2" class="form-input number-input " style="width: 300px" type="tel"/>
                                </div>
                            </form>
                        </div>
                        <button onclick="CheckCode2()" class="IRANSans daryaft-code">ادامه</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function CheckCode2() {
                var three2 = $('#three2').val();
                var four2 = $('#four2').val();

                if (four2 == '') {
                    document.getElementById('four2').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('four2').style.borderColor = '#ced4da';
                        document.getElementById('four2').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }

                Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                    'بله', 'خیر',
                    function () {// Yes button callback
                        $.ajax({
                            url: "1-2websiteLogin.php",
                            data: {
                                phoneNumber: three2,
                                code: four2,
                            },
                            dataType: "json",
                            type: "POST",
                            success: function (jsonData) {
                                if (jsonData['error']) {
                                    Notiflix.Notify.Failure(jsonData['MSG']);

                                } else {
                                    Notiflix.Notify.Success(jsonData['MSG']);
                                    $('#code-Dastresi2').modal('hide');
                                    $('#vrood-inf').modal('show');

                                }
                            }
                        });
                    },
                    function () { // No button callback
                        return;
                    }
                );


            }

        </script>
    </div>
    <!-----------اطلاعات خود را وارد کنید...-------->
    <div id="vrood-inf" class="modal fade IRANSans backModal" role="dialog">
        <div class="modal-dialog">
            <div class="text-modal-vorood">
                <br>
                <span class="closeBtn close" data-dismiss="modal"></span>
                <h3>اطلاعات خود را وارد کنید</h3>
                <div class="parent-input-nam">
                    <div class="form-wrapper">
                        <form action="" class="form ">
                            <div class="form-group">
                                <label class="form-label label23" for="five">نام </label>
                                <input id="five" class="form-input number-input " style="width: 300px" type="text"/>
                            </div>
                        </form>
                    </div>
                    <div class="form-wrapper">
                        <form action="" class="form">
                            <div class="form-group">
                                <label class="form-label label23" for="lastName">نام خانوادگی</label>
                                <input id="lastName" class="form-input number-input " style="width: 300px" type="text"/>
                            </div>
                        </form>
                    </div>
                    <div class="form-wrapper">
                        <form action="" class="form">
                            <div class="form-group">
                                <label class="form-label label23" for="six">رمز عبور</label>
                                <input id="six" class="form-input number-input " style="width: 300px" type="password"/>
                            </div>
                        </form>
                    </div>
                    <div class="form-wrapper">
                        <form action="" class="form">
                            <div class="form-group">
                                <label class="form-label label23" for="seven">تکرار رمز عبور</label>
                                <input id="seven" class="form-input number-input " style="width: 300px"
                                       type="password"/>
                            </div>
                        </form>
                    </div>
                    <div class="form-wrapper">
                        <form action="" class="form">
                            <div class="form-group ">
                                <label class="form-label label23 control-label myLabel" for="datepicker4"></label>
                                <div class="controls">
                                    <input type="text" id="datepicker4" class="number-input" placeholder="تاریخ تولد"
                                           style="width: 300px"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--                <a href="index.html">-->
                    <button onclick="submitUserData()" class="IRANSans daryaft-code"
                            style="font-size: 20px;margin-top: 4rem;">ذخیره اطلاعات
                    </button>
                    </a>
                </div>
            </div>
        </div>
        <script>
            function submitUserData() {
                var three2 = $('#three2').val();
                var five = $('#five').val();
                var lastName = $('#lastName').val();
                var datepicker4 = $('#datepicker4').val();
                var six = $('#six').val();
                var seven = $('#seven').val();

                if (five == '') {
                    document.getElementById('five').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('five').style.borderColor = '#ced4da';
                        document.getElementById('five').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }
                if (lastName == '') {
                    document.getElementById('lastName').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('lastName').style.borderColor = '#ced4da';
                        document.getElementById('lastName').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }
                if (datepicker4 == '') {
                    document.getElementById('datepicker4').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('datepicker4').style.borderColor = '#ced4da';
                        document.getElementById('datepicker4').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }
                if (six == '') {
                    document.getElementById('six').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('six').style.borderColor = '#ced4da';
                        document.getElementById('six').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }
                if (seven == '') {
                    document.getElementById('seven').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('seven').style.borderColor = '#ced4da';
                        document.getElementById('seven').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                    return;
                }
                if (six != seven) {
                    document.getElementById('six').style.border = '2px solid red';
                    let inputTimeOut = setTimeout(function () {
                        document.getElementById('six').style.borderColor = '#ced4da';
                        document.getElementById('six').style.borderWidth = '1px';
                        clearTimeout(
                            inputTimeOut
                        );
                    }, 1500);
                    Notiflix.Notify.Failure('پسورد ها یکسان نیستند');
                    return;
                }

                Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                    'بله', 'خیر',
                    function () {// Yes button callback
                        $.ajax({
                            url: "1-3websiteLogin.php",
                            data: {
                                PhoneNumber: three2,
                                Name: five,
                                LastName: lastName,
                                dateOfBirth: datepicker4,
                                Password: six,
                            },
                            dataType: "json",
                            type: "POST",
                            success: function (jsonData) {
                                if (jsonData['error']) {
                                    Notiflix.Notify.Failure(jsonData['MSG']);

                                } else {
                                    Notiflix.Notify.Success(jsonData['MSG']);
                                    $('#vrood-inf').modal('hide');

                                }
                            }
                        });
                    },
                    function () { // No button callback
                        return;
                    }
                );


            }

        </script>
    </div>
    <script type="text/javascript">
        function reModal() {
            $('#voroodd').css({"opacity": "0", "display": "none"});
        }

        function remBc() {
            $('#voroodd').css({"opacity": "0", "display": "none"});
        }
    </script>
    <?php
}
?>
<?php
if (isset($_SESSION['login'])){
    $id = $_SESSION['id'];
}
else{
    $id = '';
}
$want2 = $A->Query("SELECT * FROM user WHERE id='$id'");
$want = $A->FetchAssoc($want2);
$name = $want['Name'];
$lastName = $want['LastName'];
$dateOfBirth = $want['dateOfBirth'];
$PhoneNumber = $want['PhoneNumber'];
?>
<!------------------------------------------------------->


<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 0">
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans div-vorood">
        <p class="nameKarbar"><?php echo $name.' '.$lastName?></p>
        <a>
            <img src="IMG/mobile-icon.svg" class="icon-mobile">
        </a>

    </div>
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">

    </div>
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 div-logo">
        <a href="index.php">
            <img src="IMG/vorood.svg" class="back-logo">
            <img src="IMG/logo-white.svg" class="logo-white">
        </a>
    </div>
</div>
<!-------------------------mega-menu------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
    <nav class="nav-bar">
        <ul>
            <li>mega1
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega2
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega3
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega4
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega5
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega6
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega7
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega8
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega9
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega10
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</div>
<hr>
<!-------------------------mega-menu------------------------->
<!------------------------------------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans" style="padding: 30px 10px;">
    <div class="tab">
        <button class="tablinks my-tab-buttun" onclick="openCity(event, 'London')">
            <div class="flex-am">
                <img src="" style="width: 16%;">
                <span class="itemtab">پروفایل</span>
            </div>
        </button>
        <button class="tablinks my-tab-buttun" onclick="openCity(event, 'Paris')">
            <div class="flex-am">
                <img src="IMG/etebar-v-tarakonesh.svg" style="width: 19%;">
                <span class="itemtab">اعتبار و تراکنش ها</span>
            </div>
        </button>
        <button class="tablinks my-tab-buttun" onclick="openCity(event, 'Tokyo')">
            <div class="flex-am">
                <img src="IMG/motekhases-montakhab.svg" style="width: 20%;">
                <span class="itemtab">متخصص های منتخب</span>
            </div>
        </button>
        <button class="tablinks my-tab-buttun" onclick="openCity(event, 'tehran')">
            <div class="flex-am">
                <img src="IMG/sefareshat-man.svg" style="width: 21%;">
                <span class="itemtab">سفارشات من</span>
            </div>
        </button>
        <button class="tablinks my-tab-buttun" onclick="openCity(event, 'ahvaz')">
            <div class="flex-am">
                <img src="IMG/davat-az-dustan.svg" style="width:18%;">
                <span class="itemtab">دعوت از دوستان</span>
            </div>
        </button>
    </div>
    <div id="London" class="tabcontent" style="display: block">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style=" margin-top:3.5rem;">
            <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9" style="padding: 20px 0;">
                <!---halate sabt--------------------------------------------------------->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" id="sabt-info">
                <!------------------------------------------------------نام---->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 p-div-m">
                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 txl">
                    </div>
                    <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7 div-m">
                        <span class="t-color"><?php echo $name?></span>
                        <span class="family-mem" id="myname"></span>
                    </div>
                </div>
                <!----------------------------------------------------نام خانوادگی---->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 p-div-m"  >
                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 txl" >
                    </div>
                    <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7 div-m ">
                        <span class="t-color"><?php echo $lastName?></span>
                        <span class="family-mem" id="myfamily"></span>
                    </div>
                </div>
                <!------------------------------------------------------تاریخ تولد---->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 p-div-m">
                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 txl" >
                    </div>
                    <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7 div-m">
                        <span style="color: #d5d5d5"><?php echo $dateOfBirth?></span>
                        <span style="margin-right: 3rem ;color: black;font-size: 24px" id="mybirth"></span>
                    </div>
                </div>
                <!---------------------------------------------------------جنسیت--->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 p-div-m1">
                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 txl">
                    </div>
                    <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7 div-m">
                        <span style="color: #d5d5d5">جنسیت</span>
                        <span style="margin-right: 3rem ;color: black;font-size: 24px" id="myj"></span>
                    </div>
                </div>
                <!---------------------------------------------------------------->
                    <span onclick="showVirayesh()" class="glyphicon glyphicon-pencil pncl-css"></span>
                </div>
                <!---halate sabt--------------------------------------------------------->
                <!---halate virayesh----------------------------------------------------->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" id="virayesh-info" style="display: none">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 virayesh-div">
                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 txl">
                    </div>
                    <div class="div-m editProfile">
                        <span class="t-color">نام</span>
                        <input type="text" class="virayesh-input" id="urName">
                    </div>
                </div>

                <!----------->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 p-div-m" >
                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 txl" >
                    </div>
                    <div class="div-m editProfile">
                        <span class="t-color">نام خانوادگی</span>
                        <input type="text" class="virayesh-input" id="urFamily">
                    </div>
                </div>
                <!----------->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 p-div-m" >
                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 txl" >
                        <!--<button class="btn-pro">ثبت</button>-->
                    </div>
                    <div class="div-m editProfile">

                       <label class="control-label myLabel" for="datepicker4" style="color: #d5d5d5"> تاریخ تولد</label>
                      <div class="controls">
                        <input type="text" id="datepicker4"  style=" direction: rtl;text-align: right; margin-right: 3rem ;color: black;font-size: 24px" class="virayesh-input"/>
                      </div>

                    </div>
                </div>
                <!----------->
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 p-div-m1">
                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 txl" >
                        <div class="toggleBox">
                            <div class="toggle">
                                <input type="checkbox" id="mycheckbox" onclick="Checkbox()">
                                <label for="" class="onbtn">زن</label>
                                <label for="" class="ofbtn">مرد</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7 div-m">
                        <span class="t-color">جنسیت</span>
                        <span class="jnsiyt" id="jensiyat"></span>
                    </div>
                </div>
                    <span onclick="SabtInfo()" class="sbt-info">&check;</span>
                 </div>
                <script>
                    function SabtInfo() {
                        var urName = $('#urName').val();
                        var urFamily = $('#urFamily').val();
                        var datepicker4 = document.getElementById('datepicker4').value;
                        var id = <?php echo $id ?>;

                        if (urName == '') {
                            document.getElementById('urName').style.border = '2px solid red';
                            let inputTimeOut = setTimeout(function () {
                                document.getElementById('urName').style.borderColor = '#ced4da';
                                document.getElementById('urName').style.borderWidth = '1px';
                                clearTimeout(
                                    inputTimeOut
                                );
                            }, 1500);
                            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                            return;
                        }
                        if (urFamily == '') {
                            document.getElementById('urFamily').style.border = '2px solid red';
                            let inputTimeOut = setTimeout(function () {
                                document.getElementById('urFamily').style.borderColor = '#ced4da';
                                document.getElementById('urFamily').style.borderWidth = '1px';
                                clearTimeout(
                                    inputTimeOut
                                );
                            }, 1500);
                            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                            return;
                        }
                        if (datepicker4 == '') {
                            document.getElementById('datepicker4').style.border = '2px solid red';
                            let inputTimeOut = setTimeout(function () {
                                document.getElementById('datepicker4').style.borderColor = '#ced4da';
                                document.getElementById('datepicker4').style.borderWidth = '1px';
                                clearTimeout(
                                    inputTimeOut
                                );
                            }, 1500);
                            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                            return;
                        }
                        Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                            'بله', 'خیر',
                            function () {// Yes button callback
                                $.ajax({
                                    url: "14-2upUserWeb.php",
                                    data: {
                                        Name: urName,
                                        LastName: urFamily,
                                        dateOfBirth: datepicker4,
                                        id: id,
                                    },
                                    dataType: "json",
                                    type: "POST",
                                    success: function (jsonData) {
                                        if (jsonData['error']) {
                                            Notiflix.Notify.Failure(jsonData['MSG']);

                                        } else {
                                            Notiflix.Notify.Success(jsonData['MSG']);
                                        }
                                    }
                                });
                            },
                            function () { // No button callback
                                return;
                            }
                        );


                    }

                </script>
                <!---halate virayesh----------------------------------------------------->
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3" style="margin: 2.2rem 0;">
                <div class="div-pic-pro">
                    <img src="" id="picPro" class="pic-profile">
                    <br>
                    <h4 class="N-karbari">شماره کاربری</h4>
                    <br>
                    <h4 class="Karbari"> <?php echo $PhoneNumber?></h4>
                </div>
            </div>
        </div>
    </div>
    <!--------------------->
    <div id="Paris" class="tabcontent">
        <div class="flex-am" style="padding:11rem 0">
            <div class="flex-of taraz-etebari" >
                <div class="flex-am" style="margin-left: 2rem;">
                    <h3 class="h3gh">10000 تومان</h3>
                    <h3 class="text-gh">تراز اعتباری من</h3>
                </div>
                <img src="IMG/icons8-wallet-100%20(1).svg" class="svgsize">
            </div>
            <div class="flex-am">
                <br>
                <button class="flex-of my-btn hvbtn btn-lg" data-toggle="modal" id="four" data-target="#af-bank">
                    <svg class="svgstyle" width="50px" height="50px" viewBox="0 0 100 100">
                        <image style="width: 80%;" id="icons8-credit-card-100_1_" data-name="icons8-credit-card-100 (1)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAABmJLR0QA/wD/AP+gvaeTAAACNElEQVR42u3dvW7TUBjG8QqJCcSV8DEgPkYm1DhVu3BB9mnVDgylbMxwDUhIjS12ZqjY4A74kOgE+ISqcqwktd0TtUW/v/SOzvD8dfyeZHiytgYAAAAAAAAAAAAAS7n/4dX1UbX9bFxuv8nK8Kmen/X8MYtnXIYfMauYWcwuZphERlYWW9kkfBbyOWeaYbE1WESe59eyKuwJM+n8rqXsxmz7nwwyVjjFbv/X1NTmzAf9GlVhf2Oy8/Dpu+c3bNblxIxiVtmkeBGza5+Uerdsdl7gc3bGl3GV3xbzwD38PtypM/za3imdFn28EbRPBhnJpBw3s41Zn/ngydW28VDYF2ciKWU4aJ2S110eOmo+tH4YHogymZBHrbfPUYcTMv1Cc/rQkyq/Kco0xCzbXx67WJy5ookx+Snply8hhBBCyBUWYlY7hBBiCCHEEEKIIYQQQgghxE8nfssCIYSAEEJwdYRc+usjIYQQQgghlrqlDkIIIYQQQgghBIQQAkIIASGEEEIIIYQQAkIIASGE4OKEfFc+sxpGb/NbLSHfugiZqWeKNXWiTCSk2nk8oJ5ptsAsdgaKMpGQsnjZu8BsXsVfrKcT5/nYKMO9QRV/i0owSRnO+mF+d3AJ5r89MrcmNto9iO9Bi/5sYkYxq5PX1PHgmthTKYqUL0+RcmRaNV4/OOekmIuoGm/cujaV8acp4+/9mlq26Jt/V9FuLjUL/q5iEj7Gq23Sv6sAAAAAAAAAAAAA8B/zFzUBGGVn18qhAAAAAElFTkSuQmCC" />
                    </svg>افزایش اعتبار با کارت بانکی
                </button>
                <br>
                <button class="flex-of my-btn hvbtn btn-lg"  data-toggle="modal" data-target="#af-hediye">
                    <svg class="svgstyle" width="50px" height="50px" viewBox="0 0 100 100">
                        <image style="width: 80%;" id="icons8-credit-card-100_1_" data-name="icons8-credit-card-100 (1)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAABmJLR0QA/wD/AP+gvaeTAAACNElEQVR42u3dvW7TUBjG8QqJCcSV8DEgPkYm1DhVu3BB9mnVDgylbMxwDUhIjS12ZqjY4A74kOgE+ISqcqwktd0TtUW/v/SOzvD8dfyeZHiytgYAAAAAAAAAAAAAS7n/4dX1UbX9bFxuv8nK8Kmen/X8MYtnXIYfMauYWcwuZphERlYWW9kkfBbyOWeaYbE1WESe59eyKuwJM+n8rqXsxmz7nwwyVjjFbv/X1NTmzAf9GlVhf2Oy8/Dpu+c3bNblxIxiVtmkeBGza5+Uerdsdl7gc3bGl3GV3xbzwD38PtypM/za3imdFn28EbRPBhnJpBw3s41Zn/ngydW28VDYF2ciKWU4aJ2S110eOmo+tH4YHogymZBHrbfPUYcTMv1Cc/rQkyq/Kco0xCzbXx67WJy5ookx+Snply8hhBBCyBUWYlY7hBBiCCHEEEKIIYQQQgghxE8nfssCIYSAEEJwdYRc+usjIYQQQgghlrqlDkIIIYQQQgghBIQQAkIIASGEEEIIIYQQAkIIASGE4OKEfFc+sxpGb/NbLSHfugiZqWeKNXWiTCSk2nk8oJ5ptsAsdgaKMpGQsnjZu8BsXsVfrKcT5/nYKMO9QRV/i0owSRnO+mF+d3AJ5r89MrcmNto9iO9Bi/5sYkYxq5PX1PHgmthTKYqUL0+RcmRaNV4/OOekmIuoGm/cujaV8acp4+/9mlq26Jt/V9FuLjUL/q5iEj7Gq23Sv6sAAAAAAAAAAAAA8B/zFzUBGGVn18qhAAAAAElFTkSuQmCC" />
                    </svg>افزایش اعتبار با کارت هدیه
                </button>
                <br>
            </div>
            <!-- Modal afzayesh etebar ba cart banki-->
            <div id="af-bank" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style=" padding: 5rem 3rem;">
                            <div class="flex-of taraz-etebari1" >
                                <div class="flex-am" style="margin-left: 2rem;">
                                    <h3 class="h3gh">10000 تومان</h3>
                                    <h3 class="text-gh">تراز اعتباری من</h3>
                                </div>
                                <img src="IMG/icons8-wallet-100%20(1).svg" style="width: 15%">
                            </div>
                            <div class="div-t-bank">
                              <div class="flex-of col-md-12 col-xs-12 col-sm-12 col-lg-12 " style="padding-top:4rem">
                                <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 flex-of" style="padding: 0;"><img src="IMG/icons8-credit-card-100%20(1).svg" class="icon-prdkht"><p class="txt-card-banki">افزایش اعتبار با کارت بانکی</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 brdr-inpt"><input type="text" class="mablagh" placeholder="مبلغ مورد نظر خود را وارد کنید"><label style="float: left;">تومان</label></div>
                                <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3"><button class="btn-afz-etebar">افزایش اعتبار</button></div>
                              </div>
                              <div style="text-align: center;">
                                <a href="#"><img src="IMG/saman-ipg.svg" class="bankpic"></a>
                                <a href="#"><img src="IMG/mellat-ipg.svg" class="bankpic"></a>
                              </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal afzayesh etebar ba cart banki-->
            <!----------------------------------------------------------->
            <!-- Modal afzayesh etebar ba cart hediye-->
            <div id="af-hediye" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style=" padding: 5rem 3rem;">
                            <div class="flex-of taraz-etebari1" >
                                <div class="flex-am" style="margin-left: 2rem;">
                                    <h3 class="h3gh">10000 تومان</h3>
                                    <h3 class="text-gh">تراز اعتباری من</h3>
                                </div>
                                <img src="IMG/icons8-wallet-100%20(1).svg" style="width: 15%">
                            </div>
                            <div class="div-t-bank" style="height: 100px;">
                                <div class="flex-of col-md-12 col-xs-12 col-sm-12 col-lg-12 ">
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 flex-of" style="padding: 0;">
                                        <img src="IMG/icons8-credit-card-100%20(1).svg" class="icon-prdkht">
                                        <p class="txt-card-banki">افزایش اعتبار با کارت هدیه</p>
                                    </div>
                                    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5 brdr-inpt">
                                        <input type="text" class="mablagh" placeholder="کد اعتباری هدیه خود را وارد کنید">
                                    </div>
                                    <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                                        <button class="btn-afz-etebar">افزایش اعتبار</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal afzayesh etebar ba cart hediye-->
        </div>
    </div>
    <!--------------------->
    <div id="Tokyo" class="tabcontent scroll-style"><?php
        $target=$A->Query("SELECT *,workers.id AS WID,favoriteworker.id AS fId FROM favoriteworker,workers WHERE favoriteworker.userId='$id' AND workers.id=favoriteworker.workerId AND favoriteworker.status='1'");
        if ($A->Numros($target)!=0) {
            while ($rowCat = mysqli_fetch_assoc($target)) {
                $workerID = $rowCat['WID'];
                $target2 = $A->Query("SELECT * FROM workers,subcategory WHERE workers.id='$workerID' AND workers.subCategoryId=subcategory.id");
                $rowCat2 = $A->FetchAssoc($target2);
                $select3 = $A->Query("SELECT * FROM points WHERE workerId='$workerID'");
                $num = 0;
                $num = $A->Numros($select3);
                $to = 0;
                while ($fetch = mysqli_fetch_assoc($select3)) {
                    $B = $fetch['points'];
                    $to += $B;
                }
                $Avg = $num / $to;

        ?>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 flex-of style-m" id="div-motkhss1">
            <div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">
                <img src="../Management/Management/upload/<?php echo $rowCat2['subCatImg']?>.jpg" style="width: 100%;border-radius: 100%" >
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 text-center">
                <p class="text-m" id="N-M1"><?php echo $rowCat['name'].' '.$rowCat['lastName'] ?></p>
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                <span class="fa fa-star star-style activeStar"></span>
                <span class="fa fa-star star-style activeStar"></span>
                <span class="fa fa-star star-style"></span>
                <span class="fa fa-star star-style"></span>
                <span class="fa fa-star star-style"></span>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 text-center">
                <p class="text-m"> <?php echo $rowCat2['subcategory']?></p>
            </div>
            <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1" style="width: 16%">
                <button class="flex-of hazfm btn-lg" id="fId" onclick="changeFavWorker()"  value="<?php echo $rowCat['fId'] ?>">
                    <span>حذف</span>
                </button>
            </div>
        </div>
            <?php
            }
        }
        ?>
        <script>
            function removeDiv() {
                document.getElementById("div-motkhss1").style.display= "none";
            }
        </script>
        <script>
            function changeFavWorker() {
                var fId = $('#fId').val();
                Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                    'بله', 'خیر',
                    function () {// Yes button callback
                        $.ajax({
                            url: "19-2upFavWorker.php",
                            data: {
                                id: fId,
                            },
                            dataType: "json",
                            type: "POST",
                            success: function (jsonData) {
                                if (jsonData['error']) {
                                    Notiflix.Notify.Failure(jsonData['MSG']);

                                } else {
                                    Notiflix.Notify.Success(jsonData['MSG']);
                                }
                            }
                        });
                    },
                    function () { // No button callback
                        return;
                    }
                );


            }

        </script>
    </div>
    <!--------------------->
    <div id="tehran" class="tabcontent scroll-style">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 flex-of style-m" style="padding:25px 0;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtss">
                <h3 class="txtc">تعمیرات کولر</h3>
                <br>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>توسط :</span>
                    <span id="nameM1"> آقای محمد روشنگر</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>ساعت اتمام خدمت :</span>
                    <span>17:35</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>  تاریخ :</span>
                    <span>98/11/6</span>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6" style="float: right;padding-right: 0">
                        <span>هزینه پرداخت شده :</span>
                        <span>100000 تومان</span>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 col-md-offset-3 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1 btn-lg btn-sabt-nazar " >
                        متخصص منتخب
                    </div>
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5  btn-lg btn-sabt-nazar" style="margin-left: 1rem"  data-toggle="modal" data-target="#myModal">
                        ثبت نظر و امتیاز
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtmodal">
                                        <h3 class="txtc">تعمیرات کولر</h3>
                                        <br>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>توسط :</span>
                                            <span> آقای محمد روشنگر</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>ساعت اتمام خدمت :</span>
                                            <span>17:35</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>  تاریخ :</span>
                                            <span>98/11/6</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                                <span>هزینه پرداخت شده :</span>
                                                <span>100000 تومان</span>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                    <div style="margin-right: 20rem">
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="inputtext" placeholder="نظر خود را وارد کنید">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-sabt-nazar1 btn btn-default" data-dismiss="modal">ثبت نظر و امتیاز</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
        </div>
        <!---->
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 flex-of style-m" style="padding:25px 0;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtss">
                <h3 class="txtc">تعمیرات کولر</h3>
                <br>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>توسط :</span>
                    <span id="nameM2"> آقای OEWOHF روشنگر</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>ساعت اتمام خدمت :</span>
                    <span>17:35</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>  تاریخ :</span>
                    <span>98/11/6</span>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6" style="float: right;padding-right: 0">
                        <span>هزینه پرداخت شده :</span>
                        <span>100000 تومان</span>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 col-md-offset-3 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1 btn-lg btn-sabt-nazar" >
                        متخصص منتخب
                    </div>
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 btn-lg btn-sabt-nazar" style="margin-left: 1rem"   data-toggle="modal" data-target="#myModal1">
                        ثبت نظر و امتیاز
                    </div>
                    <!-- Modal -->
                    <div id="myModal1" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtmodal">
                                        <h3 class="txtc">تعمیرات کولر</h3>
                                        <br>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>توسط :</span>
                                            <span> آقای محمد روشنگر</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>ساعت اتمام خدمت :</span>
                                            <span>17:35</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>  تاریخ :</span>
                                            <span>98/11/6</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>هزینه پرداخت شده :</span>
                                            <span>100000 تومان</span>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                    <div style="margin-right: 20rem">
                                        <div class="rate">
                                            <input type="radio" id="star6" name="rate" value="5" />
                                            <label for="star6" title="text">5 stars</label>
                                            <input type="radio" id="star7" name="rate" value="4" />
                                            <label for="star7" title="text">4 stars</label>
                                            <input type="radio" id="star8" name="rate" value="3" />
                                            <label for="star8" title="text">3 stars</label>
                                            <input type="radio" id="star9" name="rate" value="2" />
                                            <label for="star9" title="text">2 stars</label>
                                            <input type="radio" id="star10" name="rate" value="1" />
                                            <label for="star10" title="text">1 star</label>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="inputtext">
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn-sabt-nazar1 btn btn-default" data-dismiss="modal">ثبت نظر و امتیاز</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
        </div>
        <!---->
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 flex-of style-m" style="padding:25px 0;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtss">
                <h3 class="txtc">تعمیرات کولر</h3>
                <br>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>توسط :</span>
                    <span id="nameM3"> آقDFSDای محمد روشنگر</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>ساعت اتمام خدمت :</span>
                    <span>17:35</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>  تاریخ :</span>
                    <span>98/11/6</span>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6" style="float: right;padding-right: 0">
                        <span>هزینه پرداخت شده :</span>
                        <span>100000 تومان</span>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 col-md-offset-3 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1 btn-lg btn-sabt-nazar" >
                        متخصص منتخب
                    </div>
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 btn-lg btn-sabt-nazar" style="margin-left: 1rem"  data-toggle="modal" data-target="#myModal2">
                        ثبت نظر و امتیاز
                    </div>
                    <!-- Modal -->
                    <div id="myModal2" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtmodal">
                                        <h3 class="txtc">تعمیرات کولر</h3>
                                        <br>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>توسط :</span>
                                            <span> آقای محمد روشنگر</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>ساعت اتمام خدمت :</span>
                                            <span>17:35</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>  تاریخ :</span>
                                            <span>98/11/6</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>هزینه پرداخت شده :</span>
                                            <span>100000 تومان</span>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                    <div style="margin-right: 20rem">
                                        <div class="rate">
                                            <input type="radio" id="star11" name="rate" value="5" />
                                            <label for="star11" title="text">5 stars</label>
                                            <input type="radio" id="star12" name="rate" value="4" />
                                            <label for="star12" title="text">4 stars</label>
                                            <input type="radio" id="star13" name="rate" value="3" />
                                            <label for="star13" title="text">3 stars</label>
                                            <input type="radio" id="star14" name="rate" value="2" />
                                            <label for="star14" title="text">2 stars</label>
                                            <input type="radio" id="star15" name="rate" value="1" />
                                            <label for="star15" title="text">1 star</label>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="inputtext">
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn-sabt-nazar1 btn btn-default" data-dismiss="modal">ثبت نظر و امتیاز</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
        </div>
        <!---->
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 flex-of style-m" style="padding:25px 0;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtss">
                <h3 class="txtc">تعمیرات کولر</h3>
                <br>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>توسط :</span>
                    <span id="nameM4"> آقای محمد روشFFFFنگر</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>ساعت اتمام خدمت :</span>
                    <span>17:35</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>  تاریخ :</span>
                    <span>98/11/6</span>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6" style="float: right;padding-right: 0">
                        <span>هزینه پرداخت شده :</span>
                        <span>100000 تومان</span>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 col-md-offset-3 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1 btn-lg btn-sabt-nazar" >
                        متخصص منتخب
                    </div>
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 btn-lg btn-sabt-nazar" style="margin-left: 1rem" data-toggle="modal" data-target="#myModal3">
                        ثبت نظر و امتیاز
                    </div>
                    <!-- Modal -->
                    <div id="myModal3" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtmodal">
                                        <h3 class="txtc">تعمیرات کولر</h3>
                                        <br>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>توسط :</span>
                                            <span> آقای محمد روشنگر</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>ساعت اتمام خدمت :</span>
                                            <span>17:35</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>  تاریخ :</span>
                                            <span>98/11/6</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>هزینه پرداخت شده :</span>
                                            <span>100000 تومان</span>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                    <div style="margin-right: 20rem">
                                        <div class="rate">
                                            <input type="radio" id="star16" name="rate" value="5" />
                                            <label for="star16" title="text">5 stars</label>
                                            <input type="radio" id="star17" name="rate" value="4" />
                                            <label for="star17" title="text">4 stars</label>
                                            <input type="radio" id="star18" name="rate" value="3" />
                                            <label for="star18" title="text">3 stars</label>
                                            <input type="radio" id="star19" name="rate" value="2" />
                                            <label for="star19" title="text">2 stars</label>
                                            <input type="radio" id="star20" name="rate" value="1" />
                                            <label for="star20" title="text">1 star</label>
                                        </div>
                                    </div>

                                    <hr style="width: 60%;">
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="inputtext">
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn-sabt-nazar1 btn btn-default" data-dismiss="modal">ثبت نظر و امتیاز</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
        </div>
        <!---->
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 flex-of style-m" style="padding:25px 0;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtss">
                <h3 class="txtc">تعمیرات کولر</h3>
                <br>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>توسط :</span>
                    <span id="nameM5"> آEEEقای محمد روشنگر</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>ساعت اتمام خدمت :</span>
                    <span>17:35</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>  تاریخ :</span>
                    <span>98/11/6</span>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6" style="float: right;padding-right: 0">
                        <span>هزینه پرداخت شده :</span>
                        <span>100000 تومان</span>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 col-md-offset-3 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1 btn-lg btn-sabt-nazar" >
                        متخصص منتخب
                    </div>
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 btn-lg btn-sabt-nazar" style="margin-left: 1rem" data-toggle="modal" data-target="#myModal4">
                        ثبت نظر و امتیاز
                    </div>
                    <!-- Modal -->
                    <div id="myModal4" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtmodal">
                                        <h3 class="txtc">تعمیرات کولر</h3>
                                        <br>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>توسط :</span>
                                            <span> آقای محمد روشنگر</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>ساعت اتمام خدمت :</span>
                                            <span>17:35</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>  تاریخ :</span>
                                            <span>98/11/6</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>هزینه پرداخت شده :</span>
                                            <span>100000 تومان</span>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                    <div style="margin-right: 20rem">
                                        <div class="rate">
                                            <input type="radio" id="star21" name="rate" value="5" />
                                            <label for="star21" title="text">5 stars</label>
                                            <input type="radio" id="star22" name="rate" value="4" />
                                            <label for="star22" title="text">4 stars</label>
                                            <input type="radio" id="star23" name="rate" value="3" />
                                            <label for="star23" title="text">3 stars</label>
                                            <input type="radio" id="star24" name="rate" value="2" />
                                            <label for="star24" title="text">2 stars</label>
                                            <input type="radio" id="star25" name="rate" value="1" />
                                            <label for="star25" title="text">1 star</label>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="inputtext">
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn-sabt-nazar1 btn btn-default" data-dismiss="modal">ثبت نظر و امتیاز</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
        </div>
        <!---->
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 flex-of style-m" style="padding:25px 0;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtss">
                <h3 class="txtc">تعمیرات کولر</h3>
                <br>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>توسط :</span>
                    <span id="nameM6"> آقای محمد روLLLLشنگر</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>ساعت اتمام خدمت :</span>
                    <span>17:35</span>
                </div>
                <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6">
                    <span>  تاریخ :</span>
                    <span>98/11/6</span>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6" style="float: right;padding-right: 0">
                        <span>هزینه پرداخت شده :</span>
                        <span>100000 تومان</span>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 col-md-offset-3 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1 btn-lg btn-sabt-nazar" >
                        متخصص منتخب
                    </div>
                    <div class="col-md-3 col-xs-5 col-lg-3 col-sm-5 btn-lg btn-sabt-nazar" style="margin-left: 1rem" data-toggle="modal" data-target="#myModal5">
                        ثبت نظر و امتیاز
                    </div>
                    <!-- Modal -->
                    <div id="myModal5" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 txtmodal">
                                        <h3 class="txtc">تعمیرات کولر</h3>
                                        <br>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>توسط :</span>
                                            <span> آقای محمد روشنگر</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>ساعت اتمام خدمت :</span>
                                            <span>17:35</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>  تاریخ :</span>
                                            <span>98/11/6</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6">
                                            <span>هزینه پرداخت شده :</span>
                                            <span>100000 تومان</span>
                                        </div>
                                    </div>
                                    <hr style="width: 60%;">
                                    <div style="margin-right: 20rem">
                                        <div class="rate">
                                            <input type="radio" id="star26" name="rate" value="5" />
                                            <label for="star26" title="text">5 stars</label>
                                            <input type="radio" id="star27" name="rate" value="4" />
                                            <label for="star27" title="text">4 stars</label>
                                            <input type="radio" id="star28" name="rate" value="3" />
                                            <label for="star28" title="text">3 stars</label>
                                            <input type="radio" id="star29" name="rate" value="2" />
                                            <label for="star29" title="text">2 stars</label>
                                            <input type="radio" id="star30" name="rate" value="1" />
                                            <label for="star30" title="text">1 star</label>
                                        </div>
                                    </div>

                                    <hr style="width: 60%;">
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="inputtext">
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn-sabt-nazar1 btn btn-default" data-dismiss="modal">ثبت نظر و امتیاز</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>
            </div>
        </div>
        <!---->
    </div>
    <!--------------------->
    <div id="ahvaz" class="tabcontent">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12 tab5">
            <p> با معرفی <b>وردست</b> به دوستان خود کسب درآمد کنید.<br> شما می توانید با ارسال لینک دعوت به دوستان خود، به تعداد نامحدود با هر ثبت سفارش آنها درآمد کسب کنید.<br> <b>وردست</b> در هر سفارش دوستان شما،20 درصد درآمد خود را به عنوان اعتبار به شما پرداخت می کند.<br>تمامی درآمدی که کسب می کنید، در اعتبار شما شارژ می شود که هم می توانید از آن برای دریافت خدمات <b>وردست</b> استفاده کنید و هم مبلغ افزوده را در صورتی که بیش از 100 هزار تومان شود، از <b>وردست</b> دریافت نمایید.  </p>
            <div class="col-md-8 col-xs-8 col-lg-8 col-sm-8 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 col-x-offset-2" style="padding-top: 50px">
                <div class="input-group" style="direction: ltr">
                    <span class="input-group-btn copyinput">
                        <button class="copy-btn btn btn-default" type="button">کپی</button>
                    </span>
                    <input type="text" disabled class="form-control codeinp">
                </div>
                <div class="social-div">
                    <a href="#"><img src="IMG/whatssss.svg" class="socialsize"></a>
                    <a href="#"><img src="IMG/instagram-png-instagram-png-logo-1455.svg" class="socialsize"></a>
                    <a href="#"><img src="IMG/instagram-png-instagram-png-logo-1455.svg" class="socialsize"></a>
                    <a href="#"><img src="IMG/instagram-png-instagram-png-logo-1455.svg" class="socialsize"></a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="JS/jquery.js"></script>
<script src="JS/bootstrap.js"></script>
<script src="JS/MYjs.js"></script>
<script src="JS/clndr/bootstrap-datepicker.min.js"></script>
<script src="JS/clndr/bootstrap-datepicker.fa.min.js"></script>
<script>
    $(document).ready(function() {
        $("#datepicker0").datepicker();

        $("#datepicker1").datepicker();
        $("#datepicker1btn").click(function(event) {
            event.preventDefault();
            $("#datepicker1").focus();
        })

        $("#datepicker2").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $("#datepicker3").datepicker({
            numberOfMonths: 3,
            showButtonPanel: true
        });

        $("#datepicker4").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy/m/d"
        });

        $("#datepicker5").datepicker({
            minDate: 0,
            maxDate: "+14D"
        });

        $("#datepicker6").datepicker({
            isRTL: true,
            dateFormat: "d/m/yy"
        });
    });
</script>
<script>
    Notiflix.Notify.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        timeout: 1500,
    });
</script>
<script>
    Notiflix.Confirm.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        cancelButtonBackground: "#ef2828",
    });
</script>

</html>