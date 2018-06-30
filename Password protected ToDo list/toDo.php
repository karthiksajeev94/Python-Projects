<!DOCTYPE html>
<?php
$cvalue=$_REQUEST['n'];
setcookie("user",$cvalue,time()+(86400*60),"/");
?>
<html>
<head>
<title>
To-Do List
</title>
<link rel="stylesheet" href="todoStyle.css">
<script src="todoScript.js">
</script>
</head>
<body>
<div id="header">
<h1 id="headerText"><center>To-Do List</center></h1>
</div>
<hr>
<?php echo "Welcome, ".$_REQUEST['n']; ?>
<center>
<h2>
Create New Task
</h2>
</center>
<div id="createTask">
<form id="taskForm" action="#">
<span id="label1">Task : </span><input type="text" name="task"></input><br>
<span id="label3">Deadline : </span><input type="date" name="deadline"></input><br>
<span id="noLabel"></span><input type="button" onclick="addTask()" value="Create!"/><br>
</form>
</div>
<br>
<hr>
<center>
<h2>
Created Tasks
</h2>
</center>
<div id="holder">
<div id="row1">
<div class="tasks" id="task1" style="visibility:hidden">
<center><h3>Task 1</h3></center>
<div>Task : <span id="t11"></span><br></div>
<div>Date created : <span id="t12"></span><br></div>
<div>Deadline : <span id="t13"></span><br></div>
<div id="btn1"><button id="t1Complete" onclick="disappear(1)">Completed!</button></div>
</div>
<div class="tasks" id="task2" style="visibility:hidden">
<center><h3>Task 2</h3></center>
<div>Task : <span id="t21"></span><br></div>
<div>Date created : <span id="t22"></span><br></div>
<div>Deadline : <span id="t23"></span><br></div>
<div id="btn2"><button id="t2Complete" onclick="disappear(2)">Completed!</button></div>
</div>
<div class="tasks" id="task3" style="visibility:hidden">
<center><h3>Task 3</h3></center>
<div>Task : <span id="t31"></span><br></div>
<div>Date created : <span id="t32"></span><br></div>
<div>Deadline : <span id="t33"></span><br></div>
<div id="btn3"><button id="t3Complete" onclick="disappear(3)">Completed!</button></div>
</div>
<div class="tasks" id="task4" style="visibility:hidden">
<center><h3>Task 4</h3></center>
<div>Task : <span id="t41"></span><br></div>
<div>Date created : <span id="t42"></span><br></div>
<div>Deadline : <span id="t43"></span><br></div>
<div id="btn4"><button id="t4Complete" onclick="disappear(4)">Completed!</button></div>
</div>
<div class="tasks" id="task5" style="visibility:hidden">
<center><h3>Task 5</h3></center>
<div>Task : <span id="t51"></span><br></div>
<div>Date created : <span id="t52"></span><br></div>
<div>Deadline : <span id="t53"></span><br></div>
<div id="btn5"><button id="t5Complete" onclick="disappear(5)">Completed!</button></div>
</div>
</div>

<div id="row2">
<div class="tasks" id="task6" style="visibility:hidden">
<center><h3>Task 6</h3></center>
<div>Task : <span id="t61"></span><br></div>
<div>Date created : <span id="t62"></span><br></div>
<div>Deadline : <span id="t63"></span><br></div>
<div id="btn6"><button id="t6Complete" onclick="disappear(6)">Completed!</button></div>
</div>
<div class="tasks" id="task7" style="visibility:hidden">
<center><h3>Task 7</h3></center>
<div>Task : <span id="t71"></span><br></div>
<div>Date created : <span id="t72"></span><br></div>
<div>Deadline : <span id="t73"></span><br></div>
<div id="btn7"><button id="t7Complete" onclick="disappear(7)">Completed!</button></div>
</div>
<div class="tasks" id="task8" style="visibility:hidden">
<center><h3>Task 8</h3></center>
<div>Task : <span id="t81"></span><br></div>
<div>Date created : <span id="t82"></span><br></div>
<div>Deadline : <span id="t83"></span><br></div>
<div id="btn8"><button id="t8Complete" onclick="disappear(8)">Completed!</button></div>
</div>
<div class="tasks" id="task9" style="visibility:hidden">
<center><h3>Task 9</h3></center>
<div>Task : <span id="t91"></span><br></div>
<div>Date created : <span id="t92"></span><br></div>
<div>Deadline : <span id="t93"></span><br></div>
<div id="btn9"><button id="t9Complete" onclick="disappear(9)">Completed!</button></div>
</div>
<div class="tasks" id="task10" style="visibility:hidden">
<center><h3>Task 10</h3></center>
<div>Task : <span id="t101"></span><br></div>
<div>Date created : <span id="t102"></span><br></div>
<div>Deadline : <span id="t103"></span><br></div>
<div id="btn10"><button id="t10Complete" onclick="disappear(10)">Completed!</button></div>
</div>
</div>

</div>

</body>
</html>