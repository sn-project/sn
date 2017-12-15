$(function(){
    let user=$('#user');
    let pass=$('#password');
    let submit=$(':submit');

    //////////////////////////////////正则前台验证数据格式
    ////////////////////////////////////////////////////////////////////////////////////
    //     $('input').on('blur',function(){
    //         let e=$(this);
    //         if(e.attr('data-validate')){
    //             let value=e.val().trim();
    //             let validate=e.attr('data-validate').split(';');
    //             let flag=true;
    //             for(let i=0;i<validate.length;i++){
    //                 let arr=validate[i].split(':');
    //                 if(!validateType(value,arr[0])){
    //                     $(this).next('.form-help').remove();
    //                     $('<div>').addClass('form-help').insertAfter(this).text(arr[1]);
    //                     flag=false;
    //                     break;
    //                 }
    //             }
    //             if(flag){
    //                 $(this).next('.form-help').remove();
    //             }
    //         }
    //     });
    //
    //     function validateType(value,type){
    //             switch(type){
    //                 case 'require':return !!value.length;break;
    //                 case 'username':return /^[a-zA-Z]{3,10}$/.test(value);break;
    //                 case 'password':return /^\w{5,10}$/.test(value);break;
    //             }
    //     }
    ////////////////////////////////登录
        /////////////////////////////////////////////////////////////////////////////////////
        submit.on('click',function(){
            $('input').trigger('blur');//触发事件
            if($('form .form-help').length) {
                return;
            }
        let data={user:user.val(),password:pass.val()};
        $.ajax({
            url:'/sn/index.php/login/check',
            data:data,
            success:function(data){
                if(data=='ok'){
                    location.href='/sn/index.php/main/index';
                }else if(data=='error'){
                    alert('fail');
                }
            }
        });
        return false;
    })
});