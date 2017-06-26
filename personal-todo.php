<?php
session_start();
include "php/connection.php";
include "php/transaction.php";

if(!isset($_SESSION['name'])){
listheader('Location: login.php');
}

if(isset($_GET['teamname'])){
    $teamname = $_GET['teamname'];
    $sql = "SELECT team_id FROM `team` WHERE team_name = '$teamname'";
    $result2 = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result2);
    $team_id = $row2['team_id'];
}

$tran_sql = "SELECT * FROM `test`.`transaction` WHERE `team_id` = $team_id ORDER BY `timestamp`";
$tran_result = mysqli_query($conn, $tran_sql);

?>
<!DOCTYPE html>
<html lang="en">

<div w3-include-html="head.html"></div>

<body>
<div id="wrapper">
<div><?php include "nav_bar.php"; ?></div>
    <div id="personal-list">
    <div id="myLIST" class="listheader">
  <h2 style="margin:5px">My To Do List</h2>
  <input type="text" id="ListInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>
</div>

<ul id="myUL">

</ul>
    </div>
<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByClassName("MYLI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('#myUL');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("ListInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("ListInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>

    </div>
        <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/w3data.js"></script>
    <script>
w3IncludeHTML();
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $("#chat-toggle").click(function(e) {
            e.preventDefault();
            $("#clist").toggleClass("chat-list");
        });

    </script>
    </body>
</html>
