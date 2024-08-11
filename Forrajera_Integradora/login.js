document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginform");
    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();  // Evita que el formulario se envíe normalmente
        
        const usuario = loginForm.usuario.value;
        const password = loginForm.password.value;
        
        if (usuario === "Forrajera" && password === "Forrajera") {
            window.location.href = "indexadmin.php";
        } else {
            alert("Credenciales incorrectas");
        }
    });

    const volverLink = document.querySelector(".inferior a");
    volverLink.addEventListener("click", function(event) {
        event.preventDefault();  // Evita que el enlace navegue normalmente
        window.location.href = "index.html";
    });
});
