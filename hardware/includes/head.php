<!-- Required meta tags-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="developed by Bittronics">
<meta name="author" content="Saad Rajpoot">

<!-- Title Page-->
<title>Tables</title>

<!-- Fontfaces CSS-->
<link href="http://localhost/pos/assets/css/font-face.css" rel="stylesheet" media="all">
<link href="http://localhost/pos/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="http://localhost/pos/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
<link href="http://localhost/pos/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">


<link rel="stylesheet" href="http://localhost/pos/assets/vendor/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/pos/assets/vendor/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="http://localhost/pos/assets/css/style.css">

<!-- Bootstrap CSS-->
<link href="http://localhost/pos/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<!-- Vendor CSS-->
<link href="http://localhost/pos/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">

<!-- div#invoice CSS-->
<link href="http://localhost/pos/assets/css/theme.css" rel="stylesheet" media="all">

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    div#invoice{
        width: 99%;
        background-color: #eee;
        margin-left: 0.5%;
        margin-top: 5px;
        padding: 0.5%;
        border: 2px solid #aaa;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: #444;
    }
    div#invoice img{
        width: 180px;
        float: left;
    }
    div#invoice table.right-top{
        float: right;
        border-collapse: collapse;
    }
    div#invoice table.right-top td{
        padding: 0px 0px 2px 15px;
        font-size: medium;
        font-weight: normal;
    }
    div#invoice p.address{
        float: left;
        clear: both;
        font-size: medium;
        font-weight: normal;
        color: #444;
    }
    div#invoice table.products{
        float: center;
        border: 1px solid #aaa;
        border-right: 0px;
        border-left: 0px;
        clear: both;
        margin-top: 150px;
        border-collapse: collapse;
    }
    div#invoice table.products th{
        padding: 12px 35px 12px 40px;
        font-size: large;
        font-weight: bold;
    }
    div#invoice table.products td{
        padding: 12px 30px 12px 35px;
        border: 1px solid #aaa;
        border-left: 0;
        border-right: 0;
    }
    div#invoice div.clearfix{
        clear: both;
    }
    a.backup{
        background-color: #7268a6;
        color: #fff;
        height: 100px;
        text-align: center;
        padding-top: 35px;
        border-radius: 10px;
    }
    a.backup:hover{
        background-color: indigo;
    }
</style>