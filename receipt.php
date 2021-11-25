<?php
if(isset($_GET['trip_id'])){

    $id=$_GET['trip_id'];

$post = [
    'trip_id' => $id
];



$ch = curl_init('https://watchoutachan.herokuapp.com/api/tripinfo');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

if($e = curl_error($ch)) {
    echo $e;
}

else{
    $decoded = json_decode($response, true);
    foreach($decoded as $key => $val) {
        $key . ': ' . $val . '<br>';
        
    }
}




// close the connection, release resources used
curl_close($ch);


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card card-width margin-center" id="content">
            <div class="card-header text-center">
                <p><img src="img/dashicons_car.png" alt="" class="cab"><span class="info">Cab Ticket</span></p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Booking Details</h5>
                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Name:</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['passenger_name']?></div>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">phone Number:</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['phone_number']?></div>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">ticket No:</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['ticket_num']?></div>
                </div>

                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Date</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['date']?></div>
                </div>

                .html2pdf__pagebre

                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Time</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['time']?></div>
                </div>

                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">From</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['from']?></div>
                </div>

                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Destination</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['destination']?></div>
                </div>
                <hr class="new">

                <h4 class="primary-color m-2">Achan Customer Service</h4>
               
                <p class="mt-3"><img src="img/phone.png" class="phone"><?php echo $decoded['phone_num']?></p>
        
                
                <a href="https://wa.me/09059294297?text=hello"><p class="mt-3 mb-3"><img src="img/wht.png" class="phone"><?php echo $decoded['whatapp']?></p></a>
                
                
                <?php echo "<a href='driver.php?id=$id' target='_blank'> <button class='button-receipt'>View Driver Details</button> </a>";?>

                <hr class="new">
                <h4 class="primary-color m-2">Estimated Cost</h4>

                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Estimated Total</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['ext_main']?> - <?php echo $decoded['ext_max']?></div>
                </div>
            </div>
        </div>
        <center>
        <button class="button-receipt card-width margin-center" id="myBtn">Download Receipt</button>
        </center>
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>
