<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>

    <style>
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
</head>
<body>

<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <img src="https://i.ibb.co/vshLLJt/logo.png" alt="" width="491" height="76" style="padding-right:20px;">
            
            </div>
            
        </nav>
    </div>

<x-app-layout>
    <x-slot name="header">
        <center style="font-size:30px;">Fill The Form To Lodge The Complaints</center>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            @if(session()->has('message'))

<div class="alert alert-success">


    <button type="button" class="close" data-dismiss="alert">x</button>

    {{session()->get('message')}}

</div>

@endif

    <center>
    <form action="{{url('lodgeComplaints')}}" method="post" enctype="multipart/form-data">

        @csrf

        <!-- <div style="padding:15px">
            <label for="">Your Name: </label>
            <input style="color:black;" type="text" name="name" placeholder="Type Your Name"  required="">
        </div> -->

        <div style="padding:15px">
            <label for="">Complaint Against: </label>
            <input style="color:black;" type="text" id="criminal" name="criminal" placeholder="Type Name" required="">
        </div>

        <div style="padding:15px">
            <label for="">Description</label>
            <input style="color:black;" type="text" id="description" name="description" placeholder="Give a description" required="">
        </div>

        <div style="padding:15px">
            <label for="">Choose Reviewer: </label>
            <input style="color:black;" type="text" id="reviewer" name="reviewer" placeholder="Type Reviewer Name" required="">
        </div>

        <div style="padding:15px">
           <h1>Upload Evidence:</h1>
        </div>

        <div style="padding:15px">
            <input type="file" name="file">
        </div>

        <div style="padding:15px">
            <input class="btn btn-success" type="submit">
        </div>

    </form>
    </center>

                
            </div>
        </div>
    </div>



    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <center>
            <!-- <h1 style="font-size:20px;">My Complaints:</h1> -->
            <a href="{{url('mycomplaints')}}">My Complaints</a>
            </center>

            </div>
        </div>
    </div>

    

</x-app-layout>



</body>
</html>

<script>

var path = "{{ url('dashboard/action') }}";

$('#criminal').typeahead({

    source: function(query, process){

        return $.get(path, {query:query}, function(data){

            return process(data);

        });

    }

});

$('#reviewer').typeahead({

source: function(query, process){

    return $.get(path, {query:query}, function(data){

        return process(data);

    });

}

});

</script>

