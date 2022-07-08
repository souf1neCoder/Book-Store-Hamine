const formsQnt = document.querySelectorAll(".qntCtr")
const totalDom = document.querySelector(".total");
formsQnt.forEach((form)=>{
  form.addEventListener("submit",(e)=>{
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "controllers/QuantityController.php");
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          if(form.qntOpr.value === "inc"){

            form.nextElementSibling.innerText = data;
          }else{
            form.previousElementSibling.innerText = data;

          }
          updateTotal();
          console.log(data);
        }
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
    
  })
})

// 
function updateTotal(){
  let xhr = new XMLHttpRequest();
    xhr.open("POST", "controllers/TotalCheckController.php");
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
         
          
          totalDom.innerText = data
        }
      }
    };
    
    xhr.send();
}
