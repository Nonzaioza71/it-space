<nav class="navbar bg-whitesmoke" style="visibility: hidden;"  id="myNavbarHitBox">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
        </a>
    </div>
</nav>

<nav class="navbar bg-whitesmoke text-dark fixed-top is-theme animate__animated" id="myNavbar">
    <div class="container d-flex justify-content-between">
        <div class="justify-content-start d-flex gap-3">
            <div
                is="true"
                class="
                    is-theme
                    btn
                    btn-light
                    border
                    border-dark
                    bg-whitesmoke
                    text-dark
                "
                onclick="navControllers({ele:this, func:'sidebarToggle'})"
            >
                <span class="iconify" data-icon="ic:round-table-rows" style="width: 3rem;"></span>
            </div>
            <a class="navbar-brand" href="./" style="visibility:hidden;">
                <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
            </a>
        </div>
        <div 
            class="
                d-flex
                justify-content-end
                gap-3
            "
        >   
        <div id="navbarSup" class="d-flex gap-3 align-self-center"></div>
        <div 
            id="navAuth"
            class="
                d-flex
                justify-content-center
                align-items-center
                align-self-center
            "
        >
            <span 
                id="navbarAuth"
                class="animate__animated animate__fadeInRight"
                onclick="
                    layoutScripts({
                        path: './components/modals/Auth/login-modal.inc.php',
                        target: document.querySelector('#modalScript'),
                        loadingScreen: {
                            start : ()=>{showLoading = true},
                            end : ()=>showLoading = false,
                        },
                        func: 'Route'
                    })[0]
                "
                style="cursor:pointer;"
            >
                เข้าสู่ระบบ/ลงทะเบียน
            </span>
        </div>
            <div
                is="true"
                class="
                    is-theme
                    btn 
                    btn-light
                    border
                    border-dark
                    bg-whitesmoke
                    text-dark
                "
                onclick="navControllers({ele:this, func:'themeToggle'})"
            >
                <span class="iconify" data-icon="fluent:dark-theme-20-filled"></span>
            </div>
        </div>
    </div>
</nav>
<script>
    loopCheck()

    async function checkLoginNav(Alert = true) {
        const _html = document.querySelector('#navAuth')
        const _navSup = document.querySelector('#navbarSup')
        fetch('./controllers/checkLogin.php')
        .then(res=>res.json())
        .then(data=>{
            const user = typeof useState.use('user') === 'object' ? useState.use('user') : {}
            if ((data.res) && !(Object.keys(user).length)) {
                _navSup.innerHTML = /*html*/`
                    ${
                        data.res
                        ? '<span id="navNoti" class="iconify fs-2" style="cursor: pointer;" data-icon="clarity:notification-outline-badged"></span>'
                        : '<span id="navNoti" class="iconify fs-2" style="cursor: pointer;" data-icon="clarity:notification-line"></span>'
                    }
                    ${
                        data.res
                        ? '<span id="navCart" class="iconify fs-2" style="cursor: pointer;" data-icon="clarity:shopping-cart-outline-badged"></span>'
                        : '<span id="navCart" class="iconify fs-2" style="cursor: pointer;" data-icon="clarity:shopping-cart-line"></span>'
                    }
                `
                _html.innerHTML = /*html*/`
                    <div class="d-flex gap-2">
                        <span 
                            id="navbarAccount"
                            class="animate__animated animate__fadeInRight"
                            onClick="document.querySelector('#sidebarAccount').click()"
                            style="cursor:pointer;"
                        >
                            ${  
                                window.innerWidth >= 600
                                ? data.res.user_name + " " + data.res.user_lastname
                                : '<span class="iconify fs-2" data-icon="fa:user-circle-o" style="vertical-align: top;"></span>'
                            }
                        </span>
                    </div>
                `
                useState.setState({
                    user: data.res
                })
            }
            else if(!(data.res) && Object.keys(user).length){
                if (Boolean(Alert)) {
                    Swal.fire(
                        'แจ้งเตือน',
                        'เซสชั่นหมดอายุ',
                        'warning'
                    )
                    // layoutScripts({
                    //     link : {
                    //         url : './'
                    //     },
                    //     func : 'Link'
                    // })
                }
                _htmlNoUser()
            }
            if ((data.res != user) && (data.res)) {
                useState.setState({
                    user: data.res
                })
            }
        })
    }
    function loopCheck() {
        checkLoginNav(false)
        setTimeout(loopCheck, 5000)
    }
    async function _htmlNoUser() {
        await fetch(new ClassGLOBAL().API.URL+'/controllers/logoutUser.php')
        useState.remove('user')
        const _html = document.querySelector('#navAuth')
        const _navSup = document.querySelector('#navbarSup')
        _navSup.innerHTML = ''
        _html.innerHTML = /*html*/`
            <span 
                id="navbarAuth"
                class="animate__animated animate__fadeInRight"
                onclick="
                    layoutScripts({
                        path: new ClassGLOBAL().API.URL+'/components/modals/Auth/login-modal.inc.php',
                        target: document.querySelector('#modalScript'),
                        loadingScreen: {
                            start : ()=>{showLoading = true},
                            end : ()=>showLoading = false,
                        },
                        func: 'Route'
                    })[0]
                "
                style="cursor:pointer;"
            >
                เข้าสู่ระบบ/ลงทะเบียน
            </span>
        `
        loadPage(true, true)
    }
</script>