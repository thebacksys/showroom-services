<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Showroom Services</title>

    <style>
        .highlight table td {
            padding: 5px;
        }

        .highlight table pre {
            margin: 0;
        }

        .highlight .gh {
            color: #999999;
        }

        .highlight .sr {
            color: #f6aa11;
        }

        .highlight .go {
            color: #888888;
        }

        .highlight .gp {
            color: #555555;
        }

        .highlight .gs {}

        .highlight .gu {
            color: #aaaaaa;
        }

        .highlight .nb {
            color: #f6aa11;
        }

        .highlight .cm {
            color: #75715e;
        }

        .highlight .cp {
            color: #75715e;
        }

        .highlight .c1 {
            color: #75715e;
        }

        .highlight .cs {
            color: #75715e;
        }

        .highlight .c,
        .highlight .cd {
            color: #75715e;
        }

        .highlight .err {
            color: #960050;
        }

        .highlight .gr {
            color: #960050;
        }

        .highlight .gt {
            color: #960050;
        }

        .highlight .gd {
            color: #49483e;
        }

        .highlight .gi {
            color: #49483e;
        }

        .highlight .ge {
            color: #49483e;
        }

        .highlight .kc {
            color: #66d9ef;
        }

        .highlight .kd {
            color: #66d9ef;
        }

        .highlight .kr {
            color: #66d9ef;
        }

        .highlight .no {
            color: #66d9ef;
        }

        .highlight .kt {
            color: #66d9ef;
        }

        .highlight .mf {
            color: #ae81ff;
        }

        .highlight .mh {
            color: #ae81ff;
        }

        .highlight .il {
            color: #ae81ff;
        }

        .highlight .mi {
            color: #ae81ff;
        }

        .highlight .mo {
            color: #ae81ff;
        }

        .highlight .m,
        .highlight .mb,
        .highlight .mx {
            color: #ae81ff;
        }

        .highlight .sc {
            color: #ae81ff;
        }

        .highlight .se {
            color: #ae81ff;
        }

        .highlight .ss {
            color: #ae81ff;
        }

        .highlight .sd {
            color: #e6db74;
        }

        .highlight .s2 {
            color: #e6db74;
        }

        .highlight .sb {
            color: #e6db74;
        }

        .highlight .sh {
            color: #e6db74;
        }

        .highlight .si {
            color: #e6db74;
        }

        .highlight .sx {
            color: #e6db74;
        }

        .highlight .s1 {
            color: #e6db74;
        }

        .highlight .s {
            color: #e6db74;
        }

        .highlight .na {
            color: #a6e22e;
        }

        .highlight .nc {
            color: #a6e22e;
        }

        .highlight .nd {
            color: #a6e22e;
        }

        .highlight .ne {
            color: #a6e22e;
        }

        .highlight .nf {
            color: #a6e22e;
        }

        .highlight .vc {
            color: #ffffff;
        }

        .highlight .nn {
            color: #ffffff;
        }

        .highlight .nl {
            color: #ffffff;
        }

        .highlight .ni {
            color: #ffffff;
        }

        .highlight .bp {
            color: #ffffff;
        }

        .highlight .vg {
            color: #ffffff;
        }

        .highlight .vi {
            color: #ffffff;
        }

        .highlight .nv {
            color: #ffffff;
        }

        .highlight .w {
            color: #ffffff;
        }

        .highlight {
            color: #ffffff;
        }

        .highlight .n,
        .highlight .py,
        .highlight .nx {
            color: #ffffff;
        }

        .highlight .ow {
            color: #f92672;
        }

        .highlight .nt {
            color: #f92672;
        }

        .highlight .k,
        .highlight .kv {
            color: #f92672;
        }

        .highlight .kn {
            color: #f92672;
        }

        .highlight .kp {
            color: #f92672;
        }

        .highlight .o {
            color: #f92672;
        }
    </style>
    <link href="stylesheets/document.css" rel="stylesheet" media="screen">
    <script src="javascripts/document.js"></script>
</head>

<body class="th" data-languages="[&quot;http&quot;]">
    @include('api.layouts.menu')
    <div class="page-wrapper">
        <div class="dark-box"></div>
        <div class="content">
            <h1 id="version">Showroom Services Specification</h1>
            <h3>Version : {{ env('APP_VERSION') }}</h3>

            <h1 id="salesHistoryService">Sales History</h1>
            @include('api.contents.getTotalSalesWithBrandByDate')
            @include('api.contents.getTotalSalesWithBrandModelByDate')
            @include('api.contents.getTotalSalesWithBrandModelByEmployeeAndDate')
            @include('api.contents.newSalesHistory')

            <h1 id="vehicleModel">Vehicle Model</h1>
            @include('api.contents.newModel')
            @include('api.contents.updateModel')

            <h1 id="constants">Constants</h1>
            @include('api.contents.responseStatus')
        </div>
        <div class="dark-box">
            <div class="lang-selector">
                <a href="#" data-language-name="http" class="active">HTTP</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function prettyPrint(json) {
            var jsonLine = /^( *)("[\w]+": )?("[^"]*"|[\w.+-]*)?([,[{])?$/mg;
            var replacer = function(match, pIndent, pKey, pVal, pEnd) {
                var key = '<span class="json-key" style="color: #a6e22e">',
                    val = '<span class="json-value" style="color: #e6db74">',
                    str = '<span class="json-string" style="color: #e6db74">',
                    r = pIndent || '';
                if (pKey)
                    r = r + key + pKey.replace(/[": ]/g, '') + '</span>: ';
                if (pVal)
                    r = r + (pVal[0] == '"' ? str : val) + pVal + '</span>';
                return r + (pEnd || '');
            };

            return JSON.stringify(json, null, 3)
                .replace(/&/g, '&amp;').replace(/\\"/g, '&quot;')
                .replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(jsonLine, replacer);
        }

        function createRequestRow(requests) {
            var htmlRow = '';
            requests.forEach(element => {
                htmlRow += '<tr>';
                htmlRow += '<td>' + element.name + '</td>';
                htmlRow += '<td>' + element.type + '</td>';
                htmlRow += '<td>' + element.req + '</td>';
                htmlRow += '<td>' + element.desc + '</td>';
                htmlRow += '</tr>';
            });
            return htmlRow;
        }

        function createResponseRow(responseArr) {
            var htmlRow = '';
            responseArr.forEach(element => {
                htmlRow += '<tr>';
                htmlRow += '<td>' + element.name + '</td>';
                htmlRow += '<td>' + element.type + '</td>';
                htmlRow += '<td>' + element.desc + '</td>';
                htmlRow += '</tr>';
            });
            return htmlRow;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
