let showLoading = true;
class Loading {
    constructor() {
        this.#isLoading()
    }
    
    #isLoading(){
        // console.log(showLoading);
        showLoading
            ? this.#load()
            : this.#success()
        setTimeout(()=>{
            this.#isLoading()
        }, 10);
    }

    #success(){
        if (Boolean(document.querySelector('#myLoading'))) {
            document.querySelector('#myLoading').remove()
        }
    }

    #load(){
        if (!Boolean(document.querySelector('#myLoading'))) {
            const render =  /*html*/`
                <div
                    id="myLoading"
                    style="
                        position:absolute;
                        height:100%;
                        width:100%;
                        top:0px;
                        z-index: 999999;
                        backdrop-filter: opacity(0.5);
                        background-color: #00000045;
                    "
                    class="animate__animated animate__fadeIn animate__faster"
                >
                    <!-- <div
                        style="
                            position:absolute;
                            top:50%;
                            width:100%;
                            text-align:center;
                            color:#ffffff;
                        "
                    > -->
                    <!-- <h1
                        class="
                            m-0
                        "
                    >
                        Loading...
                    </h1> -->
                    <div
                        style="
                            color:#ffffff70;
                            font-size: 30vh;
                        "
                        class="
                            position-absolute
                            d-flex
                            align-items-center
                            justify-content-center
                            text-center
                            w-100
                            h-100
                            animate__animated
                            animate__flash
                            animate__infinite
                            animate__slow
                        "
                    >
                        <h4
                            class="
                                m-0
                            "
                        >
                            กรุณารอสักครู่
                        </h4>
                    </div>
                    <div
                        style="
                            color:#ffffff70;
                        "
                        class="
                            position-absolute
                            row
                            align-items-center
                            justify-content-center
                            text-center
                            col-12
                            h-100
                        "
                    >
                        <span style="font-size: 45vh;" class="iconify" data-icon="eos-icons:bubble-loading"></span>
                    </div>
                    <!-- </div> -->
                </div>
                `
    
            const toHTML = globalScripts({str:render, func:'strToHTML'})[0]
            try {
                document.querySelector('body').append(toHTML)
            } catch (e) {
                setTimeout(this.#load, 10);
            }
        }
    }
}
new Loading()