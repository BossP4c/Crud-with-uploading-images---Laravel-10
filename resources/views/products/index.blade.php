@include('layout.header')

<link href="https://fonts.googleapis.com/css2?family=Diphylleia&family=Poppins:wght@400&display=swap" rel="stylesheet">

<body class="product">
<div class="space">
    <div class="notif">
        @if(session()->has('success')) <!-- to print 'Product Updated Succesfully' if done editing -->
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>


        <table border=1>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price (₱)</th>
                <th>Expiration Date</th>
                <th>Edit</th>
                <th>Delete</th>
            <tr>
                @foreach($products as $product) <!--   to view database data in the table  -->
            <tr>
                <td><img src="{{ asset($product->image)}}" alt="" height="100px" width="100px"></td>
                <td height="100px" width="150px">{{$product->name}}</td>
                <td height="100px" width="150px">{{$product->qty}}</td>
                <td height="100px" width="150px">{{$product->price}}</td>
                <td height="100px" width="150px">{{$product->expiration_date}}</td>
                <td height="100px" width="150px">
                    <a href="{{ route('product.edit', ['product' => $product]) }}" class="edit_btn">Edit</a>

                </td>
                <td height="100px" width="150px">
                    <form action="{{route('product.destroy', ['product' => $product])}}" method="post" enctype=""> <!-- it will go to delete your data -->
                        @csrf <!-- for security purposes -->
                        @method('delete') <!-- need to use delete for routing -->
                        <input type="submit" value="Delete" class="delete_btn">

                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>



</body>

@include('layout.footer')

<style>
    body{
        background-color: #fff;
        font-family: 'Poppins', sans-serif;
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


  }
    .space{
        padding: 100px;
    }

    .notif{
        font-size: 20px;
        padding: 10px;
        font-weight: bold;
        color: green;
    }

    table{
        border: 5px solid #92C7CF;
        justify-content: center;
        padding: 5px;
        display: flex;
        text-align: center;
        background: #fff;
    }


    nav{
        position: fixed;
    }
    .edit_btn {
    display: inline-block;
    padding: 3px 7px;
    background-color: orange; /* Set your preferred background color */
    color: #fff; /* Set your preferred text color */
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    font-family: 'Arial', sans-serif;
    font-size: 14px;
}

.delete_btn {
    display: inline-block;
    padding: 3px 7px;
    background-color: red; /* Set your preferred background color */
    color: #ffffff; /* Set your preferred text color */
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    font-size: 14px;
}
.edit_btn:hover{
    background-color: rgb(230, 149, 0);
    transition: .3s;
}
.delete_btn:hover{
    background-color: rgb(202, 0, 0);
    transition: .3s;
}


.button:hover {
    background-color: #2980b9; /* Set your preferred background color on hover */
}

</style>

</html>
