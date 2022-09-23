<script>
if (Boolean(window['loginModal'])) {
    var loginModal = undefined
}
loginModal = (alert) =>{
    let openAgain = false
    let msg = ""
    function render(){
        Swal.fire({
            imageUrl: './templates/images/downloads/icon-bg.png',
            imageWidth: 200,
            imageHeight: 200,
            title: /*html*/`<strong>เข้าสู่ระบบ</strong>`,
            html: /*html*/`
                <div style="overflow:hidden;">
                    <div class="w-100" style="text-align: -webkit-center;">
                        <input 
                            type="text" 
                            id="username" 
                            class="form-control w-75 fw-bold"
                            onChange="
                                useState.setState({
                                    login : {
                                        username : this.value
                                    }
                                })
                            "
                            onKeydown="
                                useState.setState({
                                    login : {
                                        username : this.value
                                    }
                                })
                            "
                            useState="login.username" 
                            onKeypress="if(event.key == 'Enter'){document.querySelector('.swal2-confirm').click()}"
                        />
                    </div>
                    <div class="w-100" style="text-align: -webkit-center;">
                        <input 
                            type="password" 
                            id="username" 
                            class="form-control w-75 fw-bold"
                            onChange="
                                useState.setState({
                                    login : {
                                        password : this.value
                                    }
                                })
                            "
                            onKeydown="
                                useState.setState({
                                    login : {
                                        password : this.value
                                    }
                                })
                            "
                            onKeypress="if(event.key == 'Enter'){document.querySelector('.swal2-confirm').click()}"
                        />
                    </div>
                    ${
                        alert ? 
                            '<hr/><span class="text-danger">'+alert+'</span>' 
                        : 
                            ""
                    }
                </div>
            `,
            customClass: {
                popup: 'bg-whitesmoke text-dark border is-theme',
                image: 'rounded'
            },
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: 'เข้าสู่ระบบ',
            cancelButtonText: 'ปิด',
        })
        .then(async (res)=>{
            if (res.isConfirmed) {
                startLoad()
                await fetch('./controllers/checkLogin.php',{
                    method : 'POST',
                    body : JSON.stringify(useState.use('login'))
                })
                .then(res=>res.json())
                .then(data=>{
                    console.log(data.input)
                    const _html = document.querySelector('#navAuth')
                    if (data.res) {
                        Swal.fire(
                            'ยินดีต้อนรับ',
                            'คุณ '+data.res.user_name + " " + data.res.user_lastname,
                            'success'
                        ).then(()=>{
                            _html.innerHTML = /*html*/`
                                <span 
                                    id="navbarAccount"
                                    class="animate__animated animate__fadeInRight"
                                    onClick="document.querySelector('#sidebarAccount').click()"
                                    style="cursor:pointer;"
                                >
                                    ${data.res.user_name + " " + data.res.user_lastname}
                                </span>
                            `
                            useState.setState({
                                user: data.res
                            })
                            loadPage(true, true)
                        })
                    }else{
                        openAgain = true
                        msg = "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง"
                    }
                    endLoad()
                })
            }
            if (openAgain) {
                loginModal(msg)
            } else {
                document.querySelector('#modalScript').innerHTML = ''
                useState.remove('login')
                loginModal = undefined
            }
        })
    }
    return render()
}
loginModal()

</script>