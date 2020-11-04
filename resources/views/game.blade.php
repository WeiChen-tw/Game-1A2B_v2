<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: #8bc8c8;">
    <div class="row">&nbsp;</div>
    <div class="row">

        <div class="col-md-4">
            &nbsp;
        </div>
        <div class="col-md-4" style="box-shadow: 1px 1px 3px 3px #f7ede2;border-radius:10px;background-color: #f6bd60;">
            <div class="row">&nbsp;</div>
            <div class="">
                <h1 style="color: #f7ede2;text-shadow: 3px 1px 1px rgb(0, 0, 0);">GAME <button id="start" type="submit" style="border-radius:10px;" class=" btn-danger">START</button></h1>
                <h3 style="color:#f28482;text-shadow: 3px 1px 1px rgb(0, 0, 0);">Name : 1A2B</h3>

            </div>
            <div>
                <label for="inputNum" style="color: #84a59d;text-shadow: 1px 1px rgb(0, 0, 0);">Guess</label>
                <input id="inputNum" class="col-sm-6" type="text">
                <button id="send" style="border-radius:10px;" class=" btn-success" onclick="judg()">submit</button>
            </div>
            <div id="box" class="row">
                <div class="col-2">
                    <label style="color: #84a59d;text-shadow: 1px 1px rgb(0, 0, 0);">Result</label>
                </div>
                <div class="col-sm-6">
                    <p style="color: #000000;" id="result"></p>
                </div>

            </div>
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <button id="restart" type="submit" style="border-radius:10px;" class=" btn-info">Restart</button>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <textarea id="board" style="height: 200px;width:100%"></textarea>
        </div>


        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{ asset('js/game.js') }}"></script>

</body>

</html>