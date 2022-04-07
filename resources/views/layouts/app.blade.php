<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Phone Book</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">                
                   Phone Book            
            </div>
        </nav> 
        <main class="py-4">            
            <div class="row justify-content-center">                                        
                <div class="col-md-4">
                    <input id="searchphone" type="searchphone" class="form-control" name="searchphone" value="{{ old('searchphone') }}" required autocomplete="searchphone"  placeholder="Phone Number" autofocus>        
                </div>                        
                <button class="btn btn-primary col-md-1" id="get">
                      Get
                </button>                                                                            
            </div>               
        </main>      
       
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $('#get').click(function(){
            $.ajax({
                type:'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:$(location).attr('href')+'ims/subscriber/'+$("#searchphone").val(),                
                success:function(data){                    
                    if(jQuery.isEmptyObject(data)){
                        $("#message").html("<center><h4>No record found</h4></center>");
                    }
                    else {
                        $("#message").html("");
                        $('#phonenumber').val(data['phoneNumber']);
                        $('#username').val(data['username']);
                        $('#password').val(data['password']);
                        $('#domain').val(data['domain']);                        
                        $('#destination').val(data['features']['callForwardNoReply']['destination']);
                        $('#provisioned').prop("checked", data['features']['callForwardNoReply']['provisioned']);
                        if(data['status']){
                            $('#active').prop("checked", true);  
                        }
                        else  {
                            $('#inactive').prop("checked", true);  
                        }
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#message").html("<center><h4>Something went wrong error... Please try again</h4></center>");
                }                
            });            
        });

        $('#put').click(function(){

            $.ajax({
                type:'PUT',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},     
                data: $("input").serializeArray(),           
                url:$(location).attr('href')+'ims/subscriber/'+$("#phonenumber").val(),                
                success:function(data){                    
                    console.log(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#message").html("<center><h4>Something went wrong error... Please try again</h4></center>");
                }                
            });            
        });
        
        $('#delete').click(function(){            
            $.ajax({
                type:'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},                 
                url:$(location).attr('href')+'ims/subscriber/'+$("#phonenumber").val(),                
                success:function(data){
                    console.log(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#message").html("<center><h4>Something went wrong error... Please try again</h4></center>");
                }                
            });            
        });
    </script>
</body>
</html>
