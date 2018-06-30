taskCount=0;
var arr=new Array();
var pointer=0;
function addTask(){
taskCount=taskCount+1;
//Obtain position to enter new task
if (taskCount<11) {
if (arr.length==0) {
pointer=1;
arr.push(pointer);
} else {
for (i=1;i<11;i++) {
if (arr.includes(i)) {
;
} else {
pointer=i;
arr.push(pointer);
break;
}
}
}
var date3=new Date();
document.getElementById("t"+pointer+"1").innerHTML=document.getElementById("taskForm").task.value;
document.getElementById("t"+pointer+"2").innerHTML=date3.toISOString().slice(0,10);
document.getElementById("t"+pointer+"3").innerHTML=document.getElementById("taskForm").deadline.value;
document.getElementById("task"+pointer).style.visibility="visible";
document.getElementById("taskForm").task.value="";
document.getElementById("taskForm").deadline.value=""; 
var date2=new Date(document.getElementById("t"+pointer+"3").innerHTML);
var duration=Math.ceil((date2.getTime()-date3.getTime())/(24*60*60*1000));
//Deciding color of task
if (duration>=3){
document.getElementById("task"+pointer).style.backgroundColor="violet";
document.getElementById("task"+pointer).style.color="white";
} else if(duration==2){
document.getElementById("task"+pointer).style.backgroundColor="indigo";
document.getElementById("task"+pointer).style.color="white";
} else if(duration==1){
document.getElementById("task"+pointer).style.backgroundColor="blue";
document.getElementById("task"+pointer).style.color="white";
} else if(duration==0){
document.getElementById("task"+pointer).style.backgroundColor="green";
document.getElementById("task"+pointer).style.color="white";
} else if(duration==-1){
document.getElementById("task"+pointer).style.backgroundColor="yellow";
document.getElementById("task"+pointer).style.color="black";
} else if(duration==-2){
document.getElementById("task"+pointer).style.backgroundColor="orange";
document.getElementById("task"+pointer).style.color="black";
} else if(duration<=-3){
document.getElementById("task"+pointer).style.backgroundColor="red";
document.getElementById("task"+pointer).style.color="black";
}
} else {
alert("Can't create more tasks. Stop procrastinating and finish these ten tasks first!");
taskCount=taskCount-1;
}
}

function disappear(taskNo){
taskCount=taskCount-1;
if (arr.indexOf(taskNo)!=-1) {
arr.splice(arr.indexOf(taskNo),1);
}
document.getElementById("task"+taskNo).style.visibility="hidden";
}