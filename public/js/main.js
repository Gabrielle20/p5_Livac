// let deleteConfirmationButton = document.querySelectorAll('#delete');
// function alertDelete() {
//     let confirmation = alert('Êtes-vous sûr(e) de vouloir supprimer cet élément ?');
// }

// deleteConfirmationButton.onclick = function() {
//     alertDelete();
// }


// const openPopup = document.querySelectorAll('#delete')

// openPopup.forEach(a => {
//     a.addEventListener('click', ()=> {
//         const modal = document.querySelector(#delete)
//         openPopup(popup)
//     })
// })

// function openPopup(popup) {
//     if(popup == null) returnpopup.classList.add('active')

// }



//SESSION STORAGE
let mybutton = document.querySelector('button#login');
// console.log(mybutton);

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