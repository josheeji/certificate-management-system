<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0px;
            padding: 0px;
        }

        body {
            margin: 0px;
            max-width: 1000px;
        }
        img{
            max-width: 900px;
        }
    </style>
</head>

<body>
    <div class="">
        <img class="" src="{{ public_path($resourcePath) }}/Aakriti Pokharel-pdf.png">
        <h1 style="position: absolute; top: 360px; left: 430px;">{{ $participant->name }}</h1>
    </div>
</body>

</html>