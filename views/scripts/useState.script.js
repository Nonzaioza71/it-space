class useStateGlobal{
    #state
    constructor() {
        this.#state = {}
        this.__loop__()
    }
    setState(state){
        const keyState = Object.keys(state)
        const data = this.#state
        keyState.forEach((ks)=>{
            if (typeof state[ks] === 'object') {
                const keyKS = Object.keys(state[ks])
                keyKS.forEach((key_ks)=>{
                    data[ks] 
                        ? Object.assign(data[ks], {[key_ks] : state[ks][key_ks]})
                        : Object.assign(data, {[ks] : state[ks]})
                })
            }else{
                Object.assign(data, {[ks] : state[ks]})
            }
        })
        Object.assign(this.#state, data)
        this.__update__()
    }
    use(key){
        if (key) {
            const res = this.#state[key]
            return res
        }else{
            return this.#state
        }
    }
    remove(key){
        if (key) {
            const res = delete this.#state[key]
            return res
        }else{
            return this.#state = {}
        }
    }

    #autoUseState(){
        const state = this.#state
        const elements = document.querySelectorAll(('[useState]'))
        elements.forEach(ele=>{
            const arrData = ele.getAttribute('useState').split(".")
            let evalStr = "this.#state"
            arrData.forEach((data, index)=>{
                if (index < arrData.length) {
                    evalStr += "."
                }
                evalStr += data
            })

            let data = null
            try {
                data = eval(evalStr)
            } catch (e) {
                data = ""
            }
            ele.value = data
        })
    }

    __update__(){
        this.#autoUseState()
    }
    
    __loop__(){
        setTimeout(() => {
            this.__loop__()
        }, 1);
    }

}

const useState = new useStateGlobal()
// useState.__loop__()