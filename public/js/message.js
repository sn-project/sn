$(function(){
    let tbody=$('tbody');
    $.ajax({
        url:'/sv/index.php/message/show',
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
             
                <tr id="${v['mid']}">
                      <td>
                      ${v['mid']}</td>      
                      <td>
                        ${v['mname']}</td>
                      <td>
                       ${v['mphone']}</td>        
                     <td>
                       ${v['mes']}</td> 
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
            url:'/sv/index.php/message/del',
            data:{cid},
            success:function(data){
                if(data == 'ok'){
                    $(this).closest('tr').remove();
                    location.href='/sv/index.php/message/index';
                }else if(data == 'error'){

                }
            }
        })
    })
});