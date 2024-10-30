<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box {
            width: 50%;
            margin: 30px auto;

            padding: 30px 0;
            border: 1px solid black;
            border-radius: 8px;
        }

        .info {
            width: 100%;
            margin: 0 auto;
        }

        .product_img {
            margin: 10px auto;
            width: 80%;
        }

        img {
            border-radius: 15px;
            border: 3px solid black;
        }

        table {
            width: 100%;
            padding: 10px 30px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
       <div class="box">
            <div class="product_img">
                <img src="product_images/{{$order->product->image}}" alt="" width="100%">
            </div>
            <div class="info">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td>{{$order->name}}</td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td>{{$order->rec_address}}</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>{{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Product Title:</td>
                        <td>{{$order->product->title}}</td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>{{$order->product->price}}$</td>
                    </tr>
                    <tr>
                        <td>Product Category:</td>
                        <td>{{$order->product->category}}</td>
                    </tr>
                    <tr>
                        <td>Product Descripion:</td>
                        <td>{{$order->product->description}}</td>
                    </tr>
                </table>
            </div>
       </div>
</body>
</html>