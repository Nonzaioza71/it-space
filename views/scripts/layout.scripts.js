const layoutScripts = (props) =>{
    return new LayoutScripts(props).scripts()[props.func]()
}
class LayoutScripts{
    constructor(props) {
        this.state = {
            props : props
        }
    }

    async #Route(){
        const loadingScreen = this.state.props.loadingScreen ? this.state.props.loadingScreen : false
        const path = this.state.props.path
        const target = this.state.props.target

        if (loadingScreen.start) {
            await loadingScreen.start()
        }

        const element = await fetch(path).then(res=>{ 
            return res.text()  
        })
        const parser = new DOMParser();
        const doc = parser.parseFromString(element, 'text/html');
        const globalScript = doc.body.children
        const regexp = /<script>/g;
        target.innerHTML = element
        target.querySelectorAll('script').forEach(scr => {
            const new_script = document.createElement('script')
            new_script.innerHTML = scr.innerHTML
            scr.replaceWith(new_script)
        })
        if (loadingScreen.end) {
            setTimeout(() => {
                loadingScreen.end()
            }, 1)
        }
    }

    #Link(){
        const data = this.state.props.link.data ? this.state.props.link.data : ''
        const title = this.state.props.link.title ? this.state.props.link.title : ''
        const url = this.state.props.link.url ? this.state.props.link.url : ''
        window.history.pushState(data, title, url)
    }

    scripts(){
        return {
            Route : ()=>this.#Route(),
            Link: ()=>this.#Link(),
        }
    }
}

async function loadLayout() {
    let target = document.querySelector('#navBar')
    let path = new ClassGLOBAL().API.URL+'/views/layouts/navbar.inc.php'
    layoutScripts({
        path: path,
        target: target,
        func: 'Route'
    })[0]
    target = document.querySelector('#sideBar')
    path = new ClassGLOBAL().API.URL+'/views/layouts/sidebar.inc.php'
    layoutScripts({
        path: path,
        target: target,
        func: 'Route'
    })[0]
}
