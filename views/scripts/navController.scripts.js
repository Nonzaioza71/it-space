const navControllers = (props) =>{
    // console.log(props)
    return new NavControllers(props).scripts()[props.func]()
}
class NavControllers{
    constructor(props) {
        this.state = {
            props : props
        }
        this.#authResponSize()
        // console.log(this.state.props)
    }

    #authResponSize(){
        try{
            const _html = document.querySelector('#navAuth')
            const user = typeof useState.use('user') === 'object' ? useState.use('user') : {}
            const oldSize = parseInt(Boolean(useState.use('winSize')) ? useState.use('winSize') : 0)
            const newSize = window.innerWidth
            if ((Object.keys(user).length) && (newSize != oldSize)) {
                useState.setState({winSize : newSize})
                _html.innerHTML = /*html*/`
                    <div class="d-flex gap-2">
                        <span 
                            id="navbarAccount"
                            onClick="document.querySelector('#sidebarAccount').click()"
                            style="cursor:pointer;"
                        >
                            ${  
                                window.innerWidth >= 600
                                ? useState.use('user').user_name + " " + useState.use('user').user_lastname
                                : '<span class="iconify fs-2" data-icon="fa:user-circle-o" style="vertical-align: top;"></span>'
                            }
                        </span>
                    </div>
                `
            }
        }catch(e){
        }
    }

    #themeToggle() {
        // console.log(this.state.props)
        let _toggle = this.state.props.defTheme ? Boolean(JSON.parse(window.localStorage.getItem('isTheme'))) : !Boolean(JSON.parse(window.localStorage.getItem('isTheme')))
        window.localStorage.setItem('isTheme', JSON.stringify(_toggle))
        document.querySelectorAll('.is-theme').forEach(ele=>{
        if (_toggle) {
                if (ele.classList.contains('bg-dark')) {
                    ele.classList.remove('bg-dark')
                    ele.classList.add('bg-whitesmoke')
                }
                if (ele.classList.contains('text-light')) {
                    ele.classList.remove('text-light')
                    ele.classList.add('text-dark')
                }
                if (ele.classList.contains('table-dark')) {
                    ele.classList.remove('table-dark')
                    ele.classList.add('table-light')
                }
                if (ele.classList.contains('btn-dark')) {
                    ele.classList.remove('btn-dark')
                    ele.classList.add('btn-light')
                }
                if (ele.classList.contains('btn-outline-light')) {
                    ele.classList.remove('btn-outline-light')
                    ele.classList.add('btn-outline-dark')
                }
                if (ele.classList.contains('border-secondary')) {
                    ele.classList.remove('border-secondary')
                    ele.classList.add('border-dark')
                }
                document.querySelector('body').style.backgroundColor = '#ffffff'
            } else {
                if (ele.classList.contains('bg-whitesmoke')) {
                    ele.classList.remove('bg-whitesmoke')
                    ele.classList.add('bg-dark')
                }
                if (ele.classList.contains('text-dark')) {
                    ele.classList.remove('text-dark')
                    ele.classList.add('text-light')
                }
                if (ele.classList.contains('table-light')) {
                    ele.classList.remove('table-light')
                    ele.classList.add('table-dark')
                }
                if (ele.classList.contains('btn-light')) {
                    ele.classList.remove('btn-light')
                    ele.classList.add('btn-dark')
                }
                if (ele.classList.contains('btn-outline-dark')) {
                    ele.classList.remove('btn-outline-dark')
                    ele.classList.add('btn-outline-light')
                }
                if (ele.classList.contains('border-dark')) {
                    ele.classList.remove('border-dark')
                    ele.classList.add('border-secondary')
                }
                document.querySelector('body').style.backgroundColor = '#424242'
            }
        })
    }
    #sidebarToggle() {
        // console.log(this.state.props)
        let _toggle = !JSON.parse(this.state.props.ele.getAttribute('is'))
        document.querySelectorAll('.mySidebar').forEach(ele=>{
        if (_toggle) {
                ele.classList.remove('animate__slideInLeft')
                ele.classList.add('animate__slideOutLeft')
            } else {
                ele.classList.remove('animate__slideOutLeft')
                ele.classList.add('animate__slideInLeft')
            }
        })
        this.state.props.ele.setAttribute('is', _toggle)
    }

    scripts(){
        return {
            themeToggle : ()=>this.#themeToggle(),
            sidebarToggle : ()=>this.#sidebarToggle(),
        }
    }
}

function loadTheme() {
    navControllers({defTheme: true, func:'themeToggle'})
    setTimeout(loadTheme, 1)
}