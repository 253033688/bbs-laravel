<!doctype html>
<html>
<head>
    @include('common.head')
    <link href="{{ asset('assets/themes/site/default/css/dev/register.css') }} " rel="stylesheet"/>
</head>
<body>
<div class="wrap">
    @include('common.header')
    <div class="main_wrap">
        <div class="box_wrap register cc">
            <?php
            $_errMsg = $url ? '登录' : '登录';
            //TODO 不一样的登录提示类型
            if (isset($_GET['_type']) && $_GET['_type'] == 2) {
                $_errMsg = '为保证帐户安全，请重新登录';
            }
            ?>
            <h2 class="reg_head">{{ $_errMsg }}</h2>
            <div class="reg_cont_wrap">
                <div class="reg_cont">
                    <form id="J_u_login_form" action="{{ url('u/login/dorun') }}" method="post">
                        <div class="reg_form">

                            @if ($url)
                                <div class="tips"><span class="tips_icon">请登录后再继续浏览</span></div>
                            @endif

                            <dl class="cc">
                                <dt><label for="J_u_login_username">帐号：</label></dt>
                                <dd><input id="J_u_login_username" data-id="username" name="username" type="text"
                                           class="input length_4" aria-required="true" value=""></dd>
                                <dd id="J_u_login_tip_username" role="tooltip" aria-hidden="true" class="dd_r"></dd>
                            </dl>
                            <dl class="cc">
                                <dt><label for="J_u_login_password">密码：</label></dt>
                                <dd><input id="J_u_login_password" data-id="password" name="password"
                                           type="password" aria-required="true" class="input length_4" value="">
                                </dd>
                                <dd class="dd_r">
                                    <span id="J_u_login_tip_password" role="tooltip" aria-hidden="true"></span>
                                </dd>
                            </dl>
                            <div id="J_login_qa" style="display:none;"></div>

                            @if ($verify)
                                <dl class="cc dl_cd">
                                    <dt><label for="J_login_code">验证码：</label></dt>
                                    <dd>
                                        <input data-id="code" id="J_login_code" name="code" type="text"
                                               class="input length_4 mb5">
                                        <div id="J_verify_code"></div>
                                    </dd>
                                    <dd class="dd_r"><span id="J_u_login_tip_code"></span></dd>
                                </dl>
                            @endif

                            <dl class="cc pick">
                                <dt>&nbsp;</dt>
                                <dd><a rel="nofollow" href="{{ url('u/findPwd/run') }}"
                                       class="fr mr10">找回密码</a><input
                                            name="rememberme" value="31536000" type="checkbox" class="checkbox"
                                            id="cktime"><label for="cktime">自动登录</label></dd>
                            </dl>
                            <dl class="cc">
                                <dt>&nbsp;</dt>
                                <dd>
                                    <button class="btn btn_big btn_submit mr20" type="submit">登录</button>
                                    <input type="hidden" name="backurl" value="{{ $url }}">
                                    <input type="hidden" name="invite" value="{{ $invite }}"/>
                                </dd>
                            </dl>
                        </div>
                    </form>
                </div>
            </div>
            <div class="reg_side">
                <div class="reg_side_cont">
                    <p class="mb10">还没有帐号？</p>
                    <p class="mb20"><a rel="nofollow" href="{{ url('u/register/run') }}
                        <?php
                        if (!empty($invite)) {
                            echo '?invite=$invite';
                        }
                        ?>" class="btn btn_big">免费注册</a></p>
                    {{-- <hook name="login_sidebar"/> --}}
                </div>
            </div>
        </div>
    </div>
    @include('common.footer')
</div>
<script>
    Wind.use('jquery', 'global', 'validate', 'ajaxForm', function () {

        //聚焦时默认提示
        var focus_tips = {
            username: '{{ $loginWay }}',
            password: '',
            answer: '',
            myquestion: '',
            code: ''
        };

        var login_qa = $('#J_login_qa'), $qa_html = $('<dl id="J_qa_wrap" class="cc"><dt><label for="J_login_question">安全问题</label></dt><dd><select id="J_login_question" name="question" class="select_4"></select></dd></dl><dl class="cc"><dt><label for="J_login_answer">您的答案</label></dt><dd><input id="J_login_answer" name="answer" type="text" class="input length_4" value=""></dd><dd id="J_u_login_tip_answer" class="dd_r"></dd></dl>');
        var _statu = '',
                login_tip_username = $('#J_u_login_tip_username');

        var u_login_form = $("#J_u_login_form"),
                u_login_username = $('#J_u_login_username');

        u_login_form.validate({
            errorPlacement: function (error, element) {
                //错误提示容器
                $('#J_u_login_tip_' + element[0].name).html(error);
            },
            errorElement: 'span',
            errorClass: 'tips_icon_error',
            validClass: 'tips_icon_success',
            onkeyup: false, //remote ajax
            focusInvalid: false,
            rules: {
                username: {
                    required: true,
                    //nameCheck : true
                    remote: {
                        url: '{{ url('u/login/checkname') }}',
                        //beforeSend : '', //取消startRequest方法
                        dataType: "json",
                        type: 'post',
                        data: {
                            'username': function () {
                                return u_login_username.val();
                            }
                        },
                        complete: function (jqXHR, textStatus) {
                            if (!textStatus === 'success') {
                                return false;
                            }
                            var data = $.parseJSON(jqXHR.responseText);
                            if (data.state === 'success') {
                                if (data.message.safeCheck) {
                                    var q_arr = [];
                                    $.each(data.message.safeCheck, function (i, o) {
                                        q_arr.push('<option value="' + i + '">' + o + '</option>')
                                    });
                                    $qa_html.find('#J_login_question').html(q_arr.join(''));
                                    login_qa.html($qa_html).show();
                                    _statu = data.message._statu;
                                } else {
                                    login_qa.html('')
                                }
                                ;
                                login_tip_username.html('<span class="tips_icon_success"><span>');
                            } else {
                                login_tip_username.html('<span class="tips_icon_error"><span>' + data.message);
                            }
                        }
                    }
                },
                password: {
                    required: true/*,
                     remote : {
                     url : "{{ url('u/login/checkpwd') }}",
                     dataType: "json",
                     type : 'post',
                     data : {
                     username :  function(){
                     return u_login_username.val();
                     },
                     password : function(){
                     return $('#J_u_login_password').val();
                     }
                     }
                     }*/
                },
                /*
                 code : {
                 required : true,
                 remote : {
                 url : "{{ url('verify/index/check') }}",
                 dataType: "json",
                 data : {
                 code :  function(){
                 return $("#J_login_code").val();
                 }
                 },
                 complete:function(jqXHR, textStatus){
                 if(!textStatus === 'success') {
                 return false;
                 }
                 var data = $.parseJSON(jqXHR.responseText);
                 if( data.state!="success" ) {
                 $('#J_verify_update_a').click();
                 }
                 },
                 }
                 },
                 */
                question: {
                    required: true
                },
                answer: {
                    required: true,
                    remote: {
                        url: '{{ url('u/login/checkquestion') }}',
                        dataType: "json",
                        type: 'post',
                        ignoreRepeat: true,
                        data: {
                            question: function () {
                                if ($('#J_login_myquestion').length) {
                                    return $('#J_login_myquestion').val();
                                } else {
                                    return $('#J_login_question').val();
                                }
                            },
                            answer: function () {
                                return $("#J_login_answer").val();
                            },
                            _statu: function () {
                                return _statu;
                            }
                        }
                    }
                }
            },
            highlight: false,
            unhighlight: function (element, errorClass, validClass) {
                if (element.name === 'password') {
                    $('#J_u_login_tip_password').html('');
                    return;
                }
                //$('#J_u_login_tip_'+ $(element).data('id')).html('<span class="'+ validClass +'" data-text="text"><span>');
            },
            onfocusin: function (element) {
                var name = element.name;
                $(element).parents('dl').addClass('current');
                $('#J_u_login_tip_' + name).html('<span class="reg_tips" data-text="text">' + focus_tips[name] + '</span>');
            },
            onfocusout: function (element) {
                $(element).parents('dl').removeClass('current');
                //$('#J_u_login_tip_'+ $(element).data('id')).html('');
                if (element.name === 'username') {
                    this.element(element);
                }
            },
            messages: {
                username: {
                    required: '帐号不能为空'
                },
                password: {
                    required: '密码不能为空'
                },
                code: {
                    required: '验证码不能为空',
                    remote: '验证码不正确或已过期' //ajax验证默认提示
                },
                myquestion: {
                    required: '自定义问题不能为空',
                    remote: ''
                },
                answer: {
                    required: '问题答案不能为空'
                }
            },
            submitHandler: function (form) {
                var btn = $(form).find('button:submit');

                $(form).ajaxSubmit({
                    dataType: 'json',
                    beforeSubmit: function () {
                        //global.js
                        Wind.Util.ajaxBtnDisable(btn);
                    },
                    success: function (data, statusText, xhr, $form) {
                        if (data.state === 'success') {

                            //是否需要设置验证问题
                            if (data.message.check) {
                                data.message.check.url = (data.message.check.url).replace(/&amp;/gm, '&');
                                $.post(data.message.check.url, function (data) {
                                    //引入所需组件并显示弹窗
                                    Wind.use('dialog', function () {
                                        Wind.Util.ajaxBtnEnable(btn);
                                        Wind.dialog.html(data, {
                                            id: 'J_login_question_wrap',
                                            isDrag: true,
                                            isMask: false,
                                            onClose: function () {
                                                u_login_username.focus();
                                            },
                                            callback: function () {
                                                $('#J_login_question_wrap input:text:visible:first').focus();
                                            }
                                        });

                                    });
                                }, 'html');
                            } else {
                                window.location.href = decodeURIComponent(data.referer);
                            }

                        } else if (data.state === 'fail') {
                            //刷新验证码
                            $('#J_verify_update_a').click();
                            //global.js
                            Wind.Util.ajaxBtnEnable(btn);

                            if (data.message.qaE) {
                                //回答安全问题
                                return;
                            }

                            if (RegExp('答案').test(data.message)) {
                                //配合ignoreRepeat 处理问题答案不修改 再次验证
                                $('#J_u_login_tip_answer').html('<span for="J_login_answer" generated="true" class="tips_icon_error">' + data.message + '</span>');
                            } else {
                                //global.js
                                Wind.Util.resultTip({
                                    elem: btn,
                                    error: true,
                                    msg: data.message,
                                    follow: true
                                });
                            }

                        }
                    }
                });
            }
        });

        u_login_form.on('change', '#J_login_question', function () {
            if ($(this).val() == '-4') {
                $('#J_qa_wrap').after('<dl id="J_myquestion_wrap" class="cc"><dt><label>自定义问题</label></dt><dd><input id="J_login_myquestion" type="text" name="myquestion" value="" class="input length_4"></dd><dd class="dd_r" id="J_u_login_tip_myquestion"></dd></dl>');
            } else {
                $('#J_myquestion_wrap').remove();
            }
        });


        //聚焦第一个input
        u_login_form.find('input.input:visible:first').focus();

    });
</script>
</body>
</html>
