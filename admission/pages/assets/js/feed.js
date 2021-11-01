

    function getstval() {
    var stateval = $("#country_origin").val();
        
	$.ajax({          
        	type: "GET",
        	url: "../backend/getst.php",
        	data:'cntid='+stateval,
        	success: function(data){
           
                $("#state_origin").html(data);
              
        	}
	});
}


    function getlgaval() {
    var stateval = $("#state_origin").val();
        
	$.ajax({          
        	type: "GET",
        	url: "../backend/getlga.php",
        	data:'stateid='+stateval,
        	success: function(data){
           
                $("#lga_origin").html(data);
              
        	}
	});
}

    function getstvalres() {
    var stateval = $("#country_res").val();
        
	$.ajax({          
        	type: "GET",
        	url: "../backend/getst.php",
        	data:'cntid='+stateval,
        	success: function(data){
           
                $("#state_res").html(data);
              
        	}
	});
}

    function getlgavalres() {
    var stateval = $("#state_res").val();
        
	$.ajax({          
        	type: "GET",
        	url: "../backend/getlga.php",
        	data:'stateid='+stateval,
        	success: function(data){
           
                $("#lga_res").html(data);
              
        	}
	});
}

    function getprog() {
    var stateval = $("#mode").val();
        
	$.ajax({          
        	type: "GET",
        	url: "../backend/getlga.php",
        	data:'modeid='+stateval,
        	success: function(data){
           
                $("#prog").html(data);
              
        	}
	});
}

    function getcourse() {
    var stateval = $("#prog").val();
        
	$.ajax({          
        	type: "GET",
        	url: "../backend/getlga.php",
        	data:'progid='+stateval,
        	success: function(data){
           
                $("#course").html(data);
              
        	}
	});
}




function profile_update() {
    
    var firstname = document.getElementById("profile_firstname").value;
    var othername = document.getElementById("profile_othername").value;
    var lastname = document.getElementById("profile_lastname").value;
    var gender = document.getElementById("profile_gender").value;
    var dateofbirth = document.getElementById("profile_dateofbirth").value;
    var lga = document.getElementById("lga_origin").value;
    var email = document.getElementById("profile_email").value;
    var phonenumber = document.getElementById("profile_phonenumber").value;
    var landmark = document.getElementById("profile_landmark").value;
    var fulladdress = document.getElementById("profile_fulladdress").value;
    var town = document.getElementById("profile_town").value;

    $.ajax({
        url:'../backend/updateprofile.php',
        method:'POST',
        data:{
           
            firstname:firstname,
            othername:othername,
            lastname:lastname,
            gender:gender,
            dateofbirth:dateofbirth,
            lga:lga,
            email:email,
            phonenumber:phonenumber,
            landmark:landmark,
            fulladdress:fulladdress,
            town:town
        },
        success:function(data){
         $("#feedback").html(data);
         
        }
     });

    }


    
function recordadmission() {
    
    var affirm = document.getElementById("affirm").value;
    if(affirm != 'on'){
        alert('You need to affirm that you have sighted and verified the applicants documents');
    }
else{
    var regnum = document.getElementById("regnum").value;

    $.ajax({
        url:'../backend/recordadmission.php',
        method:'POST',
        data:{
           
            regnum:regnum
        },
        success:function(data){
         
         if (data.includes("Success")) {
            window.location='mgform.php'
            $("#feedback").html(data);
        }
        else{
            $("#feedback").html(data);
        }
        }
     });

    }
}



function addagent() {
    
    var agentid = document.getElementById("agentid").value;
    var agentpwd = document.getElementById("agentpwd").value;
    var idlent = agentid.length;
    var pwdlent = agentpwd.length;
    if(agentid != ""){
        if(idlent >= 6 && idlent <= 12){
            if(agentpwd != ""){  
                if(pwdlent >= 6 && pwdlent <= 12){ 
                    $.ajax({
                        url:'../backend/createagent.php',
                        method:'POST',
                        data:{
                           
                            agentid:agentid,
                            agentpwd:agentpwd
                        },
                        success:function(data){
                         
                         if (data.includes("Success")) {
                            window.location='mgagent.php'
                            $("#feedback").html(data);
                        }
                        else{
                            alert(data);
                        }
                        }
                     });
                }
                else{
                   alert("Default password must be between 6 - 12 Characters")
                }
            }
            else{
                alert("Default Agent Password can not be empty")
             }
        
            }
            else{
                alert("Default Agent Username must be between 6 - 12 Characters")
             }

    }
    else{
        alert("Default Agent Username can not be empty")
     }
     
}