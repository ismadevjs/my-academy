<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Potenza - Job Application Form Wizard with Resume upload and Branch feature">
    <meta name="author" content="Ansonika">
    <title>Estimara</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('form/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="{{ asset('form/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="{{ asset('form/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('form/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('form/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('form/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('form/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('form/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('form/css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('form/css/custom.css') }}" rel="stylesheet">

    <!-- MODERNIZR MENU -->
    <script src="{{ asset('form/js/modernizr.j') }}s"></script>

</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->

    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->

    <nav>
        <ul class="cd-primary-nav">
            <li><a href="index.html" class="animated_link">Version 1</a></li>
            <li><a href="index-2.html" class="animated_link">Version 2</a></li>
            <li><a href="index-3.html" class="animated_link">Version 3</a></li>
            <li><a href="about.html" class="animated_link">About Us</a></li>
            <li><a href="contacts.html" class="animated_link">Contact Us</a></li>
            <li><a href="#0" class="animated_link">Purchase Template</a></li>
        </ul>
    </nav>
    <!-- /menu -->

    <div class="container-fluid">
        <div class="row row-height">
            <div class="col-xl-4 col-lg-4 content-left">
                <div class="content-left-wrapper">
                    
                    <div>
                        <figure><img src="{{ asset('form/img/ibtassim.png') }}" alt="" class="img-fluid"
                                width="270" height="270"></figure>
                        <h2>نادي ابتسم</h2>
                        <p>انظم لنادي ابتسم للمعرفة</p>
                    </div>
                    <div class="copy">برمجة من طرف اسماعيل طيبي</div>
                </div>
                <!-- /content-left-wrapper -->
            </div>
            <!-- /content-left -->
            <div class="col-xl-8 col-lg-8 content-right" id="start">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <span id="location"></span>
                        <div id="progressbar"></div>
                    </div>
                    <!-- /top-wizard -->
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="website" name="website" type="text" value="">
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard ">
                            <div class="step text-right">
                                <h2 class="section_title text-right"> استمارة التسجيل</h2>
                                <h3 class="main_question"> رجاءا املأ البيانات</h3>
                                <div class="form-group add_top_30">
                                    <label for="name">الاسم واللقب</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control required" onchange="getVals(this, 'name_field');">
                                </div>
                                <div class="form-group add_top_30">
                                    <label for="name">تاريخ ومكان الازدياد</label>
                                    <input type="text" name="birth" id="name"
                                        class="form-control required" onchange="getVals(this, 'name_field');">
                                </div>
                                <div class="form-group add_top_30">
                                    <label for="name">العنوان</label>
                                    <input type="text" name="addr" id="name"
                                        class="form-control required" onchange="getVals(this, 'name_field');">
                                </div>
                                <div class="form-group">
                                    <label for="email">البريد الالكتروني (الايميل)</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control required" onchange="getVals(this, 'email_field');">
                                </div>
                                <div class="form-group">
                                    <label for="phone">رقم الهاتف</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control required">
                                </div>
                                <label>الجنس</label>
                                <div class="form-group radio_input">
                                    <label class="container_radio mr-3">دكر
                                        <input type="radio" name="gender" value="Male" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container_radio">أنثى
                                        <input type="radio" name="gender" value="Female" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group add_bottom_30 add_top_20">
                                    <label>صورة شمسية<br><small></small></label>
                                    <div class="fileupload">
                                        <input type="file" name="avatar"
                                            class="required">
                                    </div>
                                </div>
                            </div>
                            <!-- /step-->

                            <!-- /Start Branch ============================== -->
                            <div class="submit step" id="end" >
                                <h2 class="section_title">معلومات التسجيل</h2>
                                <h3 class="main_question">...</h3>
                                <div class="form-group">
                                    
                                    @foreach ($ateliers as $item)
                                    {{-- {{ dd($item) }} --}}
                                    <label class="container_radio version_2">{{ $item->name }}
                                            <input type="checkbox" name="ateliers[]"
                                            class="required" value="{{ $item->id }}">
                                          <span class="checkmark"></span>
                                        </label>
                                        @endforeach
                                    
                                </div>

                                <div class="form-group">
                                    <label for="hearing">من أين تعرفت على برنامج جمعية ابتسم للأنشطة الشبانية والثقافية</label>
                                    <input type="text" name="hearing" id="hearing"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="hearing">لماذا ترغب في الإنخراط في النادي</label>
                                    <textarea type="text" name="why" id="hearing"
                                        class="form-control"> </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="hearing">هل سبق ولك أن شاركت في نشاطات أو دورات نادي الإبداع والمعرفة للجمعية</label>
                                    <input type="text" name="enrolledBefore" id="hearing"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="hearing">ما هدفك من الإنخراط في نادي الإبداع والمعرفة لجمعية ابتسم .</label>
                                    <input type="text" name="yourGoal" id="hearing"
                                        class="form-control">
                                </div>


                            </div>

                        
                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">رجوع</button>
                            <button type="button" name="forward" class="forward">استمرار</button>
                            <button type="submit" name="process" class="submit">ارسل البيانات</button>
                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
            </div>
            <!-- /content-right-->
        </div>
        <!-- /row-->
    </div>
    <!-- /container-fluid -->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->

    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- /cd-overlay-content -->


    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('form/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('form/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('form/js/velocity.min.js') }}"></script>
    <script src="{{ asset('form/js/common_functions.js') }}"></script>
    <script src="{{ asset('form/js/file-validator.js') }}"></script>

    <!-- Wizard script-->
    <script src="{{ asset('form/js/func_1.js') }}"></script>
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                Dashmix.helpers('jq-notify', {
                    from: 'bottom',
                    align: 'left',
                    message: '{{ $error }}'
                });
            @endforeach
        @endif
    </script>

</body>

</html>
