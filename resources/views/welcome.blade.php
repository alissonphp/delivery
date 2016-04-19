<!DOCTYPE html>
<html>
    <head>
        <title>Delivery Clube - São Luís, Maranhão</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            .bg {
                background: #fd746c !important; /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #e53935 , #e35d5b) !important; /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #e53935 , #e35d5b) !important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 70px;
                color: #FFFFFF;
            }
        </style>
    </head>
    <body class="bg">
    <div id="fb-root"></div>

    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=522872667761386";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="container">
            <div class="content">
                <img src="{{ asset('app/images/primary-logo-png-transp-reduzida.png') }}" alt="">
                <br><br>
                <div class="title">EM BREVE ... </div>
                <br><br>
                <div class="fb-page" data-href="https://www.facebook.com/DeliveryClube/" data-tabs="timeline" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/DeliveryClube/"><a href="https://www.facebook.com/DeliveryClube/">Delivery Clube</a></blockquote></div></div>
            </div>
        </div>
    </body>
</html>
