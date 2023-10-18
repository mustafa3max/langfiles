<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="p-8">
    <div class="container">

        <!--Text Area -->
        <textarea id="content" placeholder="Lets Write ">
        </textarea>

        <!--Buttons -->
        <div class="buttons">

            <!--To open -->
            <button id="openfile" class="bg-accent p-2">
                Open
            </button>

            <!-- To save-->
            <button id="savefile" class="bg-accent p-2">
                Save
            </button>
        </div>
    </div>

    <script src="{{ asset('js/test.js') }}"></script>

</body>

</html>
