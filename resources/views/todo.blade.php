<html>
<head>
    <title>
        Todo List
    </title>


    <style>

        .home{
            /*background-color: lightgreen;*/
            background-image: linear-gradient(100deg, #575656, cornflowerblue);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form{
            background-color: white;
            width: 500px;
            height: 550px;
            border: 2px solid white;
            border-radius: 10px;
         padding-top: 20px;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 80px;
        }

        .input-form{
            font-size: 17px;
width: 390px;
            height: 35px;
            border: 2px solid grey;


            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .input-form:focus {
            outline: none;
        }
        .input-form:hover {
            background-color: #e2e8f0;
        }
        .update-input-form{
            font-size: 17px;
            width: 75%;
            height: 30px;
            border: 2px solid grey;
            border-radius: 10px;
            margin-bottom: 20px;

        }
        .btn{
            background-color: mediumseagreen;
            width: 110px;
            height: 35px;
            color: white;
            border: 0 ;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            font-size: 17px;
            cursor: pointer;
        }
        .small-btn{
            margin-left: 6px;
            margin-right: 6px;
        }
        .task{
            background-color:cornflowerblue;
            padding: 10px 15px;
            border-radius: 10px;
            margin-right: 10px;
        }
        .task-container{
            max-height: 400px;
            overflow-y: auto;
            padding: 10px;
        }
        body{
           font-family: "Arial";
        }
        .task-status{
         margin-top: 0px;
            font-weight: bold;
        }


        .task-container::-webkit-scrollbar {
            width: 10px; /* Width of the scrollbar */
        }

        .task-container::-webkit-scrollbar-track {
            background: #f1f1f1; /* Background of the scrollbar track */
            border-radius: 10px; /* Round the edges of the track */
        }

        .task-container::-webkit-scrollbar-thumb {
            background: #888; /* Color of the scrollbar thumb */
            border-radius: 10px; /* Round the edges of the thumb */
        }

        .task-container::-webkit-scrollbar-thumb:hover {
            background: #555; /* Color of the thumb on hover */
        }
    </style>
</head>
<body>
<div class="home">

    <div>
        <div class="form ">
<p style="text-align: center ; color: mediumseagreen ; font-weight: bold; font-size: 30px">Just do it!</p>
            <form  method="post" style="display: flex; align-items: center">
@csrf
                <div>

                    <input style="padding-left: 9px" class="input-form" type="text" name="task" placeholder="Add a task">

                </div>



                <div><input class="btn" type="submit" value="Add Task"></div>
            </form>
            <!-- Display the list of tasks -->
            <div class="task-container" style="margin-top: 30px; ">

                <div>
                    <p class="task-status">To do</p>
                    @if(isset($list) && count($list) > 0)
                        @foreach($list as $l)
                            @if(!$l->completed)


                                <p style="margin-bottom: 16px" >

                                <div class="task" style=" display: flex ;align-items: center; justify-content: space-between">


                                    <div style="font-size: large; color: white">  {{ $l->task }}</div>
                                    <!-- Checkbox form to mark task as completed -->

                                    <div style="display: flex; ">

                                        <div class="small-btn">
                                            <form method="POST" action="/Todo_List/public/todo/update/{{ $l->id }}" style="display:inline;">
                                                @csrf
                                                <input style="width: 16px; height: 16px; cursor: pointer" type="checkbox" name="completed" onchange="this.form.submit()"
                                                    {{ $l->completed ? 'checked' : '' }} {{ $l->completed ? 'checked disabled' : '' }}>
                                            </form>
                                        </div>

                                        <!-- Delete Button -->
                                        <div class="small-btn">
                                            <form method="POST" action="{{ url('/todo/delete/' . $l->id) }}" style="display:inline;">
                                                @csrf
                                                @method('DELETE') <!-- Use DELETE HTTP method -->
                                                <button  type="submit" style="padding-left: 10px; padding-right: 10px; font-size: 15px; color: black; margin-left: 10px; background-color: red; height: 23px; border: 0; border-radius: 5px; cursor: pointer">Delete</button>
                                            </form>
                                        </div>


                                        <!-- Button to toggle edit form -->
                                        <div class="small-btn">
                                            <button {{ $l->completed ? 'disabled' : '' }} type="button" style="padding-left: 10px; font-size: 15px; padding-right: 10px; color: black; margin-left: 10px; background-color: aqua; height: 23px; border: 0; border-radius: 5px; cursor: pointer" onclick="toggleEditForm({{ $l->id }})">Edit</button>
                                        </div>
                                    </div>



                                </div>

                                <div>
                                    <!-- Edit Form (Hidden by default) -->
                                    <form id="edit-form-{{ $l->id }}" method="POST" action="{{ url('/todo/edit/' . $l->id) }}" style="display:none; margin-top:10px;">
                                        @csrf
                                        <input style="padding: 0 6px" class="update-input-form" type="text" name="task" value="{{ $l->task }}" required>
                                        <button type="submit" style="margin-left: 10px; background-color: coral; font-size: 15px; border: 0;height: 23px; padding-right: 10px; padding-left: 10px; border-radius: 6px">Update</button>
                                    </form>
                                </div>
                                </p>
                            @endif
                        @endforeach
                    @else
                        <p style="text-align: center; color: gray">No tasks available.</p>
                    @endif
                </div>


                <div style="margin-top: 30px">
                    <div style="width: 80%; height: 1px; background-color: mediumslateblue; margin-right:  auto; margin-left: auto; margin-bottom: 20px"></div>
                    <p class="task-status">Done</p>
                    @if(isset($list) && count($list) > 0)
                    @foreach($list as $l)
                            @if($l->completed)
                                <p style="margin-bottom: 16px" >

                                <div class="task" style=" display: flex ;align-items: center; justify-content: space-between">


                                    <div style="font-size:large; color: white">  {{ $l->task }}</div>
                                    <!-- Checkbox form to mark task as completed -->

                                    <div style="display: flex; ">

                                        <div class="small-btn">
                                            <form method="POST" action="/Todo_List/public/todo/update/{{ $l->id }}" style="display:inline;">
                                                @csrf
                                                <input style="width: 16px; height: 16px; cursor: pointer" type="checkbox" name="completed" onchange="this.form.submit()"
                                                    {{ $l->completed ? 'checked' : '' }} {{ $l->completed ? 'checked disabled' : '' }}>
                                            </form>
                                        </div>

                                        <!-- Delete Button -->
                                        <div class="small-btn">
                                            <form method="POST" action="{{ url('/todo/delete/' . $l->id) }}" style="display:inline;">
                                                @csrf
                                                @method('DELETE') <!-- Use DELETE HTTP method -->
                                                <button  type="submit" style="padding-left: 10px; padding-right: 10px; font-size: 15px; color: black; margin-left: 10px; background-color: red; height: 23px; border: 0; border-radius: 5px; cursor: pointer">Delete</button>
                                            </form>
                                        </div>


                                        <!-- Button to toggle edit form -->
{{--                                        <div class="small-btn">--}}
{{--                                            <button {{ $l->completed ? 'disabled' : '' }} type="button" style="padding-left: 10px; font-size: 15px; padding-right: 10px; color: black; margin-left: 10px; background-color: aqua; height: 23px; border: 0; border-radius: 5px; cursor: pointer" onclick="toggleEditForm({{ $l->id }})">Edit</button>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div>
                                    <!-- Edit Form (Hidden by default) -->
                                    <form id="edit-form-{{ $l->id }}" method="POST" action="{{ url('/todo/edit/' . $l->id) }}" style="display:none; margin-top:10px;">
                                        @csrf
                                        <input style="padding: 0 6px" class="update-input-form" type="text" name="task" value="{{ $l->task }}" required>
                                        <button type="submit" style="margin-left: 10px; background-color: coral; font-size: 15px; border: 0;height: 23px; padding-right: 10px; padding-left: 10px; border-radius: 6px">Update</button>
                                    </form>
                                </div>
                                </p>
                            @endif
                        @endforeach
                    @else
                        <p style="text-align: center; color: gray">No tasks available.</p>
                    @endif
                </div>

            </div>




            </div>
    </div>

</div>
</body>
<script>
    function toggleEditForm(id) {
        var form = document.getElementById('edit-form-' + id);
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>
</html>
