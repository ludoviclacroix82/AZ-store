const inputElem = document.querySelector('#website')
const btnSubmit = document.querySelector('button[type="submit"]')
const myForm = document.querySelector('#myForm')

btnSubmit.addEventListener('click', event => {
    console.log(inputElem.value)
    if (inputElem.value.length > 0) {
        event.preventDefault();
    } else {
        myForm.submit(); 
    }
})







