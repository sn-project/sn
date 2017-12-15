$(function(){
    let nav=$('.nav');
    $.ajax({
        url:'/sn/index.php/Article/show',
        dataType:'json',
        method:'post',
        success:function(data){
           render(data);
        }
    });
    //查询导航
    ////////////////////////////////////////////////////////////////////////////////
    function render(data){
        $('.des1').html(data[0]['nameE']);
        $('.des2').html(data[0]['name']);
        $('.lbottom>span:nth-of-type(1)').html(data[0]['title']);
        $('.lbottom>span:nth-of-type(2)').html(data[0]['titleE']);
        $('.lcenter')
        let str='';
        data[0].forEach((v,i)=>{
            str+=`
                 <img src="images/new1.jpg" alt="">
                    `;
        });
        cname.html(str);
    }
})