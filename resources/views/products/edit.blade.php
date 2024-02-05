@include('layout.header')

<body>


    <div>
        @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)                <!-- displaying error to the page -->
                <li>{{$error}}</li>
            @endforeach
        </ul>

        @endif
    </div>

    <form method="post" action="{{route('product.update', ['product' => $product])}}" enctype="multipart/form-data">
        @csrf
        @method('put')      <!-- change this put if controler is in route::put -->
        <h1>Edit a Product</h1>

        <div class="container">
        <div>
            <label>Image</label>
            <input type="file" name="image"  value="{{$product->name}}">
        </div>
        <br>
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}">
        </div>
        <br>
        <div>
            <label>Quantity</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$product->qty}}">
        </div>
        <br>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}">
        </div>
        <br>
        <div>
            <label>Expiration Date</label>
            <input type="date" name="expiration_date" placeholder="Expiration Date" value="{{$product->expiration_date}}">
        </div>
        <br>
        <div>
            <input type="submit" value="Update">
        </div>
        </div>
    </form>
</body>

@include('layout.footer')


<style>

h1 {
    font-size: 20px;
    color: white;
  padding: 5px 5px;
    text-align:center;
    color: #000;

}

    body{
     margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: rgb(243, 240, 241);
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
   }

.container{
    flex-direction: column;
    font-size: 20px;
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    margin-left: 40%;
    text-align: left;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    background-color: #AAD7D9;
}

label{
    font-size: 15px;
    display: block;
    color: #000;
    font-weight: 200;
}
input{
    padding: 5px;
    border: 1px solid #ccc;
    margin: 0 auto;
    width: 100%;
    box-sizing: border-box;
    border-radius: 5px;
    outline: none;
}
button{
    padding-top: 40px;
    padding: 10px;
    background-color: rgb(39, 137, 176);
    width: 100%;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    color: #fff;
    font-size: 10px;
}
button:hover{
    background-color:rgb(58, 149, 174);
    color: #fff;
    transition: .3s;
}

.home{
    font-size: 200px;
    justify-content: center;
    display: flex;

}

nav{
    background-color: #92C7CF;
    border: none;
    color: white;
    width: 100%;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    padding-top: 20px;
    padding-bottom: 20px;
    cursor: pointer;
}


nav a{
    display: inline-block;
    color: #343434;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
    font-size: 17px;
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
}

nav a:hover{
    background-color: #fff;
    border-radius: 5px;
    transition: .3s;

}


footer {
    background-color: #92C7CF;
    color: #343434;
    text-align: center;
    padding: 5px;
    position: fixed;
    bottom: 0;
    width: 100%;
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
  }

</style>
</html>