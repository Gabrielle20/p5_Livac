// const myHeading = document.querySelector('h2');
// myHeading.textContent = 'Hello World!';

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if(!event.target.matches('.dropdown-toggle')) {
        var dropdowns = document.getElementsByClassName("dropdown-menu");
        var i;
        for(i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}



document.querySelectorAll("a.btn-danger").onclick = function() {
    alert('Voulez-vous vraiment supprimer cet article ?');
}

let mybutton = document.querySelector('button#login');
console.log(mybutton);

function setUserName() {
    let myName = prompt('Please enter your name.');
    localStorage.setItem('name', myName);

    if(!localStorage.getItem('name')) {
        setUserName();
    }

    else {
        let storedName = localStorage.getItem('name');
    }
}


mybutton.onclick = function() {
    setUserName();
}