<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#myInput {
  background-image: url('assets/img/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  width: 12%;
  margin: 100px; font-size: 14px;
  
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin: right;
  }
#myTable {

  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin: 0px auto;

}

#myTable td, #myTable th {
    text-align: center;
  border: 1px solid #ddd;
  padding: 20px;
  
}


#myTable tr:nth-child(even){text-align: center; background-color: white; }



#myTable th {
  
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #f1f1f1;
  color: black;
}
</style>
</head>
<body>

<br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Blotter Entry Number..." title="Type in a name">
<div class= "col-md-4"><div class="custom-select" style="width:200px;">
  <select>
    <option value="0">Status</option>
    <option value="1">Under Investigation</option>
    <option value="2">Cleared</option>
    <option value="3">Solved</option>
  </select>
<br>

</div></div>

<br>

<table id="myTable">
  <tr>
     <th>Blotter Entry Number</th>
    <th>Offense</th>
    <th>Date Committed</th>
    <th>Status</th>
    <th>Investigator on Case</th>
    <th>Remarks</th>
  </tr>
  <tr>
   <td>444444-62587-65</td>
    <td>Kaso ni Maria</td>
    <td>10-23-2018</td>
    <td>CLEARED</td>
    <td>SPO1 Cruz</td>
    <td>More info on how to file a case</td>
  </tr>
  <tr>
    <td>303800-62587-65</td>
    <td>Kaso ni Maria</td>
    <td>10-23-2018</td>
    <td>CLEARED</td>
    <td>SPO1 Cruz</td>
    <td>More info on how to file a case</td>
  </tr>
  <tr>
   <td>303800-62587-65</td>
    <td>Kaso ni Maria</td>
    <td>10-23-2018</td>
    <td>CLEARED</td>
    <td>SPO1 Cruz</td>
    <td>More info on how to file a case</td>
  </tr>
  <tr>
   <td>303800-62587-65</td>
    <td>Kaso ni Maria</td>
    <td>10-23-2018</td>
    <td>CLEARED</td>
    <td>SPO1 Cruz</td>
    <td>More info on how to file a case</td>
  </tr>
  <tr>
    <td>303800-62587-65</td>
    <td>Kaso ni Maria</td>
    <td>10-23-2018</td>
    <td>CLEARED</td>
    <td>SPO1 Cruz</td>
    <td>More info on how to file a case</td>
  </tr>
 </table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>