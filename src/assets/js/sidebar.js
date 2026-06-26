const sidebar = document.getElementById("sidebar");
const content = document.getElementById("content");
const icon = document.getElementById("iconMenu");
const btn = document.getElementById("toggleSidebar");

// estado inicial correto (sidebar começa ABERTO)
let isOpen = true;

// garante sincronização ao carregar página
icon.innerHTML = "☰";

btn.addEventListener("click", function () {

    isOpen = !isOpen;

    sidebar.classList.toggle("closed");
    content.classList.toggle("expanded");

    icon.innerHTML = isOpen ? "☰" : "✖";
});