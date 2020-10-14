<!-- Jquery JS-->
<script src="http://localhost/pos/assets/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="http://localhost/pos/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS-->
<script src="http://localhost/pos/assets/vendor/animsition/animsition.min.js"></script>
<!-- Main JS-->
<script src="http://localhost/pos/assets/js/main.js"></script>

<script src="http://localhost/pos/assets/vendor/jquery.min.js"></script>
<script src="http://localhost/pos/assets/vendor/jquery.dataTables.min.js"></script>
<script src="http://localhost/pos/assets/vendor/dataTables.bootstrap4.min.js"></script>
<script src="http://localhost/pos/assets/js/datatables-init.js"></script>

<script>
    function view_invoie(num,date){
        document.getElementById("inv-num").innerHTML=num;
        document.getElementById("inv-date").innerHTML=date;
        document.getElementById("invoice").style.display="block";
    }
    function printit(){
        newWin= window.open("");
        var to_print = '<!DOCTYPE html><html><head><style>*{margin: 0;padding: 0;box-sizing: border-box;}div#invoice{width: 99%;background-color: #eee;margin-left: 0.5%;margin-top: 5px;padding: 0.5%;border: 2px solid #aaa;font-family: Verdana, Geneva, Tahoma, sans-serif;}div#invoice img{width: 180px;float: left;}div#invoice table.right-top{float: right;border-collapse: collapse;}div#invoice table.right-top td{padding: 0px 0px 2px 15px;font-size: large;font-weight: normal;}div#invoice p.address{float: left;clear: both;font-size: medium;font-weight: normal;}div#invoice table.products{float: center;border: 1px solid #aaa;border-right: 0px;border-left: 0px;clear: both;margin-top: 150px;border-collapse: collapse;}div#invoice table.products th{padding: 12px 35px 12px 40px;font-size: large;font-weight: bold;}div#invoice table.products td{padding: 12px 30px 12px 35px;border: 1px solid #aaa;border-left: 0;border-right: 0;}</style></head><body>';
        newWin.document.write(to_print + document.getElementById("to_print").innerHTML + '</body></html>');
        newWin.print();
        newWin.close();
    }
</script>