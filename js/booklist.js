$(function(){
	     function getNextDay(d){
        d = new Date(d);
        d = +d + 1000*60*60*24;
        d = new Date(d);
        
        return d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
         
       }
		    $("#checkindate").datepicker({
            onSelect : function(selectedDate) {
            	
            	var nextday = getNextDay(selectedDate);
               	$("#checkoutdate").datepicker("option", "minDate", nextday);
               	$('#checkoutdate').datepicker('setDate',nextday);
            }
            });
            
			$("#visitdate").datepicker({
              
            });
			
		    $("#checkoutdate").datepicker({

            	onSelect : function(selectedDate) {
            		//$("#checkindate").datepicker("option", "maxDate", selectedDate);
            		var mouth4 = new Date("2016-04-01"); 
            		var indate = new Date($("#checkindate").val());
            		var outdate = new Date($("#checkoutdate").val());
            		if(indate<mouth4&&outdate>mouth4){
            			alert("跨季度入住时,若阁下预订2016年4月1日之后的客房,请分开查询和加入购物车");
            			$('#checkoutdate').datepicker('setDate',mouth4);
            			$('#checkoutdate').blur();
            		}
            	}
        	});
        
		     var myDate = new Date();
		     var tdate = myDate;
         $('#checkindate').datepicker('option', 'minDate', tdate);
         $('#checkoutdate').datepicker('option', 'minDate', getNextDay(tdate));
		// $('#checkindate').datepicker('option', 'defaultDate', 0);
		//  $('#checkoutdate').datepicker('option', 'defaultDate', +1);
		  //$('#checkindate').datepicker('setDate',myDate);
		 // $('#checkoutdate').datepicker('setDate',+1);
          $('#checkindate').datepicker('option', 'showButtonPanel', true); 
          $('#checkoutdate').datepicker('option', 'showButtonPanel', true); 
          
          $('#checkindate').datepicker('option', 'duration', 'slow'); 
          $('#checkoutdate').datepicker('option', 'duration', 'slow'); 
          
          //$('#visitdate').datepicker('option', 'minDate', new Date());
		  //$('#visitdate').datepicker('option', 'defaultDate', 0);
		 // $('#visitdate').datepicker('setDate',myDate);
		  $('#visitdate').datepicker('option', 'showButtonPanel', true); 
		  $('#visitdate').datepicker('option', 'duration', 'slow'); 
		  
		  
		$(".filteroption_content ul li").click(function(){
			var ulparent = $(this).parent()	;
			var lis = ulparent.find("li");
			lis.each(function(){
				$(this).removeClass("selected");	
			});
			$(this).addClass("selected");
		});
        
        


	
});