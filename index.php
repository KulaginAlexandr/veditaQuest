<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="main.css" rel="stylesheet">
</head>
<body>
    <button onclick="rowCount(-1)">-</button>
    <input id="row" type="number" readonly="true" value="4" min="0" max="99999">
    <button onclick="rowCount(1)">+</button>
    
    <table cellspacing=0 class="sourse">
        <tr></tr>
    </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
</body>
</html>