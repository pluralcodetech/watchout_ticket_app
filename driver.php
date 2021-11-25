<?php

$post = [
    'id' => 10
];

$ch = curl_init('https://watchoutachan.herokuapp.com/api/drivers_info');
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card card-width margin-center2">
            <div class="card-header text-center">
                <p><span class="info">Driver Details</span></p>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Name:</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['name']?></div>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">phone Number:</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['phone_number']?></div>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Card No Plate:</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['license_plate']?></div>
                </div>

                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Card Model</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['car_name']?></div>
                </div>

                <div class="d-flex flex-row justify-content-between">
                    <div class="p-2">Driver's Email</div>
                    <div class="p-2 justify-content-end"><?php echo $decoded['email']?></div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>