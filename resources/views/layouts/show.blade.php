<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
.topnav {
  overflow: hidden;
  background-color: #333;
  width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.topnav li {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  position: relative;
    display: inline-block;
}
.dropdown-content {
  display: flex;
  flex-direction: row !important;
  position: absolute;
  z-index: 999;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown-content a {
  color: #333;
  display: block;
  padding: 10px 12px;
  text-decoration: none;
}
.nav{
    display: flex;
    align-content: center;
    justify-content: space-between;
}
.dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: #f2f2f2;
  background-color: #333;
  cursor: pointer;
  padding: 14px 16px;
}
.dropbtn:hover {
  background-color: #ddd;
  color: #333;
}
.search {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 20px;
}
.form-control {
  width: 70%;
  height: 20px;
  border-radius: 20px;
  border: none;
  font-size: 16px;
  padding: 0 10px;
}
form{
  margin: 0;
}

input[type="submit"] {
  background-color: #4CAF50; 
  color: white; 
  font-size: 16px; 
  border: none; 
  cursor: pointer; 
}

input[type="submit"]:hover {
  background-color: #3e8e41; 
}
@media only screen and (max-width: 768px) {
  .topnav {
    display: none;
  }

  .topnav.show {
    display: block;
  }
}
    </style>
</head>
<body>
    
  <div class="nav">
    <div class="topnav">
      <a href="{{ route('home') }}">My Movie/TV Shows App</a>
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('browse') }}">Movies</a>
      <a href="{{ route('browsetv') }}">TV Shows</a>
      <li >
        <form class="d-flex" action="{{ route('search') }}" method="GET">   
          <input class="form-control" type="search" name="query" placeholder="Search" aria-label="Search">
          <input  type="submit" value="Search">
        </form>
      </li>
  
      @if (Auth::check())
        <div class="dropdown">
          <button class="dropbtn">{{ Auth::user()->name }}</button>
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      @else
        <a href="{{ route('login') }}">Login</a>
      @endif
    </div>
  </div>
  
 

@yield('content')

</body>
</html>