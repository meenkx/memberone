<!DOCTYPE html>
<html>
<head>
    <title>Member One Web application</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/preflight.min.css" rel="stylesheet">
    <!-- Any of your own CSS would go here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/utilities.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        @font-face {
            font-family: supermarket;
            src: url({{ asset('/font/supermarket.ttf') }});
        }
        body , html{
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: supermarket;
            background-image: linear-gradient(#FDE2E2, #A6E5F0);
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
            font-size: 40px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="title" style="margin: 0px 250px;">
                    โปรแกรมทดลองนี้เป็นโปรแกรมทดลองของ member one web application สะสมแต้ม ดำเนินการเพื่อส่งในวิชาเรียน Software Engineering or CPE327 class.
                </div>
            </div>
            <div class="col-12" style="margin-top: 50px;">
                <a href="/customer/"><button type="button" class="btn btn-primary" style="width: 300px;height: 50px;font-size: 25px">หน้าของ customer</button></a>
                <a href="/shop/"><button type="button" class="btn btn-light" style="width: 300px;margin-left: 100px;height: 50px;font-size: 25px">หน้าของ shopowner</button></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>