
import { setItem ,getItem } from "/assets/js/modules/localstorage.js";

export const addItem = () => {
    const items = document.querySelectorAll('.item')

    for (const item of items) {
        const itemBtn = item.querySelector('button')

        itemBtn.addEventListener("click", event => {
            const elemParent = event.target.parentNode
            const spam = elemParent.querySelector('#spam')

            if (spam.value.length > 0) {
                event.preventDefault()
            } else {
                elemParent.submit()
            }
        });
    }
}

export const changeQuantity = () => {
    const cartMiniItem = document.querySelectorAll('.cart-item');

    console.log(cartMiniItem);
    for (const itemArray of cartMiniItem) {

        const toolsContent = itemArray.querySelector('.tools-content')
        const add = toolsContent.querySelector('.add')
        const less = add.querySelector('#less')
        const more = add.querySelector('#more')
        const qt = toolsContent.querySelector('#qt')
        const result = add.querySelector('#result')

        let resultValue = parseInt(result.value)



        less.addEventListener('click', event => {
            event.preventDefault()
            const elemParent = event.target.parentNode
            const from = elemParent.parentNode
            console.log(from);
            if (resultValue > 0 && resultValue < 99) {
                resultValue -= 1
                result.value = resultValue
                qt.value = -1
                from.submit()
            }
        });

        more.addEventListener('click', event => {
            event.preventDefault();
            const form = event.target.closest('form');
            if (resultValue >= 0 && resultValue < 99) {
                resultValue += 1;
                result.value = resultValue;
                qt.value = 1
                if (form) {
                    form.submit();
                }
            }
        });
    }
}

export const openCart = () => {
    const nav = document.querySelector('nav')
    const cartMini = document.querySelector('.cart-mini')
    const btnCart = nav.querySelector('#openCart')
    const closeMiniCart = cartMini.querySelector('#closeMiniCart')

    console.log(cartMini);
    const openCartStorage = getItem('openCart')

    if (openCartStorage === true)
        cartMini.classList.add('open-cart-mini')
    else
        cartMini.classList.remove('open-cart-mini')

    const openCartMiniEvent = () =>{

        if (cartMini.classList.contains('open-cart-mini')) {
            cartMini.classList.remove('open-cart-mini')
            setItem('openCart', false)
        } else {
            cartMini.classList.add('open-cart-mini')
            setItem('openCart', true)
        }
    }    

    btnCart.addEventListener('click', openCartMiniEvent);
    closeMiniCart.addEventListener('click', openCartMiniEvent);
}
