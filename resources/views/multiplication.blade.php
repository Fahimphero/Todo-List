<html>
<head>
    <title>Mock test</title>


    <style>
        .text-style{
            color: blue;

        }
        .btn{
            display: block;
            margin-left: auto;
            width: 100px;
            height: 30px;
            background-color: lime;
            color: white;
            border: 0px;
        }
        .border{
            border: 2px solid lime;
            height: 30px;
        }
        .formStyle{
            width:300px;
            padding: 50px 30px;
            border: 3px solid blue;
        }
    </style>
</head>
<body>

<div>
    <form action="http://localhost/Test1/public/multiply" method="post">
        @csrf
        <input type="number" name="num1">
        <input type="number" name="num2">
        <input type="submit">
    </form>

</div>

<div >

    <div class="formStyle">
        <form action="http://localhost/Test1/public/multiply" method="post">
            @csrf
            <div  style="display: flex  ; align-items:center">
                <span style="display: block "  class="text-style">User Name</span>
                <input class="border" style="display: block; margin-left: auto" type="text" name="name1"><br>
            </div>
            <div style="display: flex ; margin-top:15px">
                <span style="display: block ; padding-left: 10px" class="text-style">Password</span>
                <input class="border"  style="display: block; margin-left: auto" type="password" name="pass1"><br>
            </div>
            <p style="margin-top: 20px"> <input class="btn" type="submit" value="Save"></p>

        </form>

    </div>


</div>
<p>This result={{$multiply}}</p>
</body>
</html>
