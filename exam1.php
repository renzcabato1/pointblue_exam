<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Point Blue</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">Point Blue</a>
            </div>
            <ul class="nav navbar-nav">
            <li  class="active"> <a href="{{ url('/') }}">Exam 1</a></li>
            <li ><a href="exam2.html"  target="_blank">Exam 2</a></li>
            <li ><a href="exam3.html" target="_blank">Exam 3</a></li>
            </ul>
        </div>
        </nav>
		      
        
       <div class="container">
      
       <h2>Exam 1</h2>
       <p>
Item 1 Create a leave form using javascript (Google Apps Script is a plus) that can accommodate the following requests based on 24 days of leaves:
Create a database and user interface for this item.  
Half-day filling
whole day filling
leave date selection by range (example June 3 - 8, but will automatically exclude the weekends) 
automatically reflect leave balance
automatically computes pro-rated accumulate leave from the month of January to the current month (June)</p>
          <form  id='submit_data' enctype="multipart/form-data" onsubmit="submit_request();return false;">
                    <div class='col-md-12'>
                        Leave Type :
                        <select id='leave_type' name='leave_type' class='form-control'>
							<option></option>
							<option value='Whole Day'>Whole Day</option>
							<option value='Half Day'>Half Day</option>
						</select>
                    </div>
                    <div class='col-md-12'>
                        Date From :
                        <input class='form-control' name='date_from' onchange="date_range(this.value)" type='date' required>
                    </div>
                    <div class='col-md-12'>
                        Date To :
                        <input class='form-control' name='date_to' id='date_to' type='date' required>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            Remarks
                            <textarea   class="form-control" name="remarks" required></textarea>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type='submit'  class="btn btn-primary" >Submit</button>
                </div>
            </form>      
			
       <table id='table' class="table table-hover">
	   Available Leave :  <span id='leave_c'>24</span>
           <thead>
               <tr>
                   <th>Leave Type</th>
                   <th>Start Date</th>
                   <th>End Date</th>
                   <th>Leave Count</th>
                   <th>Remarks</th>
               </tr>
           </thead>
           <tbody>
          
               
           </tbody>
       </table>
       </div>
	   
	   
	<script>
	window.onload = view_datas();
		function submit_request()
		{
				
			var queryString = $('#submit_data').serialize();
			$.ajax({    //create an ajax request to load_page.php
                type: "POST",
                url: "submit.php",            
                data: queryString,
                dataType: "json",   //expect html to be returned
                success: function(data){ 
					console.log(data);				
                  location.reload();
                },
                error : function(data){
					console.log(data);
				}	
            });
		}
		function date_range(value)
		{
			$('#date_to').val(''); 
			document.getElementById('date_to').min = value;
		}
		function view_datas()
		{
		
			$.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "get_all_data.php",            
                data: "",
                dataType: "json",   //expect html to be returned
                success: function(data){ 
							var total_count_leave = 0;
						  jQuery.each(data, function(id) {
							  $("#table").find('tbody').append("<tr><td>"+data[id].leave_type+"</td><td>"+data[id].date_from+"</td><td>"+data[id].date_to+"</td><td>"+data[id].leave_count+"</td><td>"+data[id].remarks+"</td></tr>");
							  total_count_leave = total_count_leave+parseFloat(data[id].leave_count);
						 
						 })
					
					var new_leave = 24 - total_count_leave;
					document.getElementById("leave_c").innerHTML = new_leave;
					
                },
                error : function(data){
					console.log(data);
				}	
            });
		}
	</script>
    </body>
</html>
