const globalScripts = (props) =>{
    return new GlobalScripts(props).scripts()[props.func]()
}
class GlobalScripts{
    constructor(props) {
        this.state = {props : props}
    }
    #strToHTML(){
        let str = this.state.props.str
        let parser = new DOMParser();
        let doc = parser.parseFromString(str, 'text/html');
        return doc.body.children
    }
    #_GET(){
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(this.state.props.param);
    }
    scripts(){
        return {
            strToHTML : ()=>this.#strToHTML(),
            _GET : ()=>this.#_GET(),
        }
    }
}