const formsCart = document.querySelectorAll(".formCart");
  const countNav = document.getElementById("cart_books");


formsCart.forEach((form)=>{
  form.addEventListener("submit",(e)=>{
    e.preventDefault();
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "controllers/AddToCartController.php");
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          console.log(data);
         if(data === "done"){
          form.querySelector("button").disabled = true;
          form.querySelector("button").innerHTML = "Déja au Panier"
           
          countNav.innerText = parseInt(countNav.innerText) + 1;
         }

        }
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
    
  })
})

