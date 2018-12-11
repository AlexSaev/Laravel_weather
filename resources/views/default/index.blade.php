<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" >
      <a href="#" class="navbar-brand">
<!--        <img src="images/logo.png" width="50" height="50" alt="logo">-->
          Weather
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
           <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item e"><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">Log in</a></li>
           <li class="nav-item "><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModalAddCity">Add city</a></li>
            <li class="nav-item "><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModalAddYandexWeather">Yandex.Weather</a></li>
            <li class="nav-item "><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModalAddOpenWeather">OpenWeather</a></li>
        </ul>
          <form method="post" action="{{route('make.post')}}">
              <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Make Post</button>
              {{csrf_field()}}
          </form>
        <form method="post" action="{{route('show.weather')}}" class="form-inline my-2 my-lg-0">
          {{--<input type="text" class="form-control mr-sm-2" placeholder="Search" aria-lable="Search" name="city">--}}
            <input type="text" class="form-control mr-sm-2" id="cityInput"
                   placeholder="City" name="city" value="">
          <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
            {{csrf_field()}}
        </form>
      </div>
    </nav>
    <h1 class="text-center">Weather information</h1>

    <!-- <table class="table table-striped table-dark"> -->
      <table class="table table-hover text-center table-dark" id="table" data-height="100" data-show-columns="true" data-toggle="table" data-search="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#toolbar" data-page-size="50" data-show-columns="true">
      <thead>
        <tr>
          <th scope="col">Api</th>
          <th scope="col">City</th>
          <th scope="col">Weather</th>
            <th scope="col">Temperature</th>
            <th scope="col">Wind speed</th>
            <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
      @if($weathers != NULL)
          @foreach($weathers as $weather)
            <tr>
              <td>{{$weather->api}}</td>
              <td>{{$weather->city}}</td>
              <td>{{$weather->weather_type}}</td>
              <td>{{$weather->temperature}}</td>
              <td>{{$weather->wind_speed}}</td>
                <td>{{$weather->date}}</td>
            </tr>
          @endforeach
          @endif
      </tbody>
    </table>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Autorization</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <form>
                <div class="form-group">
                  <lable for="exampleInputEmail">Email address</lable>
                  <input type="text" class="form-control" id="exampleInputEmail" aria-descripbdby="emailHelp"
                  placeholder="Email" required>
                  <small id="emailHelp" class="form-text text-muted">Enter your Email</small>
                </div>
                <div class="form-group">
                  <lable for="exampleInputEmail">Password</lable>
                  <input type="password" class="form-control" id="exampleInputPass" placeholder="Password" required>
                  <small id="passHelp" class="form-text text-muted">Enter your Password</small>
                </div>
              </form>
            </div>
          </div>
          <div class="form-check">
            <lable class="form-check-lable">
              <input type="checkbox" class="form-check-input ml-1">
                <p class="ml-1">R Remember me</p>
            </lable>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Registration</button>
            <button type="button" class="btn btn-primary">Log in</button>
          </div>

          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModalAddCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new city info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="post" action="{{route('set.city')}}">
                            <div class="form-group">
                                <lable for="exampleInputCity">City</lable>
                                <input type="text" class="form-control" id="exampleInputCity" aria-descripbdby="cityHelp"
                                       placeholder="City" name="cityName" value="">
                                <small id="cityHelp" class="form-text text-muted">Enter city name</small>
                            </div>
                            <div class="form-group">
                                <lable for="exampleInputLat">Latitude</lable>
                                    <input type="text" class="form-control" id="exampleInputLat" placeholder="Latitude" name="lat" value="">
                                <small id="latHelp" class="form-text text-muted">Enter latitude</small>
                            </div>
                            <div class="form-group">
                                <lable for="exampleInputLon">Longitude</lable>
                                <input type="text" class="form-control" id="exampleInputLon" placeholder="Longitude" name="lon" value="">
                                <small id="lonHelp" class="form-text text-muted">Enter longitude</small>
                            </div>
                            <div class="form-check">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                                {{csrf_field()}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalAddYandexWeather" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Weather from Yandex</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        {{--Спросить можно ли как-то менять ЭКШОН--}}
                        <form method="post" action="{{route('set.yandex.weather')}}">
                            <div class="form-group">
                                <lable for="exampleInputPlace">City</lable>
                                <input type="text" class="form-control" id="exampleInputPlace" aria-descripbdby="placeHelp"
                                       placeholder="Place" name="placeName" value="">
                                <small id="placeHelp" class="form-text text-muted">Enter city name</small>
                            </div>
                            <div class="form-check">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                                {{csrf_field()}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalAddOpenWeather" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Weather from OpenWeather</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        {{--Спросить можно ли как-то менять ЭКШОН--}}
                        <form method="post" action="{{route('set.open.weather')}}">
                            <div class="form-group">
                                <lable for="exampleInputPlace">City</lable>
                                <input type="text" class="form-control" id="exampleInputPlace" aria-descripbdby="placeHelp"
                                       placeholder="Place" name="placeName" value="">
                                <small id="placeHelp" class="form-text text-muted">Enter city name</small>
                            </div>
                            <div class="form-check">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                                {{csrf_field()}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>