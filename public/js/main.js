// const myHeading = document.querySelector('h2');
// myHeading.textContent = 'Hello World!';

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