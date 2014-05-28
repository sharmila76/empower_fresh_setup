<?php /* Smarty version 2.6.11, created on 2014-04-15 12:35:27
         compiled from modules/Addpackage/Cart.html */ ?>
<script type="text/javascript">
    <?php echo '
    var total = 0.00;

    function CalculateVal(item) {
        if (item.checked) {
            total += parseInt(item.value);
        } else {
            total -= parseInt(item.value);
        }
        //alert(total);
        var n = total.toFixed(2);
        document.getElementById(\'Totalcost\').innerHTML = n;
    }
    function GoBack(item) {
        history.go(-1);
    }
    '; ?>

</script>