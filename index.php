<?php
    include('db.php');
    if (isset($_POST['submit'])) {
        $itemArr = $_POST['name'];
        foreach ($itemArr as $list) {
            if ($list!='') {
                $sql = "INSERT INTO dynamic_field(name) values('$list')";
                $stmt = $con->prepare($sql);
                $stmt->execute();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <style>
        #wrap { width:20%; }
        .field_box{float:left; width:80%;}
        .button_box{float:left; width:20%;}
        .my_box { width:100%; padding-bottom:20px;}
        .clear { clear:both; }
    </style>
</head>
<body>
    
    <form  method="post">
        <div id="wrap">
            <div class="my_box">
                <div class="field_box"><input type="text" name="name[]" id="name"></div>
                <div class="button_box"><input type="button" name="add_btn" value="Add More" onclick="add_more();"></div>
            </div>
        <input type="hidden" id="box_count" value="1">
        </div>
        
        <div class="clear"></div>

        <div>
            <input type="submit" value="Add Record" name="submit">
        </div>
    </form>


    <script>
        function add_more() {
            // alert('asd');
            var box_count = jQuery("#box_count").val();
            box_count++;
            jQuery("#box_count").val(box_count);

            jQuery('#wrap').append('<div class="my_box" id="box_loop_'+box_count+'"><div class="field_box"><input type="text" name="name[]" id="name"></div><div class="button_box"><input type="submit" name="submit" id="submit" value="Remove" onclick="remove_more('+box_count+');"></div></div>');

            
        }

        function remove_more(box_count) {
            // alert(box_count);
            jQuery("#box_loop_"+box_count).remove();
            var box_count = jQuery("#box_count").val();
            box_count--;
            jQuery("#box_count").val(box_count);
        }
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>