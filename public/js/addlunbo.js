$(function(){
    let tbody=$('tbody');
    //添加
    ///////////////////////////////////////////////////////////////////////////////
    let submit=$(':submit');
    submit.on('click',function(){
        let data=$('form').serialize();
        console.log(data);
        $.ajax({
            url:'/sn/index.php/Article/insertlunbo',
            data:data,
            method:'post',
            success:function(data) {
                console.log(data)
                if (data == 'ok') {
                    location.href='/sn/index.php/Article/lunbo';
                } else if (data == 'error') {
                }
            }
        })
    });
    //上传图片
    ////////////////////////////////////////////////////////////////////////////////////////
    let upload = document.querySelector('#image');
    let sthumb = document.querySelector('#thumb');
    let hidden=document.querySelector('input[type=hidden]');
    let imgType=['png','gif','jpg','jpeg'];
    let size=5*1024*1024;
    upload.onchange = function () {
        //特殊字符，打包为一个数组
        [...this.files].forEach((element,index)=>{

            let eType=element.type.split('/')[1];
            if(!(element.size<=size&&imgType.includes(eType))){
                alert('请检查文件类型和大小');
                return;
            }
            let reader = new FileReader();
            reader.readAsDataURL(element);
            reader.onload = function (e) {
                let imgs=new Image();
                imgs.width=80;
                imgs.height=80;

                imgs.src = e.target.result;

                let imgbox=document.querySelector('.imgbox');
                imgbox.appendChild(imgs);
            };
            let formdata = new FormData();
            formdata.append('file',element);
            let xml = new XMLHttpRequest();
            xml.upload.onprogress=function(e){
                document.querySelectorAll('.progress-bar')[index].style.width=`${e.loaded/e.total*100}%`;};
            xml.onload=function () {
                hidden.value+=xml.response;
            };
            xml.open('post','/sn/index.php/Article/upload',true);
            xml.send(formdata);

        })

    }
});