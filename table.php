<html>
<body>
<form method="post" class="drop" action="table.php" id="aa">
           <select id="action" name="action">
                  <option value="expEmail">Export selected to CSV</option>
                  <option value="delEmail">Delete selected</option>
           </select>
    <input type="submit" value="Submit">
</form>
<input type="text" id="myInput" onkeyup="searchDom()" value="" placeholder="Search.." title="Type something">
<table style="padding: 20vh 20vw 20vh 20vw" id="table">
<tr>
<th onclick="sortTable(0)"> Email </th>
<th onclick="sortTable(1)"> Date </th>
<th> Select </th>
</tr>
	<?php include 'outputcontroller.php' ?>
</table>
</body>
<script type="text/javascript">
  var filter = "",filter2 = "";
function searchDom(value = "") {
  var input, input2, table, tr, td, i, txtValue;
  input = value;
  input2 = document.getElementById("myInput");
  if (input){
     filter = input.value.toUpperCase();
  }
  if (input2){
    filter2 = input2.value.toUpperCase();
  }
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
  }
  for (i = 0; i < tr.length; i++) {
  if (tr[i].style.display == ""){
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter2) > -1) {tr[i].style.display = "";} 
            else {tr[i].style.display = "none";}
      }
  }
}
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("table");
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script> 
</html>

