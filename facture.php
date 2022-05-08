

<!DOCTYPE html>
<html>
    <head>
        <title>Facture</title>
</head>
<body>
    <?php 
       //include("header.php");
    session_start();

    require('fpdf/fpdf.pfp');
    $pdf = new FPDF ('P','m','A4');
    $pdf -> AddPage();
    $pdf -> setFont('Arial','B',16);
    $pdf -> Cell(0,10,'Shopping invoce',1,1,c);
    $pdf -> Cell(95,15,'',1,0);

    $pdf -> Cell(38,20,'item Id',1,0);
    $pdf -> Cell(38,20,'item name',1,0);
    $pdf -> Cell(38,20,'item price',1,0);
    $pdf -> Cell(38,20,'item quantity',1,0);
    $pdf -> Cell(38,20,'total price',1,1);

    if (isset($_SESSION['mycart'])){

        $total = 0;

        foreach ($_SESSION['mycart'] as $key => $value){

            $pdf -> Cell(38,20,$value['Id'],1,0);
            $pdf -> Cell(38,20,$value['name'],1,0);
            $pdf -> Cell(38,20,$value['price'],1,0);
            $pdf -> Cell(38,20,$value['quantity'],1,0); 
            $pdf -> Cell(38,20,"$",number_format($value['quantity'] = $value['price'], 2),1,1);
    $total =$total + $value['quantity'] * $value ['price'];
        }


    }

        $pdf -> Cell(40,20,'',0,1);

        $pdf -> Cell(40,20,'Total price ',1,0);
        $pdf -> Cell(40,20,'$ ',numfmt_format($total,2),1,1,R);
        $pdf -> Output();

        ?>
        </body>
</html>

