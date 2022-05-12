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
        <center style="font-size:30px;">My Complaints</center>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <center>
                    <h1>Complaints:</h1>
                    <table>
                    <tr style="background-color:grey">
                        <td align="center" style="padding:20px;">Complainee Name</td>
                        <td align="center" style="padding:20px;">Complaint Against</td>
                        <td align="center" style="padding:20px;">Description</td>
                        <td align="center" style="padding:20px;">Reviewer</td>
                        <td align="center" style="padding:20px;">Complaint Time</td>
                        <td align="center" style="padding:20px;">Status</td>
                        
                    </tr>

                    @foreach($complaint as $complaints)

                    <tr align="center">
                        <td align="center" style="padding:20px;">{{$complaints->yourNmae}}</td>
                        <td align="center" style="padding:20px;">{{$complaints->criminal}}</td>
                        <td align="center" style="padding:20px;">{{$complaints->description}}</td>
                        <td align="center" style="padding:20px;">{{$complaints->reviewer}}</td>
                        <td align="center" style="padding:20px;">{{$complaints->created_at}}</td>
                        <td align="center" style="padding:20px;">{{$complaints->status}}</td>
                        
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