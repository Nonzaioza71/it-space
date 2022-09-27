class SplashScreen {
    constructor() {
        
    }

    close(){
        // console.log('closeSplash');
        setTimeout(() => {
            document.querySelector('#splashScreen').classList.add('animate__animated')
            document.querySelector('#splashScreen').classList.add('animate__slideOutRight')
            document.querySelector('#splashScreen').classList.add('animate__slow')
            setTimeout(() => {
                document.querySelector('body').classList.remove('overflow-hidden')
                document.querySelector('#splashScreen').remove()
            }, 2000)
        }, 5000);
    }

    show(){
        try {
            const strHTML = /*html*/`
                <div 
                    id="splashScreen"
                    class="
                        position-absolute
                        top-0
                        start-0
                        h-100
                        w-100
                        shadow
                        ${
                            JSON.parse(window.localStorage.getItem('isTheme'))
                                ? 'bg-light'
                                : 'bg-dark'
                        }
                    "
                    style="
                        z-index:100000;
                        justify-content:center; 
                        vertical-align:middle; 
                        display:flex; 
                    "
                >
                    <div
                        class="
                            animate__animated
                            animate__fadeInRight
                            align-self-center
                            animate__delay-1s
                            d-flex
                        "
                    >   
                        <div>
                            <img src="./templates/images/downloads/icon-bg.png" height=128 width=128 class="rounded me-3">
                        </div>
                        <div
                            class="
                                align-self-center
                            "
                        >
                            <span
                                class="
                                    ${
                                        JSON.parse(window.localStorage.getItem('isTheme'))
                                            ? 'text-dark'
                                            : 'text-light'
                                    }
                                    fs-4
                                    fw-bold
                                    animate__animated
                                    animate__fadeInLeftBig
                                    animate__delay-3s
                                "
                            >
                                IT Space, The base of IT shop.
                            </span>
                            <p
                                class="
                                    ${
                                        JSON.parse(window.localStorage.getItem('isTheme'))
                                            ? 'text-dark'
                                            : 'text-light'
                                    }
                                    animate__animated
                                    animate__fadeInDown
                                    animate__delay-4s
                                "
                            >
                                By Miss Jiranan K.
                            </p>
                        </div>
                    </div>
                </div>
            `
            let render = document.createElement('div')
            render.innerHTML = strHTML
            document.querySelector('body').classList.add('overflow-hidden')
            document.querySelector('body').append(render.children[0])
        } catch (e) {
            setTimeout(this.show, 1)
        }
        
    }
}
window.addEventListener('load', ()=>{
    new SplashScreen().show()
})