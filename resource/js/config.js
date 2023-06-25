const URL = "http://www.localhost/cv/";

    

//Send params via Axios
function send(action, params = []){
    axios({
        method:'post',
        url:URL+action,
        data:params,
        responseType: "json"  
    }).then(res =>{
        if(res.data.success == true){
            var msg = $("<p class='success'><i class='fa fa-check'></i> "+ res.data.msg +"</p>");
            $("body").append(msg);
            return true;
        }
        
        console.log(res);
        return false;
    }).catch(res => console.log(res.data.error));
    
    return false;
}

function sendFile(action, data){
    console.log(data);
    axios({
        headers:{
            'Content-Type': 'multipart/form-data'
        },
        method:'post',
        url:URL+action,
        data:data,
        responseType: "json",
          
    }).then(res =>{
        if(res.data.success){
            var msg = $("<p class='success'>"+ res.data.msg +"</p>");
            $("#contenedor-hojas").prepend(msg);
            console.log(res.data.msg);
            return msg;
        }
        alert("Error");
        console.log(res.data);
    }).catch(res => console.log(res.data.error));
}




function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}







