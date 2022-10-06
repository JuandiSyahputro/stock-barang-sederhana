/*!
 * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2022 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

const outlet = document.querySelectorAll(".tombol");

const textBaru = sessionStorage.getItem("teksBaru");

if (textBaru) {
    // Retrieve
    document.querySelector(".king").innerHTML = textBaru;
}

outlet.forEach(function(toko) {
    toko.addEventListener("click", function() {
        // cek browser support
        if (typeof Storage !== "undefined") {
            // Store
            sessionStorage.setItem("teksBaru", this.innerText);
            document.querySelector(".king").innerHTML = this.innerText;
        } else {
            document.querySelector(".king").innerHTML =
                "Maaf browser anda tidak mendukung Penyimpanan Web!";
        }

        // const ul = document.querySelector(".king");
        // localStorage.setItem("teksBaru", this.innerText);

        //         // ul.innerHTML = localStorage.getItem("teksBaru");
    });
});