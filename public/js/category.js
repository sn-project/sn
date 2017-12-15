$(function(){
    let tbody=$('tbody');

    $.ajax({
        url:'/sn/index.php/category/show',
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
                <tr id="${v['cid']}">
                      <td type="cid">
                      <input type="text" value="${v['cid']}" disabled style="width:                               70px"></td>      
                      <td type="cname">
<input type="text" value="${v['cname']}"></td> 
                        <td type="cnameEn">
                        <input type="text" value="${v['cnameEn']}"></td>   
                      <td type="pid">
                      <input type="text" value="${v['pid']}" style="width: 70px">
</td>
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
            url:'/sn/index.php/category/del',
            data:{cid},
            success:function(data){
                if(data == 'ok'){
                    $(this).closest('tr').remove();
                    location.href='/sn/index.php/category/index';
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
            url:'/sn/index.php/category/update',
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