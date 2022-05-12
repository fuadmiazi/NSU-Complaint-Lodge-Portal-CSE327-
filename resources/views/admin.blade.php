<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <center style="font-size:30px;">Admin Portal</center>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <center>
                    <h1>Complaints:</h1>
                    <table>
                    <tr style="background-color:grey">
                        <td style="padding:20px;">Complainee Name</td>
                        <td style="padding:20px;">Complaint Against</td>
                        <td style="padding:20px;">Description</td>
                        <td style="padding:20px;">Reviewer</td>
                        <td style="padding:20px;">Evidence</td>
                        <td style="padding:20px;">Status</td>
                        <td style="padding:20px;">Action</td>
                    </tr>

                    @foreach($complaint as $complaints)

                    <tr align="center">
                        <td style="padding:20px;">{{$complaints->yourNmae}}</td>
                        <td style="padding:20px;">{{$complaints->criminal}}</td>
                        <td style="padding:20px;">{{$complaints->description}}</td>
                        <td style="padding:20px;">{{$complaints->reviewer}}</td>
                        <td style="padding:20px;"><img height="100" width="200" src="/evidenceFile/{{$complaints->evidence}}" alt=""></td>
                        <td style="padding:20px;">{{$complaints->status}}</td>
                        <td style="padding:20px;"><a class="btn btn-success" href="{{url('updateStatus',$complaints->id)}}">Close Complaint</a></td>
                    </tr>

                    @endforeach

                    </table>
                </center>
            </div>
        </div>
    </div>
</x-app-layout>

</body>
</html>