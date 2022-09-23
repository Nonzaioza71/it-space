const navControllers = (props) =>{
    // console.log(props)
    return new NavControllers(props).scripts()[props.func]()
}
class NavControllers{
    constructor(props) {
        this.state = {
            props : props
        }
        // console.log(this.state.props)
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
                document.querySelector('body').style.backgroundColor = '#ffffff'
                if (ele.classList.contains('border')) {
                    ele.classList.remove('border-secondary')
                    ele.classList.add('border-dark')
                }
            } else {
                if (ele.classList.contains('bg-whitesmoke')) {
                    ele.classList.remove('bg-whitesmoke')
                    ele.classList.add('bg-dark')
                }
                if (ele.classList.contains('text-dark')) {
                    ele.classList.remove('text-dark')
                    ele.classList.add('text-light')
                }
                document.querySelector('body').style.backgroundColor = '#424242'
                if (ele.classList.contains('border')) {
                    ele.classList.remove('border-dark')
                    ele.classList.add('border-secondary')
                }
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