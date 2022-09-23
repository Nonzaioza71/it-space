class usePrivateState{
    #state
    constructor() {
        this.#state = []
    }
    setState(...arg){
        this.#state = [...this.#state, ...arg]
    }
    use(key){
        if (key) {
            const res = {}
            this.#state.forEach(obj => {
                Object.keys(obj).forEach(obj_key=>{
                    if (key == obj_key) {
                        Object.assign(res, obj[obj_key])
                    }
                })
            });
            return res
        }else{
            return this.#state
        }
    }
    remove(key){
        if (key) {
            const res = {}
            this.#state.forEach((obj, index) => {
                Object.keys(obj).forEach(obj_key=>{
                    if (key == obj_key) {
                        this.#state.splice(index, 1)
                    }
                })
            });
            return res
        }else{
            return this.#state = {}
        }
    }
}
export default usePrivate = new usePrivateState()