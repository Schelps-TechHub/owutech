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