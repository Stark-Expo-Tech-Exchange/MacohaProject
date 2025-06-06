<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php echo $page_title;?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <!-- <li>TIME:</li> -->
                            <!-- <li><a href="">< ?php echo $system_name;?></a></li> -->
                            <li class=""><span id='ct' ></span></li>

                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


                <!-- Page Content -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 <script type="text/javascript"> 
                        function display_c(){
                        var refresh=1000; // Refresh rate in milli seconds
                        mytime=setTimeout('display_ct()',refresh)
                        }

                        function display_ct() {
                        var x = new Date()
                        document.getElementById('ct').innerHTML = x;
                        display_c();
                        }
                    </script>
<body onload=display_ct();>
    
</body>
</html> 