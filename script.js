function hideElement(x){
    $.get('functions.php/?hideRowId='+x);
    showElements($('#row').val())
}
function showElements(x){
    $('.sourse').load('functions.php/?count='+x);
}
function rowCount(x){
    var res = parseInt($('#row').val())+x;
    if (res<0) {res=0;}
    else if (res>50) res=50;
    $('#row').val(res);
    showElements(res);
}
function changeQuantity(x,y){
    var res= parseInt($('#PRODUCT_QUANTITY'+x).val())+y;
    if (res<0) {res=0;}
    else if (res>99999) res=99999;
    $('#PRODUCT_QUANTITY'+x).val(res);
    $.get('functions.php/?changeQuantity='+x+'&value='+res);
}
$(function(){
    showElements($('#row').val());
});