const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const register_btn = document.querySelector(".register");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

function submitData(){

    $(document).ready(function () {
     
      var data = {
        username: $("#username").val(),
        phone: $("#phone").val(),
        email: $("#email").val(),
        password: $("#password").val(),
        action: $("#action").val(),
      };

      $.ajax({
        type: "POST",
        url: "../../App/Controllers/auth/UserController.php",
        data: data,
        success: function (response) {
          alert(response);
          if (response.trim() === "Registered Successfully") {
            container.classList.remove("sign-up-mode");
          }
        },
      });

    });
}



