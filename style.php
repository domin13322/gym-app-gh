<?php
    session_start();
    header("Content-type: text/css");
?>

body
{
    margin:0 !important;   
    padding:0;
    display: flex;
    flex-direction: column;
}
#logo {
    width:100%;
    background-color: black;
    text-align: center;
    letter-spacing: 2px;
    color:azure;
    height:50px;
    font-size:25px;
}
ul{
    list-style-type: none; 
}
.menuList{
    list-style-type: none;
	display: inline-block;
    height: 40px;
    padding: 0;
    font-size: 18px;
    width: 100%;
    margin-right:5px;
}
.subMenu{
    list-style-type: none;
	display: inline-block;
    height: 40px;
    padding: 0;
    font-size: 18px;
    width: 100%;
    display: none;
}
ul>li{
    float:left;
    background-color:rgb(78, 74, 74);
    color:white;
    height:40px;
    font-size: 18px;
    margin-right:5px;
}
.sign{
    background-color:rgb(83, 0, 0);
    color:white;
    width:9%; 
}
.menuItem{
    width:15%;
}

ul>li>ul>li{
    width: inherit;
    clear: both;
    font-size: 18px;
}
ul>li:hover >ul {
    display: block;
}
ul>li a{
    display: block;
    height: inherit;
}
.subItem{
    background-color:rgb(78, 74, 74);
    color:white;
}
ul>li:hover{
    opacity:0.95;
    background-color:dimgray;
    color:wheat;
    cursor:pointer;
}
#menu{
    margin-bottom:50px;
}
.nav{
    margin-bottom:50px;
    background-color: darkgrey;
}
.sticky
{
	width: 80%;
    margin-left:10%;
	position: fixed;
	left: 0;
	top: 0;
	z-index: 100;
}
#mainContainer{
margin-left:10%;
width:80%;
height:100%;
background-color:rgba(174, 216, 221, 0.562);
min-height:700px;
}
footer{
    background-color:black;
    height:70px;
    color:white;
    width:80%;
    margin-left:10%;
    text-align: center;
    font-size: 20px;
    clear: both;
}
a:link{
    text-decoration: none;
    color: inherit;
}
a:visited{
    text-decoration: none;
    color: inherit;
}
.addTrainingMenu{
    background-color:rgb(126, 9, 9);
    width:305px;
    height: 40px;
    color:white;
    display: inline-block;
    margin-bottom: 20px;
    font-size:25px;
    text-align: center;
    letter-spacing:1px;
    font-weight: bold;

}
#saveTrainingBtn{
    margin-top:30px;
    margin-bottom:30px;
    background-color:rgba(101, 146, 151, 0.575) ;
    height:60px;
    width:120px;
    border:2px rgb(126, 9, 9) solid;
}
#saveTrainingBtn:hover{
    cursor: pointer;
    background-color:rgba(39, 84, 88, 0.575) ;
}
.exName{
    float: left;
    width:300px;
    border:1px rgb(126, 9, 9) solid;
    height:30px;
    margin-right:1px;
    margin-bottom:5px;
    font-weight: bold;

}
.nameTile{
    float: left;
    width:303px;
    height:30px;
    margin-right:2px;
    margin-bottom:5px;
    color: wheat;
    background-color:darkred;
    border:1px rgb(126, 9, 9) solid;
    font-weight: bold;

}
.reps,.sets{
    float: left;
    width:100px;
    border:1px rgb(126, 9, 9) solid;
    height:30px;
    margin-right:1px;
    margin-bottom:5px;
    font-weight: bold;
}
.repsTile,.setsTile{
    float: left;
    width:103px;
    height:30px;
    margin-right:2px;
    margin-bottom:5px;
    color: wheat;
    background-color:darkred;
    border:1px rgb(126, 9, 9) solid;
    font-weight: bold;

}
#table{
    margin-bottom:100px;
    margin:0 0 0 250px;
}
#addNewRowBtn{
    border:3px rgb(126, 9, 9) solid;
    height:34px;
    margin-bottom:10px;
    background-color:rgba(101, 146, 151, 0.575) ;
}
#addNewRowBtn:hover{
    background-color:rgba(39, 84, 88, 0.575) ;
    cursor: pointer;
}
.error{
    color:red;
}
#register{
    text-align: center;
    border: 2px solid rgb(126, 9, 9);
    margin-bottom:50px;
    margin-left: 200px;
    margin-right:200px;
    margin-top:80px;
}
#accountBtn{
     background-color:rgb(126, 9, 9);
     padding:10px;
}
#accountBtn:hover{
    cursor: pointer;
    opacity: 0.8;
}
#signInFieldset{
    border:2px solid rgb(126, 9, 9);
    margin-left:300px;
    margin-right:300px;
    text-align: center;
    min-height:200px;
}
legend{
    font-weight: bold;
}
#date{
    margin-bottom:30px;
}
.logIn{
    width:100px;
    height:40px;
    font-size:16px;
    margin-bottom:20px;
}
.logIn:hover{
    cursor: pointer;
    opacity:0.8;
}
.signInInput{
    width:200px;
    border:1px solid rgb(126, 9, 9);
    border-radius:10px;
    height:30px;
    margin-left:10px;
    margin-bottom:10px;
}
.findBtn{
    background-color: rgb(180, 13, 13);
    border:1px black solid;
    width:100px;
    margin-top: 5px;
    height: 50px;
    font-size:15px;
}
button:hover{
    cursor: pointer;
    opacity:0.8;
}
#exInfo{
    margin-left:3.3%;
    min-height:500px;
    width:80%;
}
#exData{
    margin-left:15px;
}
.title{
    text-align: center;
    margin-bottom:30px;
}
.text{
    font-weight: bold;
    font-size:20px;
}
#exerciseTable{
    border:2px solid rgb(97, 6, 6);
    min-width:70%;
    min-height:300px;
}
.head{
    font-weight: bold;
}
td{
    border:1px solid rgb(126, 9, 9);

}
#chart_div{
    margin-top:10px;
    margin-bottom:10px;
}
#forumContainer{
    background-color: wheat;
    margin-left:10%;
    width:80%;
    height:100%;
    min-height:700px;
}
#question{
    width:70%;
    margin-left:10%;
    margin-top:10px;
    min-height:200px;
}
#questionText{
    width:90%;
    min-height:200px;
    margin-top: 10px;
}
.textFeature{
    display: inline-block;
    margin-right:2px;
    width:30px;
    height:30px;
}
