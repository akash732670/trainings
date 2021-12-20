<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
      img {  
        width: 100%;
        height: 350px;
      }
  </style>
</head>
<body>
<div class="container mt-5">
  <div class="card" style="width:400px">
    <img class="card-img-top" src="https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F3c%2Fa4%2F3ca4f91b858f7b96f4dd5c61046e55d2e5b24126.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5Bkids_boy8y_topstshirts%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B1%5D&call=url[file:/product/main]" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">T-Shirt (₹ 1500) </h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <form method="post" action="cart.php">
          <div class="form-row">
            <div class="col">
              <button type="button" class="btn btn-danger w-100 remove">Remove -  </button>
            </div>
            <div class="col">
               <input type="number" name="qty" class="form-control w-100 qty">
            </div>
            <div class="col">
              <button type="button" class="btn btn-primary w-100 add">Add + </button>
            </div>
            </div>
          <input type="hidden" name="price" value="1500">
           <input type="hidden" name="pname" value="T-Shirt">
          <button type="submit" name="submit" class="btn btn-primary w-100 mt-3">Add To Cart</button>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".qty").val("1");

        $(document).on("click",".add", function() {
            let currentQty = $(".qty").val();

            $(".qty").val(++currentQty);

        });


        $(document).on("click",".remove", function() {
            let currentQty = $(".qty").val();

            if(currentQty<2) {
                alert("One Product Must be There");
            } else {
                $(".qty").val(--currentQty);    
            }
            
        });
    });
</script>
</body>
</html>
