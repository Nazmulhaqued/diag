@extends('admin.admin_master')

@section('admin_content')

  <style>
    * { font-family: DejaVu Sans, sans-serif; }
    #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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
    background-color: #4CAF50;
    color: white;
}
  </style>

<br/>
<table id="customers">
  <tr>
    <th>Patient Name :</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Dr/Ref By :</th>
    <th>Test Names</th>
    <th>Paid</th>
    <th>Due</th>
  </tr>
  <tr>
    <td>{{$patient_info->patient_name}}</td>
    <td>{{$patient_info->gender}}</td>
    <td>{{$patient_info->age}}</td>
    <?php
      $ref_doctor = DB::table('doctorrefs')
              ->where('doctorrefs_id',$patient_info->doctorrefs_id)
              ->first();
    ?>
    <td>{{$ref_doctor->doctorName }}</td>

    <td>
      <?php 
      $commaString = $patient_info->test_name; 
      $myArray = explode(', ', $commaString);
      $array_count = count($myArray)-1;

      for($i=0; $i<=$array_count; $i++){
    ?>{{ $myArray[$i] }},
           
          <?php } ?>
      </td>
    <td>{{ $patient_info->total_paid }}</td>
    <td>{{$patient_info->total_due}}</td>
  </tr>
  
</table>

</body>
</html>


 @endsection