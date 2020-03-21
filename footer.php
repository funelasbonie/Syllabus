
<footer class="footer">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="padding: 4px 40px;">
    <div class="">            
        <div class="footer-copyright" style="padding: 10px 0px;border-top: 1px solid lightgray">
            <strong>Copyright © 2019.</strong> All Rights Reserved
            <a href="" style="float: right"><strong>Version</strong> 0.1.0</a>
        </div>        
	</div>
</div>
</footer>
</body>
</html>

<script src="js/jquery-1.11.3-jquery.min.js"></script> 
<script src="DataTables-1.10.20/media/js/jquery.dataTables.min.js"></script>
<script>window.jQuery || document.write('<script src="css/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="css/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>
<script src="datetimepicker/jquery.datetimepicker.full.min.js"></script>

<script>    

$(document).ready( function () {

load_data2();
load_data();

function load_data(dito){

$.ajax({
	url:"coursefetch.php",
	method:"POST",
	data:{dun:dito},
	success:function(data){
	  $('#sbjresult').html(data)
	} 
})  

}

$('#course').change(function(){
var search = $(this).val();

if(search != ""){
  load_data(search);
}
else{
  load_data();
}
})  

$('#myTable').DataTable();

$('#picker1').datetimepicker({
	timepicker: true,
	datepicker: false,
	format: 'h:m a',                        
	onShow: function(ct){
		this.setOptions({
			maxDate: $('#picker2').val() ? $('#picker2').val() : false
		})
	}
})
$('#picker2').datetimepicker({
	timepicker: true,
	datepicker: false,
	format: 'h:m a',                        
	onShow: function(ct){
		this.setOptions({
			maxDate: $('#picker2').val() ? $('#picker2').val() : false
		})
	}
})

$('#add').click(function(){            
	$('#id01').css('display', 'block');
	$('#form').fadeIn(50).animate({top: '20px'}, 300);
})

$('#addmodule').click(function(){            
	$('#id03').css('display', 'block');
	$('#form3').fadeIn(50).animate({top: '20px'}, 300);
})

$('#addnewacti').click(function(){            
	$('#id04').css('display', 'block');
	$('#form4').fadeIn(50).animate({top: '20px'}, 300);
})

$('#addnewref').click(function(){            
	$('#id05').css('display', 'block');
	$('#form5').fadeIn(50).animate({top: '20px'}, 300);
})
$('#addnewcontact').click(function(){            
	$('#id06').css('display', 'block');
	$('#form6').fadeIn(50).animate({top: '20px'}, 300);
})


/* ADMIN-ACCOUNT
==================================================================== */
$('#addnewaccountbutton').click(function(){            
	$('#addnewaccountmodal').css('display', 'block');
	$('#addnewaccountform').fadeIn(50).animate({top: '20px'}, 300);
})
$('#addnewaccountclose').click(function(){      
	$('#addnewaccountform').animate({top: '-10px'}, 200, function(){
		$('#addnewaccountform').fadeOut(50, function(){
		$('#addnewaccountmodal').fadeOut(200);                  
		});
	});            
})
/* 
==================================================================== */




$('#close').click(function(){      
	$('#form').animate({top: '-10px'}, 200, function(){
		$('#form').fadeOut(50, function(){
		$('#id01').fadeOut(200);                  
		});
	});            
})

$('#close2').click(function(){      
	$('#form2').animate({top: '-10px'}, 200, function(){
		$('#form2').fadeOut(50, function(){
		$('#id02').fadeOut(200);                  
		});
	});            
})

$('#close3').click(function(){      
	$('#form3').animate({top: '-10px'}, 200, function(){
		$('#form3').fadeOut(50, function(){
		$('#id03').fadeOut(200);                  
		});
	});            
})

$('#close4').click(function(){      
	$('#form4').animate({top: '-10px'}, 200, function(){
		$('#form4').fadeOut(50, function(){
		$('#id04').fadeOut(200);                  
		});
	});            
})

$('#close5').click(function(){      
	$('#form5').animate({top: '-10px'}, 200, function(){
		$('#form5').fadeOut(50, function(){
		$('#id05').fadeOut(200);                  
		});
	});            
})
$('#close6').click(function(){      
	$('#form6').animate({top: '-10px'}, 200, function(){
		$('#form6').fadeOut(50, function(){
		$('#id06').fadeOut(200);                  
		});
	});            
})





} );
   
var modal = document.getElementById('id01');
var form = document.getElementById('form');
var modal2 = document.getElementById('id02');
var form2 = document.getElementById('form2');
var modal3 = document.getElementById('id03');
var form3 = document.getElementById('form3');
var modal4 = document.getElementById('id04');
var form4 = document.getElementById('form4');
var modal5 = document.getElementById('id05');
var form5 = document.getElementById('form5');
var modal6 = document.getElementById('id06');
var form6 = document.getElementById('form6');

var accmodal = document.getElementById('addnewaccountmodal');
var accform = document.getElementById('addnewaccountform');

window.onclick = function(event) {
	if(event.target == modal) {
		$('#form').animate({top: '-10px'}, 200, function(){
			$('#form').fadeOut(50, function(){
			$('#id01').fadeOut(200);                  
			});
		});	
	} 
	else if(event.target == modal2) {
		$('#form2').animate({top: '-10px'}, 200, function(){
			$('#form2').fadeOut(50, function(){
			$('#id02').fadeOut(200);                  
			});
		});	
	}
	else if(event.target == modal3) {
		$('#form3').animate({top: '-10px'}, 200, function(){
			$('#form3').fadeOut(50, function(){
			$('#id03').fadeOut(200);                  
			});
		});	
	}
	else if(event.target == modal4) {
		$('#form4').animate({top: '-10px'}, 200, function(){
			$('#form4').fadeOut(50, function(){
			$('#id04').fadeOut(200);                  
			});
		});	
	}
	else if(event.target == modal5) {
		$('#form5').animate({top: '-10px'}, 200, function(){
			$('#form5').fadeOut(50, function(){
			$('#id05').fadeOut(200);                  
			});
		});	
	}
	else if(event.target == modal6) {
		$('#form6').animate({top: '-10px'}, 200, function(){
			$('#form6').fadeOut(50, function(){
			$('#id06').fadeOut(200);                  
			});
		});	
	}
	else if(event.target == accmodal) {
		$('#addnewaccountform').animate({top: '-10px'}, 200, function(){
			$('#addnewaccountform').fadeOut(50, function(){
			$('#addnewaccountmodal').fadeOut(200);                  
			});
		});	
	}
	

 }	

 $('.edit').click(function(){            
		$('#id02').css('display', 'block');
		$('#form2').fadeIn(50).animate({top: '20px'}, 300);
		/* let x = document.getElementById('userid');
		let y = document.getElementById('frmuserid');
		y.value = x.text; */
		$('.sid').val($(this).text());

		var search = $('.sid').val();
		if(search != '')
		{
		  load_data2(search);
		}
		else
		{
		  load_data2();  
		}
	}) 



function load_data2(haha){
	  $.ajax({
		url:"updateuserfetch.php",
		method:"POST",
		data:{yungsearch:haha},
		success:function(data)
		{
		  $('#objresult').html(data);            
		}
	  })
	}




</script>