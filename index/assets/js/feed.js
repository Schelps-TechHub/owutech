

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


function pushdata() {
    
    var firstname = document.getElementById("firstname").value;
    var othername = document.getElementById("othername").value;
    var lastname = document.getElementById("lastname").value;
    var gender = document.getElementById("gender").value;
    var dateofbirth = document.getElementById("dateofbirth").value;
    var marital = document.getElementById("marital").value;
    var country_origin = document.getElementById("country_origin").value;
    var state_origin = document.getElementById("state_origin").value;
    var lga_origin = document.getElementById("lga_origin").value;
    var app_email = document.getElementById("app_email").value;
    var app_phonenumber = document.getElementById("app_phonenumber").value;
    var country_res = document.getElementById("country_res").value;
    var state_res = document.getElementById("state_res").value;
    var lga_res = document.getElementById("lga_res").value;
    var landmark = document.getElementById("landmark").value;
    var fulladdress = document.getElementById("fulladdress").value;
    var town = document.getElementById("town").value;
    var course = document.getElementById("course").value;
    var entrymode = document.getElementById("entrymode").value;
    var numssce = document.getElementById("numssce").value;
  

    //second details
    var examnum1 = document.getElementById("examnum1").value;
    var examtype1 = document.getElementById("examtype1").value;
    var examyear1 = document.getElementById("examyear1").value;
    var examyear2 = document.getElementById("examyear2").value;
    var examnum2 = document.getElementById("examnum2").value;
    var examtype2 = document.getElementById("examtype2").value;
    var subject1 = document.getElementById("subject1").value;
    var grade1 = document.getElementById("grade1").value;
    var subject2 = document.getElementById("subject2").value;
    var grade2 = document.getElementById("grade2").value;
    var subject3 = document.getElementById("subject3").value;
    var grade3 = document.getElementById("grade3").value;
    var subject4 = document.getElementById("subject4").value;
    var grade4 = document.getElementById("grade4").value;
    var subject5 = document.getElementById("subject5").value;
    var grade5 = document.getElementById("grade5").value;
    var subject6 = document.getElementById("subject6").value;
    var grade6 = document.getElementById("grade6").value;
    var last_inst = document.getElementById("last_inst").value;
    var last_year = document.getElementById("last_year").value;
    var last_credential = document.getElementById("last_credential").value;
   //next of kin
    var kin_name = document.getElementById("kin_name").value;
    var kin_relate = document.getElementById("kin_relate").value;
    var kin_phone = document.getElementById("kin_phone").value;
    var kin_add = document.getElementById("kin_add").value;
   // Sponsor 
    var sponsor_name = document.getElementById("sponsor_name").value;
    var sponsor_job = document.getElementById("sponsor_job").value;
    var sponsor_phone = document.getElementById("sponsor_phone").value;
    var sponsor_add = document.getElementById("sponsor_add").value;
    
if (firstname != "") {
if (othername != "") {
if (lastname != "") {
if (gender != "") {
if (dateofbirth != "") {
if (marital != "") {
if (country_origin != "") {
if (state_origin != "") {
if (lga_origin != "") {
if (app_email != "" && /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(app_email)) {
if (app_phonenumber != "" && app_phonenumber.length == 11) {
if (country_res != "") {
if (state_res != "") {
if (lga_res != "") {
if (landmark != "") {
if (fulladdress != "") {
if (town != "") {

if (entrymode != "") {
if (course != "") {
if (numssce != "") {
if (examyear1 != "") {
if (examnum1 != "") {
if (examtype1 != "") {

if (examyear2 != "" && numssce == 2) {
if (examnum2 != "" && numssce == 2) {
if (examtype2 != "" && numssce == 2) {
if (subject1 != "") {
if (grade1 != "") {
if (subject2 != "") {
if (grade2 != "") {
if (subject3 != "") {
if (grade3 != "") {
if (subject4 != "") {
if (grade4 != "") {
if (subject5 != "") {
if (grade5 != "") {
if (subject6 != "") {
if (grade6 != "") {
if (last_inst != "") {
if (last_year != "") {
if (last_credential != "") {
if (kin_name != "") {
if (kin_relate != "") {
if (kin_phone != "" && kin_phone.length == 11) {
if (kin_add != "") {
if (sponsor_name != "") {
if (sponsor_job != ""){
if (sponsor_phone != "" && sponsor_phone.length == 11) {
if (sponsor_add != "") {


   
   
    $.ajax({
        url:'../backend/forma.php',
        method:'POST',
        data:{
           
            firstname:firstname,
            othername:othername,
            lastname:lastname,
            gender:gender,
            dateofbirth:dateofbirth,
            marital:marital,
            country_origin:country_origin,
            state_origin:state_origin,
            lga_origin:lga_origin,
            app_email:app_email,
            app_phonenumber:app_phonenumber,
            country_res:country_res,
            state_res:state_res,
            lga_res:lga_res,
            landmark:landmark,
            fulladdress:fulladdress,
            town:town,
            course:course,
            entrymode:entrymode,
            numssce:numssce,
            examnum1:examnum1,
            examtype1:examtype1,
            examyear1:examyear1,
            examyear2:examyear2,
            examnum2:examnum2,
            examtype2:examtype2,
            subject1:subject1,
            grade1:grade1,
            subject2:subject2,
            grade2:grade2,
            subject3:subject3,
            grade3:grade3,
            subject4:subject4,
            grade4:grade4,
            subject5:subject5,
            grade5:grade5,
            subject6:subject6,
            grade6:grade6,
            last_inst:last_inst,
            last_year:last_year,
            last_credential:last_credential,
            kin_name:kin_name,
            kin_relate:kin_relate,
            kin_phone:kin_phone,
            kin_add:kin_add,
            sponsor_name:sponsor_name,
            sponsor_job:sponsor_job,
            sponsor_phone:sponsor_phone,
            sponsor_add:sponsor_add
            
        },
       success:function(data){
        if (data.includes("Success")) {
            window.location='printform.php'
            $("#feedback").html(data);
        }
        else{
            $("#feedback").html(data);
        }
       
          
       }
    });


}
else{
    alert("Sponsor Address is required");
}
}
else{
    alert(" Valid Sponsor Phone number is required");
}
}
else{
    alert("Sponsor Occupation is required");
}
}
else{
    alert("Sponsor Fullname is required");
}
}
else{
    alert("Next of Kin Full address is required");
}
}
else{
    alert("Valid Next of Kin Phone number is required");
}
}
else{
    alert("Relationship with Next of Kin is required");
}
}
else{
    alert(" Fullname of Next of Kin is required");
}
}
else{
    alert("Credential Obtained from Last Institution is required");
}
}
else{
    alert("Year Last Institution Attended is required");
}
}
else{
    alert("Name of Last Institution is required");
}
}
else{
    alert("Select Grade for Subject 6 ");
}
}
else{
    alert("Select Subject 6 ");
}
}
else{
    alert("Select Grade for Subject 5 ");
}
}
else{
    alert("Select Subject 5 ");
}

}
else{
    alert("Select Grade for Subject 4 ");
}
}
else{
    alert("Select Subject 4 ");
}
}
else{
    alert("Select Grade for Subject 3 ");
}
}
else{
    alert("Select Subject 3 ");
}
}
else{
    alert("Select Grade for Subject 2 ");
}
}
else{
    alert("Select Subject 2 ");
}
}
else{
    alert("Select Grade for Subject 1 ");
}
}
else{
    alert("Select Subject 1 ");
}
}
else{
    alert("Select Examination Type for 2nd Sitting ");
}
}
else{
    alert("Enter Examination Registration Number for 2nd Sitting ");
}
}
else{
    alert("Select Examination Year for 2nd Sitting ");
}
}
else{
    alert("Select Examination type for O level ");
}
}
else{
    alert("Enter Examination Registration Number for O level ");
}
}
else{
    alert("Select Examination year for O level");
}
}
else{
    alert("Select Number of O Level Results");
}
}
else{
    alert("Select Prospective Course of Study");
}
}
else{
    alert("Select Preferred Entry Mode");
}
}
else{
    alert("Enter Town of Residence");
}
}
else{
    alert("Enter Full address of Residence");
}
}
else{
    alert("Enter Nearest Bus stop or Landmark to place of Residence");
}

}
else{
    alert("Select Local Government Area of Residence");
}
}
else{
    alert("Select State of Residence");
}
}
else{
    alert("Select Country of Residence");
}
}
else{
    alert("Enter Applicant Valid Phone number");
}

}
else{
    alert("Enter Applicant Valid Email address");
}
}
else{
    alert("Select Local Government Area of Origin");
}
}
else{
    alert("Select State of Origin");
}
}
else{
    alert("Select Nationality");
}
}
else{
    alert("Select Marital Status");
}

}
else{
    alert("Enter Valid Date of Birth");
}
}
else{
    alert("Select Gender");
}
}
else{
    alert("Enter Applicant Last name");
}
}
else{
    alert("Enter Applicant Other name");
}
}
else{
    alert("Enter Applicant First name");
}

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