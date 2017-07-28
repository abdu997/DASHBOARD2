<html lang="en" ng-app="DashApp" ng-controller="TodoController">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/angular.min.js"></script>
<link href="css/w3.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<script src="js/angular.min.js"></script>
<script src="js/dash-app.js"></script>
<style>
    /*
    Persona TO DO list
    ==================*/
    
    #personal-list > body {
        margin: 0;
        min-width: 250px;
    }
    #personal-list > ul {
        color: initial;
    }
    /* Include the padding and border in an element's total width and height */
    
    * {
        box-sizing: border-box;
    }
    ul#myUL {
        margin: 0;
        padding: 0;
    }
    ul#myUL li {
        cursor: pointer;
        position: relative;
        padding: 12px 8px 12px 40px;
        background: #eee;
        font-size: 18px;
        transition: 0.2s;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    ul#myUL li:nth-child(odd) {
        background: #f9f9f9;
    }
    ul#myUL li:hover {
        background: #ddd;
    }
    /* When clicked on, add a background color and strike out text */
    
    ul#myUL li.checked {
        background: #888;
        color: #fff;
        text-decoration: line-through;
    }
    /* Add a "checked" mark when clicked on */
    
    ul#myUL li.checked::before {
        content: '';
        position: absolute;
        border-color: #fff;
        border-style: solid;
        border-width: 0 2px 2px 0;
        top: 10px;
        left: 16px;
        transform: rotate(45deg);
        height: 15px;
        width: 7px;
    }
    /* Style the close button */
    
    .close {
        position: absolute;
        right: 0;
        top: 0;
        padding: 12px 16px 12px 16px;
    }
    .close:hover {
        background-color: #f44336;
        color: white;
    }
    /* Style the listheader */
    
    .listheader {
        background-color: #f44336;
        padding: 5px 20px;
        color: white;
        text-align: center;
    }
    /* Clear floats after the listheader */
    
    .listheader:after {
        content: "";
        display: table;
        clear: both;
    }
    .w3-input {
        color: black;
    }
</style>

<body>
    <div id="personal-list">
        <div id="myLIST" class="listheader">
            <p style="float: left;"><small>Only you can see and control the contents of this list </small>
            </p>
            <input type="text" id="ListInput" class="w3-input w3-border-0" placeholder="Task...">
            <span onclick="newElement()" class="w3-button">Add</span>
        </div>

        <ul id="myUL" ng-repeat="x in list">
            <li class="{{  x.class  }}">{{  x.task  }}</li>
        </ul>
    </div>
    <!-- /#wrapper -->
    <script src="js/jquery.js"></script>
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
</body>

</html>