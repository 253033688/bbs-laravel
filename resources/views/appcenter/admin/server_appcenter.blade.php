<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<iframe id="J_appcenter_iframe" data-id="appList" src="{{ $url }}" frameborder="0" scrolling="auto" width="100%" height="1000px"></iframe>
@include('admin.common.footer')
<script>
Wind.js(GV.JS_ROOT +'pages/appcenter/admin/appcenter_iframeHeightAuto.js?v='+ GV.JS_VERSION);
</script>
</body>
</html>
