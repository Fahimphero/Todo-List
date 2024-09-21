<html>
<head>
    <title>
        Feedback Form
    </title>


    <style>

        .home{
            background-color: lightgreen;
height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form{
            background-color: white;
            width: 400px;
height: 450px;
            border: 2px solid white;
            border-radius: 10px;
         padding-top: 20px;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 80px;
        }
        .font{
            color: mediumseagreen;
            font-weight: bold;
margin-bottom: 5PX;
        }
        .input-form{
            width: 100%;
            height: 30px;
            border: 2px solid grey;
            border-radius: 10px;
            margin-bottom: 20px;

        }
        .btn{
            background-color: mediumseagreen;
            width: 100%;
            height: 35px;
            color: white;
            border: 0px ;
            border-radius: 30px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="home">

    <div>
        <div class="form ">
<p style="text-align: center ; color: mediumseagreen ; font-weight: bold">It only takes two minutes!!</p>
            <form action="http://localhost/Test1/public/feedback" method="post">
@csrf
                <div>
                    <p class="font">Name</p>
                    <input class="input-form" type="text" name="Name">
                </div>
                <div>
                    <p class="font">Email Address</p>
                    <input class="input-form" type="email" name="Email">
                </div>
                <div>
                    <p class="font">Phone No</p>
                    <input class="input-form" type="number" name="Phone">
                </div>
                <p style=" color: mediumseagreen ; font-weight: bold; margin-bottom: 0px">Do you satisfy with our service?</p>
                <div style="display: flex ; justify-content: space-between; margin-left: 80px">

              <p>   <input  type="radio" name="Satisfaction" value="Yes"></p>
                     <p style="color: mediumseagreen ; font-weight: bold">Yes</p>
                    <p>   <input  type="radio" name="Satisfaction" value="No"></p>
                    <p style="color: mediumseagreen ; font-weight: bold">No</p>

                </div>

                <input class="btn" type="submit" value="Submit">
            </form>

            </div>
    </div>
   <div style="display: flex ; flex-direction: column" >
       <p>Name:{{$Name}}</p><br>
       <p>Email:{{$Email}}</p><br>
       <p>Phone:{{$Phone}}</p><br>
       <p>Satisfaction:{{$Satisfaction}}</p><br>
   </div>
</div>
</body>
</html>
