function reScripts(getReturn) {
    const host = window.location.host == "localhost"
    ? "http://localhost/it-space/"
    : "https://824f-2405-9800-bc20-512a-30fe-b613-4d5a-3a33.ngrok.io/it-space/"
    const path = host.concat('views/scripts/loadScripts.php')
    fetch(path).then(res=>
        res.json()
    ).then(data=>{
        // console.log(data.checked)
        if(data.checked == "false"){
            alert('โหลด Scripts ล้มเหลว!')
            document.querySelector('body').innerHTML = `
                <h1 style="text-align:center;">
                    <strong>
                        <a href="${host}">โหลดหน้าเว็บใหม่</a>
                    </strong>
                </h1>
            `
        }
    })
    if (getReturn) {
        return host
    }
}
reScripts()