$(document).ready(function(){
      
function filterPriceItems(){
    let index = 0;
    let obj = $("#artikl_" + index);
    let minPrice= $('#hidden_minimum_price').val();
    let maxPrice= $('#hidden_maximum_price').val();
    let cijenaObjekta = 0;
    while (obj[0] != undefined) {
        cijenaObjekta =parseFloat($('#artikl_'+index+'_cijena')[0].innerHTML);
        
        if(cijenaObjekta < maxPrice && cijenaObjekta > minPrice){
            obj.removeClass("d-none");
        }
        else{
            obj.addClass("d-none");
        }
        index++;
        obj = $("#artikl_" + index);
    }
}
function filterMarkaItems(checkedmarka){
    let index = 0;
    let obj = $("#artikl_" + index + "_marka");
    let markadiv = $("#artikl_" + index);
   if(obj[0] != undefined) {
        if(obj[0].html == checkedmarka){
            markadiv.addClass("d-none");
        }else{
            markadiv.removeClass("d-none");
        }
        index++;
        obj = $("#artikl_" + index+"_marka");
        
   }
}


$(".marka").change(function() {
   // filterMarkaItems(this.html);
    if($(".marka").is(":checked")) {
        filterMarkaItems($(this).val());
    }
    else console.log("Not checked");    
})

$('#price_range').slider({
        range:true,
        min:0,
        max:5000,
        values:[0,5000],
        step:1,
        slide:function(event,ui){
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filterPriceItems();
        }
    });
   

});