<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Covid Tracker state wise</title>

</head>
<body>
    <div class="my-3 py-1">
        <h1 style="text-align: center; font-family: arial; font-weight: bold; "> State-wise live Covid-19 Update <h1>
    </div>
       <!-- div for covid tracker section  
        agar table head hta dein to dark heading nhi ayega
    -->
    <div class="table-responsive ">
    <table class="table table-bordered table-striped table-hover text-center">
    <thead class="thead-dark">
    <tr>
        <th>Last Updated Time</th>
        <th>State</th>
        <th>TotalConfirmed</th>
        <th>Active</th>
        <th>Recovered</th>
        <th>Deaths</th>

    </tr>
    </thead>

    <?php
        $data = file_get_contents('https://data.covid19india.org/data.json');
        $coronalive = json_decode($data,true);  
        # //true converts into associative array
        // echo "<pre>";
        // print_r($coronalive);
        // echo "</pre>";

        $statescount = count($coronalive['statewise']);

        $i=1;
        while ($i < $statescount) {
            ?>

            <tr>
                <td><?php echo $coronalive['statewise'][$i]['lastupdatedtime'] ?> </td>
                <td><?php echo $coronalive['statewise'][$i]['state'] ?> </td>
                <td><?php echo $coronalive['statewise'][$i]['confirmed'] ?> </td>
                <td><?php echo $coronalive['statewise'][$i]['active'] ?> </td>
                <td><?php echo $coronalive['statewise'][$i]['recovered'] ?> </td>
                <td><?php echo $coronalive['statewise'][$i]['deaths'] ?> </td>

            </tr>

            <?php
            $i++;

        }

    ?>
    </table>
    <br>
    </div>

</body>
</html>
