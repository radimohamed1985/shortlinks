let makeLinkButton =document.getElementById('makelink');

makeLinkButton.addEventListener('click',function(e){
e.preventDefault();

var token =  document.querySelector('meta[name="csrf-token"]')['content']
const form = document.getElementById("myForm");
const FD = new FormData(form);

let url =document.getElementById('url');
console.log(url.value)


console.log(token);

let req =new XMLHttpRequest();

req.onreadystatechange = function(){
    if(this.readyState ==4 && this.status==200){
        let res =JSON.parse(this.responseText)
        console.log( res[0]);
        console.log( res[1]);
        document.getElementById('lastshortlink').innerHTML=res[0];
        document.getElementById('destination_url').value=res[1];
      
    }
}
req.open('POST',"/makeshortlink");
req.setRequestHeader('X-CSRF-TOKEN', token);

req.send(FD);

})
