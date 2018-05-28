<?php
function optionsframework_option_name(){
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/","_",strtolower($themename));
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework',$optionsframework_settings);
}
function optionsframework_options(){
    $imagepath = get_template_directory_uri().'/inc/theme-options/images/';
    $options = array();
    $options[] = array(
        'name'=>'站点配置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'站点图标',
        'id'=>'site_ico',
        'std'=>get_template_directory_uri().'/images/favicon.ico',
        'type'=>'upload');
    $options[] = array(
        'name'=>'Gravatar头像服务器地址',
        'desc'=>'不确定请勿更改',
        'id'=>'gravatar_url',
        'std'=>'cn.gravatar.com/avatar',
        'type'=>'text');
    $options[] = array(
        'name'=>'PJAX',
        'desc' =>'是否启用页面PJAX加载',
        'id'=>'page_pjax',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'站点地图',
        'desc' =>'是否启用站点地图(更新文章时生成，需要/目录的写权限)',
        'id'=>'sitemap',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'背景类型',
        'desc'=>'选择您喜欢的背景类型并修改其对应选项',
        'id'=>'background_mode',
        'std'=>'color',
        'type'=>'select',
        'class'=>'mini',
        'options'=>array(
            'color'=>'纯色',
            'image'=>'图片'));
    $options[] = array(
        'name'=>'背景颜色',
        'desc'=>'整个站点背景颜色控制(背景类型选择为纯色才有效)',
        'id'=>'background_index_color',
        'std'=>'#f5f5f5',
        'type'=>'color');
    $options[] = array(
        'name'=>'背景图片',
        'desc'=>'整个站点背景图片控制(背景类型选择为图片才有效)',
        'id'=>'background_index_image',
        'std'=>get_template_directory_uri().'/images/index_image.png',
        'type'=>'upload');
    $options[] = array(
        'name'=>'主页布局',
        'desc'=>'选择[主页]布局(显示左边栏，无边栏，右边栏)，默认显示右边栏',
        'id'=>"home_side_bar",
        'std'=>"right_side",
        'type'=>"images",
        'options'=>array(
            'left_side'=>$imagepath.'col-left.png',
            'center'=>$imagepath.'col.png',
            'right_side'=>$imagepath.'col-right.png'));
    $options[] = array(
        'name'=>'文章列表布局',
        'desc'=>'选择你喜欢的列表布局，默认显示新式列表布局',
        'id'=>"list_layout",
        'std'=>"new_layout",
        'type'=>"images",
        'options'=>array(
            'old_layout'=>$imagepath.'old-layout.png',
            'new_layout'=>$imagepath.'new-layout.png'));
    $options[] = array(
        'name'=>'分类页面',
        'desc' =>'是否启用分类页面的名称以及简介功能',
        'id'=>'show_head_cat',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'标签页面',
        'desc' =>'是否启用标签页面的名称以及简介功能',
        'id'=>'show_head_tag',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'头像本地上传',
        'desc'=>'是否允许普通用户上传本地头像',
        'id'=>'lo_ava',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'侧边栏随动',
        'desc'=>'是否启用侧边栏小工具随动功能',
        'id'=>'site_sa',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'评论UA',
        'desc'=>'是否在评论区显示评论者UA信息',
        'id'=>'comment_ua',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'浮动小人',
        'desc'=>'选择浮动小人类型或关闭此功能',
        'id'=>'site_girl',
        'std'=>'none',
        'type'=>'select',
        'class'=>'mini',
        'options'=>array(
            'none'=>'关闭',
            'spig'=>'静态图片',
            'l2d'=>'动态live2d'));
    $options[] = array(
        'name'=>'网易云音乐',
        'desc'=>'是否启用网易云音乐自动播放功能',
        'id'=>'wy_music',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'微信展示',
        'desc'=>'是否启用微信展示按钮功能',
        'id'=>'cd_weixin',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'页面伪静态',
        'desc'=>'是否启用自定义页面伪静态功能',
        'id'=>'page_html',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'组件配置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'自定义Font Awesome',
        'desc'=>'自定义Font Awesome字体库链接，留空将从本地加载',
        'id'=>'fa_url',
        'std'=>'https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css',
        'type'=>'text');
    $options[] = array(
        'name'=>'自定义Bootstrap(JS)',
        'desc'=>'自定义Bootstrap链接，留空将从本地加载',
        'id'=>'bs_url',
        'std'=>'https://cdn.jsdelivr.net/npm/bootstrap3@3.3.5/dist/js/bootstrap.min.js',
        'type'=>'text');
    $options[] = array(
        'name'=>'自定义jQuery',
        'desc'=>'自定义jQuery链接，留空将从本地加载',
        'id'=>'jq_url',
        'std'=>'https://cdn.jsdelivr.net/npm/jquery@2.1.4/dist/jquery.min.js',
        'type'=>'text');
    $options[] = array(
        'name'=>'其它JS与CSS',
        'desc'=>'从jsdelivr加载主题其它JS与CSS',
        'id'=>'js_out',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'表情包',
        'desc'=>'从jsdelivr加载主题表情包',
        'id'=>'owo_out',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'特色图片(仅针对新式布局)',
        'desc'=>'选择你喜欢的默认特色图片(留空使用随机图片20张)',
        'id'=>'default_image',
        'type'=>'upload');
    $options[] = array(
        'name'=>'微信二维码',
        'desc'=>'上传你的微信二维码图片，尺寸要大于等于150px',
        'id'=>'weixin_image',
        'std'=>get_template_directory_uri().'/images/weixin.png',
        'type'=>'upload');
    $options[] = array(
        'name'=>'建站时间',
        'desc'=>'输入你的建站时间，格式MM/DD/YYYY hh:mm:ss',
        'id'=>'createtime',
        'std'=>'01/25/2017 15:25:00',
        'type'=>'text');
    $options[] = array(
        'name'=>'打赏页面标题',
        'id'=>'paytext_head',
        'std'=>'打赏作者',
        'type'=>'text');
    $options[] = array(
        'name'=>'付款码上方提示文字',
        'id'=>'paytext',
        'std'=>'扫一扫支付',
        'type'=>'text');
    $options[] = array(
        'name'=>'微信收款码',
        'desc'=>'上传你的微信收款二维码图片，图片尺寸要大于200px',
        'id'=>'wechatpayqr_url',
        'std'=>get_template_directory_uri().'/images/wechatpayqr.png',
        'type'=>'upload');
    $options[] = array(
        'name'=>'支付婊收款码',
        'desc'=>'上传你的支付婊收款二维码图片，图片尺寸要大于200px',
        'id'=>'alipayqr_url',
        'std'=>get_template_directory_uri().'/images/alipayqr.png',
        'type'=>'upload');
    $options[] = array(
        'name'=>'SEO配置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'关键词',
        'desc'=>'每个关键词之间用英文逗号分割',
        'id'=>'site_keywords',
        'type'=>'text');
    $options[] = array(
        'name'=>'站点描述',
        'id'=>'site_description',
        'std'=>'',
        'type'=>'textarea');
    $options[] = array(
        'name'=>'站点统计(不要包括SCRIPT标签)',
        'id'=>'script_tongji',
        'std'=>'',
        'type'=>'textarea');
    $options[] = array(
        'name'=>'顶部配置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'顶部显示模式',
        'id'=>'head_mode',
        'std'=>'pic',
        'type'=>'select',
        'class'=>'mini',
        'options'=>array(
            'pic'=>'图片',
            'color'=>'纯色'));
    $options[] = array(
        'name'=>'以下为图片Header的设置',
        'desc'=>'只有顶部显示模式为图片才有效。');
    $options[] = array(
        'name'=>'顶部图片',
        'id'=>'background_image',
        'std'=>get_template_directory_uri().'/images/background.jpg',
        'type'=>'upload');
    $options[] = array(
        'name'=>'图片文字-1(可做文字标题)',
        'id'=>'background_image_text1',
        'std'=>'Kratos(M)',
        'type'=>'text');
    $options[] = array(
        'name'=>'图片文字-2(可做站点描述)',
        'id'=>'background_image_text2',
        'std'=>'A responsible theme for WordPress',
        'type'=>'text');
    $options[] = array(
        'name'=>'以下为纯色Header与移动端设置',
        'desc'=>'只有顶部显示模式为纯色才有效(PC)。');
    $options[] = array(
        'name'=>'Nav Bar颜色',
        'desc'=>'同移动端Header的颜色',
        'id'=>'banner_color',
        'std'=>'#16171a',
        'type'=>'color');
    $options[] = array(
        'name'=>'Nav Bar透明度',
        'desc'=>'可选 0～1，1为不透明',
        'id'=>'banner_color_op',
        'std'=>'.9',
        'type'=>'text');
    $options[] = array(
        'name'=>'移动端侧边栏菜单颜色',
        'desc'=>'请使用RGB格式表示，默认42,42,42,.9',
        'id'=>'mobi_color',
        'std'=>'42,42,42,.9',
        'type'=>'text');
    $options[] = array(
        'name'=>'图片Logo',
        'desc'=>'高40px，宽最大200px，不设置将显示文字Logo',
        'id'=>'banner_logo',
        'type'=>'upload');
    $options[] = array(
        'name'=>'页脚配置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'工信部备案信息',
        'desc'=>'输入您的工信部备案号，针对国际版没有备案信息栏目的功能',
        'id'=>'icp_num',
        'type'=>'text');    
    $options[] = array(
        'name'=>'公安网备案信息',
        'desc'=>'输入您的公安网备案号',
        'id'=>'gov_num',
        'type'=>'text');    
    $options[] = array(
        'name'=>'公安网备案连接',
        'desc'=>'输入您的公安网备案的链接地址',
        'id'=>'gov_link',
        'type'=>'text');
    $options[] = array(
        'name'=>'新浪微博',
        'desc'=>'连接前要带有 http:// 或者 https:// ',
        'id'=>'social_weibo',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'腾讯微博',
        'desc'=>'连接前要带有 http:// 或者 https:// ',
        'id'=>'social_tweibo',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'Twitter',
        'desc'=>'连接前要带有 http:// 或者 https:// ',
        'id'=>'social_twitter',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'FaceBook',
        'desc'=>'连接前要带有 http:// 或者 https:// ',
        'id'=>'social_facebook',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'LinkedIn',
        'desc'=>'连接前要带有 http:// 或者 https:// ',
        'id'=>'social_linkedin',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'GayHub',
        'desc'=>'连接前要带有 http:// 或者 https:// ',
        'id'=>'social_github',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'Mail',
        'desc'=>'连接前要带有mailto: ',
        'id'=>'social_mail',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'文章设置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'文章页面布局',
        'desc'=>'选择[文章]页面布局(显示左边栏，无边栏，右边栏)，默认显示右边栏',
        'id'=>"side_bar",
        'std'=>"right_side",
        'type'=>"images",
        'options'=>array(
            'left_side'=>$imagepath.'col-left.png',
            'center'=>$imagepath.'col.png',
            'right_side'=>$imagepath.'col-right.png'));
    $options[] = array(
        'name'=>'版权声明',
        'desc'=>'是否启用 CC BY-SA 4.0 声明',
        'id'=>'post_cc',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'分享按钮',
        'desc'=>'是否启用文章分享功能',
        'id'=>'post_share',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'打赏按钮',
        'desc'=>'是否启用文章打赏功能',
        'id'=>'post_like_donate',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'页面设置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'页面布局',
        'desc'=>'选择[页面]布局(显示左边栏，无边栏，右边栏)，默认显示右边栏',
        'id'=>"page_side_bar",
        'std'=>"right_side",
        'type'=>"images",
        'options'=>array(
            'left_side'=>$imagepath.'col-left.png',
            'center'=>$imagepath.'col.png',
            'right_side'=>$imagepath.'col-right.png'));    
    $options[] = array(
        'name'=>'版权声明',
        'desc'=>'是否启用 CC BY-SA 4.0 声明',
        'id'=>'page_cc',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'分享按钮',
        'desc'=>'是否启用页面分享功能',
        'id'=>'page_share',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'打赏按钮',
        'desc'=>'是否启用页面打赏功能',
        'id'=>'page_like_donate',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'404页面-错误标题',
        'id'=>'error_text1',
        'std'=>'很抱歉，你访问的页面不存在',
        'type'=>'text');
    $options[] = array(
        'name'=>'404页面-错误副标题',
        'id'=>'error_text2',
        'std'=>'可能是输入地址有误或该地址已被删除',
        'type'=>'text');
    $options[] = array(
        'name'=>'轮播设置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'主页轮播',
        'desc'=>'是否启用轮播功能',
        'id'=>'kratos_banner',
        'std'=>'0',
        'type'=>'checkbox',);
    $options[] = array(
        'name'=>'注意：',
        'desc'=>'图片宽度建议大于750px，所有图片比例须一致');
    $options[] = array(
        'name'=>'轮播图片-1',
        'id'=>'kratos_banner1',
        'type'=>'upload');
    $options[] = array(
        'name'=>'轮播链接-1',
        'desc'=>'链接可以留空',
        'id'=>'kratos_banner_url1',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'轮播图片-2',
        'id'=>'kratos_banner2',
        'type'=>'upload');
    $options[] = array(
        'name'=>'链接2',
        'desc'=>'链接可以留空',
        'id'=>'kratos_banner_url2',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'轮播图片-3',
        'id'=>'kratos_banner3',
        'type'=>'upload');
    $options[] = array(
        'name'=>'链接3',
        'desc'=>'链接可以留空',
        'id'=>'kratos_banner_url3',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'轮播图片-4',
        'id'=>'kratos_banner4',
        'type'=>'upload');
    $options[] = array(
        'name'=>'链接4',
        'desc'=>'链接可以留空',
        'id'=>'kratos_banner_url4',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'轮播图片-5',
        'id'=>'kratos_banner5',
        'type'=>'upload');
    $options[] = array(
        'name'=>'链接5',
        'desc'=>'链接可以留空',
        'id'=>'kratos_banner_url5',
        'std'=>'',
        'type'=>'text');
    $options[] = array(
        'name'=>'邮件设置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'SMTP服务',
        'desc'=>'是否启用SMTP邮件发送服务',
        'id'=>'mail_smtps',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'发信人',
        'desc'=>'请填写发件人姓名',
        'id'=>'mail_name',
        'std'=>'犬の窝-邮件通知',
        'type'=>'text');
    $options[] = array(
        'name'=>'邮件服务器',
        'desc'=>'请填写SMTP服务器地址',
        'id'=>'mail_host',
        'std'=>'smtp.office365.com',
        'type'=>'text');
    $options[] = array(
        'name'=>'服务器端口',
        'desc'=>'请填写SMTP服务器端口',
        'id'=>'mail_port',
        'std'=>'587',
        'type'=>'text');
    $options[] = array(
        'name'=>'邮箱帐号',
        'desc'=>'请填写邮箱账号',
        'id'=>'mail_username',
        'std'=>'no_reply@fczbl.vip',
        'type'=>'text');
    $options[] = array(
        'name'=>'邮箱密码',
        'desc'=>'请填写邮箱密码',
        'id'=>'mail_passwd',
        'std'=>'123456789',
        'type'=>'password');
    $options[] = array(
        'name'=>'启用SMTPAuth服务',
        'desc'=>'是否启用SMTPAuth服务',
        'id'=>'mail_smtpauth',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'SMTPSecure设置',
        'desc'=>'若启用SMTPAuth服务则填写ssl，若不启用则留空',
        'id'=>'mail_smtpsecure',
        'std'=>'ssl',
        'type'=>'text');
    $options[] = array(
        'name'=>'雪花设置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'站点雪花',
        'desc'=>'是否启用站点雪花功能',
        'id'=>'site_snow',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'移动端是否显示',
        'desc'=>'配置移动端是否显示，默认是',
        'id'=>'snow_xb2016_mobile',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'雪花数量',
        'desc'=>'数值越大雪花数量越多，默认150',
        'id'=>'snow_xb2016_flakecount',
        'std'=>'150',
        'type'=>'text');
    $options[] = array(
        'name'=>'雪花大小',
        'desc'=>'为基准值，数值越大雪花越大，默认2',
        'id'=>'snow_xb2016_size',
        'std'=>'2',
        'type'=>'text');
    $options[] = array(
        'name'=>'雪花距离',
        'desc'=>'雪花距离鼠标指针的最小值，小于这个距离的雪花将受到鼠标的排斥，默认100',
        'id'=>'snow_xb2016_mindist',
        'std'=>'100',
        'type'=>'text');
    $options[] = array(
        'name'=>'雪花速度',
        'desc'=>'为基准值，数值越大雪花速度越快，默认0.5',
        'id'=>'snow_xb2016_speed',
        'std'=>'0.5',
        'type'=>'text');
    $options[] = array(
        'name'=>'雪花横移度',
        'desc'=>'为基准值，数值越大雪花横移幅度越大，0为竖直下落，默认1',
        'id'=>'snow_xb2016_stepsize',
        'std'=>'1',
        'type'=>'text');
    $options[] = array(
        'name'=>'雪花颜色',
        'desc'=>'请用RGB格式表示，默认255,255,255',
        'id'=>'snow_xb2016_snowcolor',
        'std'=>'255,255,255',
        'type'=>'text');
    $options[] = array(
        'name'=>'雪花不透明度',
        'desc'=>'为基准值，范围0~1，1为不透明，默认0.3',
        'id'=>'snow_xb2016_opacity',
        'std'=>'0.3',
        'type'=>'text');
    $options[] = array(
        'name'=>'注册登录设置',
        'type'=>'heading');
    $options[] = array(
        'name'=>'注册登录页面背景',
        'desc'=>'因为默认使用了Bing每日美图API，所以这里只能手动写链接了...',
        'id'=>'login_bak',
        'std'=>'https://www.fczbl.vip/api/bing',
        'type'=>'text');
    $options[] = array(
        'name'=>'注册登录页面站点图标',
        'id'=>'login_logo',
        'std'=>get_template_directory_uri().'/images/default-logo.png',
        'type'=>'upload');
    $options[] = array(
        'name'=>'以下为用户注册部分的设置');
    $options[] = array(
        'name'=>'使用密码注册',
        'desc'=>'是否允许用户输入密码注册(免邮箱验证)',
        'id'=>'mail_reg',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'域名限制模式',
        'desc'=>'如果不想限制邮箱，请将此部分设置保持默认。',
        'id'=>'dmode',
        'std'=>'black',
        'type'=>'select',
        'class'=>'mini',
        'options'=>array(
            'white'=>'白名单模式',
            'black'=>'黑名单模式'));
    $options[] = array(
        'name'=>'域名白名单列表(一行一个)',
        'id'=>'dwhite',
        'std'=>'',
        'type'=>'textarea');
    $options[] = array(
        'name'=>'域名黑名单列表(一行一个)',
        'id'=>'dblack',
        'std'=>'',
        'type'=>'textarea');
    $options[] = array(
        'name'=>'错误信息',
        'desc'=>'用户域名被阻止时的提示信息',
        'id'=>'derror',
        'std'=>'本站禁止此域名的邮箱注册，请更换邮箱再试。',
        'type'=>'text');
    $options[] = array(
        'name'=>'以下为用户登录限制部分设置',
        'desc'=>'默认不启用，但是建议手动启用此功能',);
    $options[] = array(
        'name'=>'用户登录限制',
        'desc'=>'是否启用登录限制功能(只有启用此项，下面的设置才有效)',
        'id'=>'login_limit',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'登录尝试机会',
        'desc'=>'允许输错密码的次数，默认3',
        'id'=>'allowed_retries',
        'std'=>'3',
        'type'=>'text');
    $options[] = array(
        'name'=>'初始锁定时间',
        'desc'=>'单位秒，不应小于60，默认1200(20分钟)',
        'id'=>'lockout_duration',
        'std'=>'1200',
        'type'=>'text');
    $options[] = array(
        'name'=>'增加锁定时间所需锁定次数',
        'desc'=>'默认3次',
        'id'=>'allowed_lockouts',
        'std'=>'3',
        'type'=>'text');
    $options[] = array(
        'name'=>'增加后的锁定时间',
        'desc'=>'单位秒，不应小于3600，默认86400(24小时)',
        'id'=>'long_duration',
        'std'=>'86400',
        'type'=>'text');
    $options[] = array(
        'name'=>'自动清除锁定IP的时间',
        'desc'=>'单位秒，默认43200(12小时)',
        'id'=>'valid_duration',
        'std'=>'43200',
        'type'=>'text');
    $options[] = array(
        'name'=>'控制Cookie登录',
        'desc'=>'是否控制Cookie登录',
        'id'=>'cookies',
        'std'=>'1',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'邮件提醒',
        'desc'=>'是否启用锁定邮件提醒功能(请在下方设置提醒阈值)',
        'id'=>'lockout_notify_m',
        'std'=>'0',
        'type'=>'checkbox');
    $options[] = array(
        'name'=>'锁定提醒阈值',
        'desc'=>'默认2次(启用上方的邮件提醒功能才有效)',
        'id'=>'notify_email_after',
        'std'=>'2',
        'type'=>'text');
    return $options;
}