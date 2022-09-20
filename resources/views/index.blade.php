<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Normalize -->
    <link rel="stylesheet" href="{{asset("css/normalize.css")}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body>
    <div class="center">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
               <div id="card1" class="grid">
                   <div class="flex justify-content-between align-items-center">
                        <h1>Backlog</h1>
                        <button class="btn btn-success" onclick="addItem(1)">Add</button>
                   </div>
                   <div class="rsp"></div>
               </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                <div id="card2" class="grid">
                    <div class="flex justify-content-between align-items-center">
                        <h1>To do</h1>
                    </div>
                    <div class="rsp"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                <div id="card3" class="grid">
                    <div class="flex justify-content-between align-items-center">
                        <h1>In progress</h1>
                    </div>
                    <div class="rsp"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                <div id="card4" class="grid">
                    <div class="flex justify-content-between align-items-center">
                        <h1>Done</h1>
                    </div>
                    <div class="rsp"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="rspModal"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script src="{{asset("js/init.js")}}"></script>
</body>
</html>
