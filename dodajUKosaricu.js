let artikli = 0;
let sum = 0;

let kosaricaId = [];


$(document).ready(function(){
    $('.dodajUKosaricu').on('click',function(){
        alert("Proizvod dodan u košaricu!");
    })
    });

/*$(document).ready(function(){

    var kosaricaIdVar = localStorage.getItem("kosaricaId");

    jQuery.post("./kosarica.php", {kosaricaId: kosaricaIdVar}, function(data){
      alert(data);
    }).fail(function(){
      alert("Error");
    });

})*/

/*
$(document).ready(function(){
    
    $('.dodajUKosaricu').on("click",function(){

        if(!localStorage.getItem('artikli')){
            localStorage.setItem('artikli',artikli += 1);
        }
        else{
            localStorage.setItem('artikli',parseInt(localStorage.getItem('artikli')) + 1);           
            console.log(parseInt(localStorage.getItem('artikli')) + 1);
        }    
        $('.kosarica span').text(parseInt(localStorage.getItem('artikli')));  
    })

 
})
*/
function appendId(val){
kosaricaId.push(val)
localStorage.setItem("kosaricaId",kosaricaId);
console.log(localStorage.getItem('kosaricaId'));
} 

$(document).ready(function(){

$('#dohvatiId').text(localStorage.getItem(''));

     
})


