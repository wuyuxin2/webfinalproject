/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2017-05-22 03:11:37
 * @version $Id$
 */
 $(init)
 function init(){

    /*var html=$("#chose-product").html();
    $("#chose-product").append(html);*/
    $("body").on('click', '.product-minus', productminus);
    $("body").on('click', '.product-add', productadd);

    $("body").on('click', '.chose-product-delete', choseproductdelete);
    $("body").on('click','#all-checkbox',function(){
    	if(this.checked){
    		$("body :checkbox").prop("checked",true);
    		
    	}
    	else{

    		$("body :checkbox").prop("checked",false);
              
    	}
    });
}

function choseproductdelete(e){

	$("#chose-product").remove();


}
function productminus(e){

	var a=$(".input-numofproduct").val();
	if(a==1){
		$(".product-minus").css("background","#f0f0f0");
	}
	else if(a>=2){

		--a;
		$(".input-numofproduct").val(a);

	}
}

function productadd(e){
	var a=$(".input-numofproduct").val();
	++a;
	$(".input-numofproduct").val(a);
	$(".product-minus").css("background","#ffffff");
}

 /*function allcheck(e){
   if($("input[name=all-check]").attr('checked')=="checked"){

       $("input[name=check]").attr('checked',"checked");
   }*/


