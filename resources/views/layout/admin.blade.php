<html>
    <head>
        <title>@yield('title')</title>
        <style>
.card-profile {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title-profile {
  color: grey;
  font-size: 18px;
}

.button-profile {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.a-profile {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
</style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container mt-2">
      <div class="row">
      <!-- first row -->
        <div class="col-12 mb-2 bg-light">
          <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">  
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <a class="btn btn-outline-info ml-2" href="{{route('admin.profile')}}">
                  Welcome,Mehedi 
                </a>
                <a class="btn btn-outline-warning ml-2" href="{{route('logoutindex')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>
                  Logout 
                </a>
          </nav>
        </div>

        <!-- 2nd row -->
        <!-- col 1 -->
        <div class="col-2 bg-light border">
        <nav class=" d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2 mt-2" href="#"><i class="fa fa-home" aria-hidden="true"></i>
                  Dashboard 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="{{route('admin.profile')}}"><i class="fa fa-user" aria-hidden="true"></i>
                  Profile 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="{{route('admin.categorylist')}}"><i class="fa fa-list-alt" aria-hidden="true"></i>
                Product Category
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="{{route('admin.subcategorylist')}}"><i class="fa fa-th-list" aria-hidden="true"></i>
                Product Sub Category
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="{{route('admin.itemlist')}}"><i class="fa fa-list-ol" aria-hidden="true"></i>
                  Product Item
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="{{route('admin.workerslist')}}"><i class="fa fa-users" aria-hidden="true"></i>
                  Wokers List
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="{{route('admin.customerslist')}}"><i class="fa fa-users" aria-hidden="true"></i>
                  Customer List
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="{{route('admin.paymentslist')}}"><i class="fa fa-money" aria-hidden="true"></i>
                  Payment List
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="{{route('admin.orderloglist')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  Orders
                </a>
              </li>
            </ul>
          </div>
        </nav>
        </div>

        <!-- col 2 -->
        <div class="col-10 bg-transparent">
        <div class="container-fluid"> @yield('content')</div>
        </div>
      </div>
    </div>

    </body>
</html>