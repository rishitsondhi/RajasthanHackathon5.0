<html>
<body>
    <?php
     include ("libraries/qrlib.php");
    session_start();
    $codeContents=$_SESSION["transfer"];
        $fileName = ''.($codeContents).'.png'; 
     QRcode::png($codeContents,$fileName,"H","10","10");
    echo '<img src="'.$fileName.'">'; 
?>
    

    </body></html>
