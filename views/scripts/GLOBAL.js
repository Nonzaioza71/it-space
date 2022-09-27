class ClassGLOBAL {
    constructor() {
        this.API = this.#API()
    }
    #API(){
        const url = reScripts(true)
        return {
            URL : url,
            Controller : url+'controllers/',
        }
    }
}

// export default ClassGLOBAL