
var boldBtn=document.getElementsByName('bold');
var italicsBtn=document.getElementsByName('italics');
var underlineBtn=document.getElementsByName('underline');
var colorPicker=document.getElementById('colorPicker');
var boldCounter=0;
var italicCounter=0;
var underlineCounter=0;
boldBtn.addEventListener("click",fontBold);
italicsBtn.addEventListener("click",fontItalics);
underlineBtn.addEventListener("click",fontUnderline);
colorPicker.addEventListener("click",changeColor);

function fontBold(){
    if(boldCounter==0 || boldCounter%2==0){
        document.getElementById("questionText").style.fontWeight="bold";
    }
    else document.getElementById("questionText").style.fontWeight="200";
    boldCounter++;
}
function fontItalics(){
    if(italicCounter==0 || italicCounter%2==0){
        document.getElementById("questionText").style.fontStyle="italic";
    }
    else document.getElementById("questionText").style.fontStyle="normal";
    italicCounter++;
}
function fontUnderline(){
    if(underlineCounter==0 || underlineCounter%2==0){
        document.getElementById("questionText").style.textDecoration="underline";
    }
    else document.getElementById("questionText").style.textDecoration="none";
    underlineCounter++;
}
function changeColor(){
    document.getElementById("questionText").style.color=colorPicker.value;
}