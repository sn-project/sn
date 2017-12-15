$(function(){
    let tbody=$('tbody');
    $.ajax({
        url:'/sv/index.php/Article/show',
        dataType:'json',
        method:'post',
        success:function(data){
            render(data);
        }
    })
    //查询
    ////////////////////////////////////////////////////////////////////////////////
    function render(data){
        console.log(data)
        let str='';
        data.forEach(v=>{
            str+=`
             
                <tr id="${v['id']}">
                      <td type="id">
                      <input type="text" value="${v['id']}" disabled style="width: 40px"></td>      
                      <td type="name">
                        <input type="text" value="${v['name']}"style="width: 60px"></td>
                      <td type="nameE">
                        <input type="text" value="${v['nameE']}"></td>
                      <td type="title">
                        <input type="text" value="${v['title']}"></td>
                      <td type="titleE">
                       <input type="text" value="${v['titleE']}"></td>        
                      <td type="content">
                      <input type="text" value="${v['content']}" style="width: 70px">
                        </td>
                        <td type="contentE">
                      <input type="text" value="${v['contentE']}" style="width: 70px">
                        </td>
                      <td type="thumb">
                            <img  src="${v['thumb']}" style="width: 100px;height: 80px">
                       </td>
                       <td type="time">
                           <input type="text" value="${v['time']}" disabled style="width: 120px">
                       </td>
                       <td type="num">
                           <input type="text" value="${v['num']}" disabled style="width: 70px">
                       </td>
                       <td type="pid">
                           <input type="text" value="${v['pid']}"  style="width: 50px">
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
        let id=$(this).closest('tr').attr('id');
        $.ajax({
            url:'/sv/index.php/Article/del',
            data:{id},
            success:function(data){
                if(data == 'ok'){
                    $(this).closest('tr').remove();
                    location.href='/sn/index.php/Article/index';
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
            url:'/sn/index.php/Article/update',
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