<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
    @if (session('save'))
    <script> 
        alert("Success"); 
    </script> 
    @endif 
    @if (session('error')) 
    <script> 
        alert("Failed"); 
    </script> 
    @endif 
    <div class="w3-container"> 
        <div class="w3-bar w3-blue "> 
            <a class="w3-bar-item w3-button w3-right" href="{{route('logout')}}">Logout</a> 
        </div> 
        <header class="w3-center w3-padding-large w3-blue"> 
            <h2>MyTutor</h2> 
        </header> 
        <div> 
            <button class="w3-button w3-round w3-right" onclick="document.getElementById('newsubject').style.display= 'block';return false;">New Subject</button> 
        </div> 
        <div class="w3-padding"> 
            <table class="w3-table w3-striped w3-bordered"> 
                <thead>
                    <th>ID</th>
                    <th>Subject Title</th>
                    <th>Description</th>
                    <th>Price (RM)</th>
                    <th>Total Learning Hours</th>
                </thead> 
                @foreach ($subjects as $Subject) 
                <tr> 
                <td>{{ $loop->iteration }}</td>
                <td>{{ $Subject->id}}</td>  
                <td>{{ $Subject->title}}</td> 
                <td>{{ $Subject->description}}</td>
                <td>{{ $Subject->price}}</td>
                <td>{{ $Subject->learningHour}}</td>   
                </tr> 
                @endforeach 
            </table> 
        </div>  
        <footer class="w3-footer w3-center w3-blue">MyTutor</footer> 
    </div>
    <div id="newsubject" class="w3-modal w3-animate-opacity"> 
        <div class="w3-modal-content w3-round" style="width:500px"> 
            <header class="w3-row w3-blue">
                <span onclick="document.getElementById('newsubject').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span> 
                <h4 class="w3-margin-left">Register Subject Form</h4> 
            </header> 
            <div class="w3-padding"> 
                <form method="post" action="{{route('registerSubject')}}"> 
                    {{csrf_field()}}
                    <p><input class="w3-input w3-round w3-border" type="text" name="id" placeholder="Subject ID"></p>  
                    <p><input class="w3-input w3-round w3-border" type="text" name="title" placeholder="Subject Title"></p> 
                    <p><textarea class="w3-input w3-border w3-round" name="description" rows="4" cols="50" placeholder="Subject description"></textarea></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="price" step="any" placeholder="Subject Price"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="learningHour" placeholder="Subject Learning Hour"></p>   
                    <button class="w3-button w3-blue w3-round" type="submit">Register Subject</button> 
                </form> 
            </div> 
        </div> 
    </div> 
 
</body>
</html>