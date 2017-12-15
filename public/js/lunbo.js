$(function(){
    let tbody=$('tbody');
    $.ajax({
        url:'/sn/index.php/Article/showlunbo',
        dataType:'json',
        method:'post',
        success:function(data){
            render(data);
        }
    })
    //查询
    ////////////////////////////////////////////////////////////////////////////////
    function render(data){
        let str='';
        data.forEach(v=>{
            str+=`
             
                <tr id="${v['lid']}">
                      <td type="lid">
                      <input type="text" value="${v['lid']}" disabled style="width: 70px"></td>      
                      <td type="title">
                        <input type="text" value="${v['title']}"></td>
                      <td type="titleE">
                       <input type="text" value="${v['titleE']}"></td>        
                      <td type="thumb">
                            <img  src="${v['thumb']}" style="width: 100px;height: 80px">
                       </td>
                      <td>
                      <div class="button-group">
                        <a class="button border-red del" href="javascript:void(0)"><span class="icon-trash-o"></span> 删除</a>
                      </div>
                      </td>
                    </tr> 
               
                    `;
        });
        tbody.html(str);
    }
    //删除
    ///////////////////////////////////////////////////////////////////////////////////
    tbody.on('click','.del',function(){
        let cid=$(this).closest('tr').attr('id');
        $.ajax({
            url:'/sn/index.php/Article/dellunbo',
            data:{cid},
            success:function(data){
                if(data == 'ok'){
                    $(this).closest('tr').remove();
                    location.href='/sn/index.php/Article/lunbo';
                }else if(data == 'error'){

                }
            }
        })
    })
    //修改
    ////////////////////////////////////////////////////////////////////////////////////////
    tbody.on('blur','input',function(e){
        let value=$(this).val();
        let type=$(this).closest('td').attr('type');
        let id=$(this).closest('tr').attr('id');
        $.ajax({
            url:'/sn/index.php/Article/updatelunbo',
            data:{id:id,type,value},
            success:function(data){
                if(data=='ok'){
                    alert('修改成功');
                }else if(data == 'error'){
                    alert('修改失败');
                }
            }
        })
    })
});