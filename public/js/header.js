$(function(){
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        loop:true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });



    let nav=$('.nav');
    $.ajax({
        url:'/sn/index.php/category/show',
        dataType:'json',
        method:'post',
        success:function(data){
            render(data);
        }
    })
    //查询导航
    ////////////////////////////////////////////////////////////////////////////////
    function render(data){
        let str=`<li><a href="/sn/index.php/home/index">首页</a></li>`;
        data.forEach(v=>{
            str+=`
               <li><a href="/sn/index.php/home/${v['cnameEn']}">${v['cname']}</a></li>
                    `;
        });
        nav.html(str);
    }
    //查询banner
    let swiperwrapper=$('.swiper-wrapper');
    $.ajax({
        url:'/sn/index.php/Article/showlunbo',
        dataType:'json',
        method:'post',
        success:function(data){
            renderbanner(data);
        }
    })
    //查询轮播
    ////////////////////////////////////////////////////////////////////////////////
    function renderbanner(data){
        let str='';
        data.forEach(v=>{
            $('.content>.des').text(v['titleE']);
            str+=`
               <div class="swiper-slide">
                <img src="${v['thumb']}" alt="">
               </div>
                    `;
        });
        swiperwrapper.html(str);
    }
})