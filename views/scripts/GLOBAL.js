class ClassGLOBAL {
    constructor() {
        this.API = this.#API()
    }
    #API(){
        const url = "http://localhost/it-space/"
        return {
            URL : url,
            Controller : url+'controllers/',
        }
    }
}

// export default ClassGLOBAL