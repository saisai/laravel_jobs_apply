$(document).ready(function(){
    /*
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
*/

    // CSRF protection
    $.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });

    $( ".formJobsDb" ).click(function( event ) {
        event.preventDefault();
        var element = $(this);
        var Id = element.attr("id");

        var link = $('#link'+Id).val();
        var title = $('#title'+Id).val();
        var from_which_website = $('#from_which_website'+Id).val();
        var dataString = 'link='+ encodeURIComponent(link) + '&title=' + title + '&from_which_website='+from_which_website ;

        // Becareful with dataType:'json'. If don't add this , can not be used data.success. Take me 2 hours to find it. :)
        $.ajax({
            url:'add_job_db',
            method: 'post',
            data: dataString,
            dataType: 'json',
            success:function(data){
                //alert(data);
                if(data.success)
                {
                    alert("Successfully added!");

                }
                else
                {
                    //alert(data.test[0].countID);
                    alert("Exits");
                }

            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
        return false;

    });


    $(".classSendMail").click(function(event){
        event.preventDefault();
				var result = $(this);
				var Id = result.attr("id");
        var detailId = $("#detail_id_"+Id).val();
        var tb_apply_id = $("#tb_apply_id_"+Id).val();
        $.ajax({
            type: 'post',
            url : 'send-mail',
            dataType: 'json',
            data: "detail_id=" +detailId + "&tb_apply_id=" + tb_apply_id,

            success:function(html){

                if(html.success)
                {
                    $("#sendingMail").html("Successfully sent...");
                    $('#sendingMail').toggle("slow").delay( 1000 );
										location.reload(true);
                        /*
                        , function(){
                        .delay( 800 );
                    });*/
                }

            }

        });
        return false;
    });
	
	
	$(".clickAddDetail").click(function(e) {
		e.preventDefault();
		 $('.clickAddDetail').html('Sending..');
		 
		 var qualification = CKEDITOR.instances.qualification.getData();
		 var responsibility = CKEDITOR.instances.responsibility.getData();
		 var companyinfo = CKEDITOR.instances.companyinfo.getData();
        //var responsibility = $("input[name=responsibility]").val();

       // var qualification = $("input[name=qualification]").val();

        var link = $("input[name=link]").val();		 
        var email = $("input[name=email]").val();		 
        var salary = $("input[name=salary]").val();		 
        var tb_apply_id = $("input[name=tb_apply_id]").val();		 
        //var cvFile = $( "#cvFile" ).val(); 
        var applyFor = $( "#applyFor" ).val(); 
        
        
   
	   /* Submit form data using ajax*/
	   $.ajax({
		  url: "add-detail",
		  method: 'post',
		  //data: $('#addDetail').serialize(),
		  data:{email:email, link:link, qualification:qualification, responsibility:responsibility,companyinfo:companyinfo, salary:salary, tb_apply_id:tb_apply_id, applyFor:applyFor},
		  success: function(response){
			 //------------------------
				$('.clickAddDetail').html('Submit');
				//$('#res_message').show();
				//$('#res_message').html(response.msg);
				//$('#msg_div').removeClass('d-none');
				printErrorMsg(response.msg)
				if(response.msg === true)
				{
					//location.href('list');
					window.location.href = "/list";
					//alert('true');

				}
	 
	 
				//document.getElementById("addDetail").reset(); 
				/*
				setTimeout(function(){
				$('#res_message').hide();
				$('#msg_div').hide();
				},10000);
				*/
			 //--------------------------
		  }});
	  
		// 'url' => 'add-detail',
	});
	
	$(".uploadClick").click(function(e) {
	//$('#upload_form').on('submit', function(event){
		e.preventDefault();
		 $('.uploadClick').html('Sending..');
		 
		 var fileinput = $("#fileinput").val();
		 var title = $("#title").val();
		        
   
	   /* Submit form data using ajax*/
	   $.ajax({
		  url: "upload-data",
		  method: 'post',
		  //data: $('#addDetail').serialize(),
		  //data:  new FormData(document.getElementById("upload_form")),
		  //data:  { fileinput:new FormData($("#upload_form")[0]), title:title},
		  data:new FormData($("#upload_form")[0]),
		  //dataType:'JSON',
		  contentType: false,
		  cache: false,
		  processData: false,
		  success: function(response){
			 //------------------------
				$('.clickAddDetail').html('Submit');
				//$('#res_message').show();
				//$('#res_message').html(response.msg);
				//$('#msg_div').removeClass('d-none');
				printErrorMsg(response.msg)
				if(response.msg === true)
				{
					//location.href('list');
					//alert(response.msg);
					window.location.href = "/list-file";
					//alert('true');

				}
	 
				//document.getElementById("addDetail").reset(); 
				/*
				setTimeout(function(){
				$('#res_message').hide();
				$('#msg_div').hide();
				},10000);
				*/
			 //--------------------------
		  }});
	  
		// 'url' => 'add-detail',
	});	
	

	
	$(".applyFor").click(function(e) {
		e.preventDefault();
		$('#res_message').hide();
		 $('.applyFor').html('Sending..');
		 
		 
        var title = $("input[name=title]").val();		 
           
	   /* Submit form data using ajax*/
	   $.ajax({
		  url: "add-apply-for",
		  method: 'post',
		  //data: $('#addDetail').serialize(),
		  data:{title:title},
		  success: function(response){
			 //------------------------
				$('.applyFor').html('Submit');
				printErrorMsg(response.msg)
			if(response.msg === true)
				{
					//location.href('list');
					//alert(response.msg);
					window.location.href = "list-apply-for";
					//alert('true');

				}
				/*
				$('#res_message').show();
				$('#res_message').html(response.msg);
				$('#msg_div').removeClass('d-none');
	 
				document.getElementById("addApplyFor").reset(); 
				
				setTimeout(function(){
				$('#res_message').hide();
				$('#msg_div').hide();
				},10000);
				*/
			 //--------------------------
		  }});
	  
		// 'url' => 'add-detail',
	});
	


});

function printErrorMsg (msg) {
	
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		console.log(value);
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
}

