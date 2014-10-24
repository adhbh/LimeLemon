<!DOCTYPE html>
<html>
<head>
    <title>LimeLemon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">


<h1>All the Products</h1>



<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Base Price</td>
           
        </tr>
    </thead>
    <tbody>
    @foreach($product as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->base_price }}</td>

           
        </tr>
    @endforeach
    </tbody>
</table>
<?php echo $product->links(); ?>
</div>
</body>
</html>