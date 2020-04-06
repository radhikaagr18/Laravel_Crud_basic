
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="{{asset('js/crud.js')}}"></script> -->

    <title>Document</title>
</head>
<body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
  Add new product
</button><br><br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">My New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="image_form" method="post" enctype="multipart/form-data" action="{{url('crud')}}">
            @csrf
            <input class="form-control" type="text" name="title" placeholder="Product Name">
            <label>Select Image</label><br>
            <input type="file" name="image" id="image" /><br />
            <input type="hidden" name="action" id="action" value="insert" /><br>
            <input type="hidden" name="image_id" id="image_id" />
            <div id="image_data"></div><br>
            <span id="uploaded_image"></span>
            <label for="formControlRange">Select the Price</label>
            <input class="form-control" type="number" placeholder="Default input" name="price">
            <input class="form-control" type="text" placeholder="Add Description" name="description">
            <!-- <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />   -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="Insert" id="insert" name="insert">Insert</button>
      </div>
</form>
    </div>
  </div>
</div>

<!-- Main Page with Cards -->
<div class="container">
    <div class="card-columns gallery ">
        @if($products->count())
        @foreach($products as $product)
          <div class="card " style="display: inline-block;">
            <img class="card-img-top " src="/images/{{$product->image}}" alt="Card image cap" style="height:12rem;" >
            <div class="card-body">
                <h5 class="card-title">{{$product->title}}</h5>
                <p class="card-text"><b>Description:</b>{{$product->description}}</p>
                <h6 class="card-title"><b>Price:</b>&nbsp;&nbsp;Rs.{{$product->price}}</h6></div>
                <form method="post" action="{{url('crud/delete',$product->id)}}">
                <a href="{{ url('crud/edit',$product->id)}}" class="btn btn-primary" style="margin-left:2rem;margin-bottom:1rem;">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" style="margin-bottom:1rem;">Delete</button>
                </form>
            </div>
         
        @endforeach
    @endif
</div>
</div>
    
<!-- Cards view ends -->

    <script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
</body>
</html>