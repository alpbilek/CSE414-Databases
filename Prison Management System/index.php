
<!DOCTYPE html>
<html>

<head>
<title>Prison Management System</title>
</head>
<body>





<div id="header">

<ul id="navbar">

<li><a href="home.php">HOME</a></li>
<li><a href="viewPrisoner.php">PRISONER</a></li>
<li><a href="viewStaff.php">STAFF</a></li>
<li><a href="viewCase.php">CASE</a></li>
<li><a href="viewVisitor.php">VISITOR</a></li>
<li><a href="viewFeedback.php">FEEDBACK</a></li>
<li><a href="registerAdmin.php">REGISTER</a></li>
<li><a href="login.php">LOGOUT</a></li>
</ul>
</div>



</body>
</html>
<style>


*{
margin: 0px;
padding: 0px;
}
#header{
width: 100%;
height: 80px;
background: #333;
box-shadow: 0px 2px 4px gray;
}

#navbar{
width:1350px;
height: 80px;
margin: 0px auto;
float: right;
}

#navbar>li{
float: left;
list-style: none;
width: 160px;height: 80px;
border-right:1px solid #534444;
border-left: 1px solid #534444;
}
li>a{
text-decoration: none;
color: white;
font-family: cursive;
font-size: 20px;
line-height: 80px;
display: block;
text-align: center;
}
li>a:hover,
li>a:focus{
background: skyblue;
color: #333;
}
#res_btn{
width: 50px;
height: 50px;
float: right;
display: none;
}
@media screen and (max-width:1260px){
#navbar{
width:800px;
height: 80px;
margin: 0px auto;
float: right;
}
#navbar>li{
float: left;
list-style: none;
width: 150px;
height: 80px;
border-right:1px solid #534444;
border-left: 1px solid #534444;
}
li>a{
text-decoration: none;
color: white;
font-family: cursive;
font-size: 30px;
line-height: 80px;
display: block;
text-align: center;
}
}
@media screen and (max-width:1060px){
#header{
width: 100%;
height: 80px;
background: #333;
box-shadow: 0px 2px 4px gray;
position:relative;top:80px;
}
#navbar{
width:100%;
height: 60px;
margin: 0px auto;
}
#navbar>li{
width: 18%;
}
li>a{
font-size: 16px;
}
}
@media screen and (max-width:768px){
#header{height: 50px;}
#navbar{width:100%;height: 50px;margin: 0px auto;}
#navbar>li{width: 19%;height: 50px;}
li>a{font-size: 16px;line-height: 50px;}
}
@media screen and (max-width: 480px){
#header{
height: 0px;
}
#navbar{
width:100%;
height: 50px;
margin: 0px auto;
margin-top:-40px;
display: none;
}
#navbar>li{
float: none;
list-style: none;
width: 100%;
height: 50px;
background: #333;
border-bottom: 1px solid skyblue;
}
li>a{
font-size: 16px;
line-height: 50px;
}
#res_btn{
display: block;
position: relative;
top:-80px;
cursor: pointer;
}
}
</style>
