<?php
    $path = dirname(__FILE__);
    $category = $_GET['select'];
    $page = $path.'/'.$category.'/views/index.inc.php';
    
    if (file_exists($page)) {
        require_once($page);
    } else {
        echo "<script>
            Swal.fire(
                'เกิดข้อผิดพลาด',
                'ขออภัย ไม่พบหน้าเพจคุณตามหา',
                'error'
            )
            .then(()=>{
                layoutScripts({
                    link : {
                        url : './'
                    },
                    func: 'Link'
                })[0]
            })
        </script>";
    }