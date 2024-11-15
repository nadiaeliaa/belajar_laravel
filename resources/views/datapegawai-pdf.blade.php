<!DOCTYPE html>
<html>
<head>
<style>

#titlepdf {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<center><h1 id="titlepdf" class="text-align:center">Employee Data</h1></center>

<table id="customers">
  <tr>
    <th>Number</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Mobile</th>
  </tr>
  @php
    $no=1;
  @endphp

  @foreach ($data as $row)
  <tr>
    <td>{{ $no++ }}</td>    
    <td>{{ $row->name }}</td>
    <td>{{ $row->gender }}</td>
    <td>{{ $row->mobile }}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>


