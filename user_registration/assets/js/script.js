document.getElementsByName('role').forEach(radio=>{
    if(radio.checked){
        console.log(radio.value);
    }
});