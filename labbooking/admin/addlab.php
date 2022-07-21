<!doctype html>
<html>
<head>
<body>

<div id="mySidenav"
    class="sidenav">
    <a href="javascript:void(0)"
    class="closebtn"
    onclick="closeNav()">&times;</a>
    
    
    <a href="index.php">Home</a><br>
      <br><a href="addlab.php">Add lab</a><br>
      <br><a href="delete.php">Delete user</a><br>
      <br><a href="../login/">Logout</a><br>
</div>

  

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

        <script>
          function openNav()
          {
   
           document.getElementById("mySidenav").style.width="250px";
   
   
          }
          function closeNav() {
     document.getElementById("mySidenav").style.width = "0";
   }
   
        </script>



    <style>

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  margin: 0;
  padding: 0;
  background: linear-gradient(120deg,#2980b9, #8e44ad);
  height: 100vh;
  overflow: hidden;
}


.sidenav
{

  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden ;
  padding: 0px;
}


.sidenav a
{

  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover
{
  color: rgb(49, 9, 251);
}

.sidenav .closebtn {
  position: absolute;
  top: 5;
  right: 25px;
  font-size: 36px;
  margin-left: 40px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


h2{

    
    text-align: center;
}

.center{
  position:absolute; 
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 500px;
  background: white;
  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
}
.center h1{
  text-align: center;
  padding: 40px 0;
  border-bottom: 1px solid silver;
}
.center form{
  padding: 0 40px;
  box-sizing: border-box;
}
form .txt_field{
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}
.txt_field input{
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}
.txt_field label{
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
  transition: .5s;
}
.txt_field span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: #2691d9;
  transition: .5s;
}
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
  top: -5px;
  color: #2691d9;
}
.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before{
  width: 100%;
}
.pass{
  margin: -5px 0 20px 5px;
  color: #a6a6a6;
  cursor: pointer;
}
.pass:hover{
  text-decoration: underline;
}
input[type="submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: #2691d9;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}
input[type="submit"]:hover{
  border-color: #2691d9;
  transition: .5s;
}
  






    </style>





    



<?php
session_start();
if(isset($_SESSION['username'])){
?>


    <div class="center">
    <h1>Add Lab</h1>
      <form method="POST" action="savelab.php">
        <div class="txt_field">
          <input type="text" required name='lab_name'>
          <span></span>
          <label>Lab Name</label>
        </div>
        <div class="txt_field">
          <input type="text" required name="lab_location">
          <span></span>
          <label>Lab Location</label>
        </div>
          <div class="txt_field">
          <input type="text" required name="lab_capacity">
          <span></span>
          <label>Lab Capacity</label>
        
        </div>
       
        <input type="submit" value="Submit" name="Submit">
      </form>
     
         
        </div>


       
      </form>
    </div>
  
<?php    
}else{ header("Location: index.html");}    
?>