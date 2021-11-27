<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        Hello Md. Nurshadul Islam! <br>
        Attached below is the summary of your order. <br>

        You just saved yourself 2 hours by avoiding traffic, bargaining and crowded superstores. Go and spend some time with your family or watch a movie. Enjoy!

        Thanks for shopping with us.

        Regards,
        Ecommerce
    </p>
    <h3>Order Details</h3>
    <p>Name: {{$order->name}}</p>
    <p>Address: {{$order->address}}</p>
    <p>Total Price: {{$order->price}}</p>
</body>
</html>