{extends file='admin\public.tpl'}
{block name=content}
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <form method="get" action="" role="form" class="form-inline">

            <div class="panel-heading">兑换商品列表</div>        
            <div class="form-group">
                <label for="pid">商品ID</label>
                <input type="text" placeholder="" style="width: 100px" value="" name="pid" class="form-control">             
            </div>
            <div class="form-group">
                <label for="title">标题</label>
                <input type="text" placeholder="" style="width: 240px" value="" name="title" class="form-control">             
            </div>
            <div class="form-group">
                <label for="class">所属</label>
                <select name="class" id="class" class="form-control" >
                    <option value="0">全部</option>
                    <option value="1">实物</option>
                    <option value="2">虚拟</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">分类</label>
                <select name="type" id="type" class="form-control" style="width: 100px">
                    <option value="0">全部</option>
                    
                </select>
            </div>
            <script>
                $(function(){
                    var cla=$('#class').val();
                    //console.log(cla);
                    var typestr='';
                    if(cla==0)
                    {
                        typestr='<option value="0">全部</option>';
                    }else if(cla==1)
                    {
                        typestr+='<option value="0">全部</option>';
                        {foreach $entitytype as $v}
                            typestr+='<option value="{$v->id}">{$v->name}</option>';
                        {/foreach}
                    }else if(cla==2)
                    {
                        typestr+='<option value="0">全部</option>';
                        {foreach $virtualtype as $v}
                            typestr+='<option value="{$v->id}">{$v->name}</option>';
                        {/foreach}
                    }
                    $('#type').html(typestr);
                })
                $('#class').on('change',function(){
                    var cla=$(this).val();
                    //console.log(cla);
                    var typestr='';
                    if(cla==0)
                    {
                        typestr='<option value="0">全部</option>';
                    }else if(cla==1)
                    {
                        typestr+='<option value="0">全部</option>';
                        {foreach $entitytype as $v}
                            typestr+='<option value="{$v->id}">{$v->name}</option>';
                        {/foreach}
                    }else if(cla==2)
                    {
                        typestr+='<option value="0">全部</option>';
                        {foreach $virtualtype as $v}
                            typestr+='<option value="{$v->id}">{$v->name}</option>';
                        {/foreach}
                    }
                    $('#type').html(typestr);
               });
            </script>
            <div class="form-group">
                <label for="sell">是否上架</label>
                <select name="sell" id="sell" class="form-control">
                    <option value="-1">全部</option>
                    <option value="1">上架</option>
                    <option value="0">下架</option>
                </select>
            </div>
            <div class="form-group">
                <label for="del">是否删除</label>
                <select name="del" class="form-control">
                    <option value="0">未删除</option>
                    <option value="1">已删除</option>
                    <option value="-1">全部</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="cost_points">消耗积分</label>
                <select name="cost_points" id="cost_points" class="form-control order">
                    <option value="default">默认</option>
                    <option value="asc">升序</option>
                    <option value="desc">降序</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sort">权重排序</label>
                <select name="sort" id="sort" class="form-control order">
                    <option value="default">默认</option>
                    <option value="asc">升序</option>
                    <option value="desc">降序</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stock_num">库存量</label>
                <select name="stock_num" id="stock_num" class="form-control order">
                    <option value="default">默认</option>
                    <option value="asc">升序</option>
                    <option value="desc">降序</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sum_num">兑换量</label>
                <select name="sum_num" id="sum_num" class="form-control order">
                    <option value="default">默认</option>
                    <option value="asc">升序</option>
                    <option value="desc">降序</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="atime">添加时间</label>
                <select name="atime" id="atime" class="form-control order">
                    <option value="default">默认</option>
                    <option value="asc">升序</option>
                    <option value="desc">降序</option>
                </select>
            </div>
            <script>
                $('.order').on('change',function(){
                    var ordval=$(this).val();
                    //console.log(ordval);                  
                    if(ordval!='default')
                    {
                        var temp=ordval;
                        $('.order').val('default');
                        $(this).val(temp);
                    }
                });
                
            </script>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="hidden" name="per_page" value="0">
            <button class="btn btn-success" type="submit"> 开 始 搜 索 </button>
            </div>
        </form>


        <!-- Table -->
    <div class="panel panel-default">
        <table class="table">
            <thead>
            <tr>
                <th class="text-center">商品ID</th>
                <th class="text-center">所属</th>
                <th class="text-center">类型</th>
                <th class="text-center">标题</th>
                <th class="text-center">消耗积分</th>
                <th class="text-center">库存量</th>
                <th class="text-center">兑换量</th>
                <th class="text-center">权重</th>
                <th class="text-center">添加时间</th>
                <th class="text-center">新品</th>
                <th class="text-center">热销</th>
                <th class="text-center">上架</th>
                <th class="text-center">删除</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            {if $goodsinfo}
            {foreach $goodsinfo as $v}
            <tr>
                <td scope="row" class="text-center" style="line-height: 30px">{$v->pid}</td>
                {if $v->class eq 1}
                <td class="text-center" style="line-height: 30px">实体</td>
                {elseif $v->class eq 2}
                <td class="text-center" style="line-height: 30px">虚拟</td>
                {/if}
                <td class="text-center" style="line-height: 30px">{$v->name}</td>
                <td class="text-center" style="line-height: 30px">{$v->title}</td>
                <td class="text-center" style="line-height: 30px">{$v->cost_points}</td>
                <td class="text-center" style="line-height: 30px">{$v->stock_num}</td>
                <td class="text-center" style="line-height: 30px">{$v->sum_num}</td>
                <td class="text-center" style="line-height: 30px">{$v->sort}</td>
                <td class="text-center" style="line-height: 30px">{$v->atime|date_format:"%Y-%m-%d %H:%M"}</td>
                <td class="text-center" style="line-height: 30px">
                    {if $v->is_new eq 1}
                    <i class="fa fa-check"></i>
                    {else}
                    <i class="fa fa-times"></i>
                    {/if}
                </td>
                <td class="text-center" style="line-height: 30px">
                    {if $v->is_hot eq 1}
                    <i class="fa fa-check"></i>
                    {else}
                    <i class="fa fa-times"></i>
                    {/if}
                </td>
                <td class="text-center" style="line-height: 30px">
                    {if $v->is_sale eq 1}
                    <i class="fa fa-check"></i>
                    {else}
                    <i class="fa fa-times"></i>
                    {/if}
                </td>
                <td class="text-center" style="line-height: 30px">
                    {if $v->is_del eq 1}
                    <i class="fa fa-check"></i>
                    {else}
                    <i class="fa fa-times"></i>
                    {/if}
                </td>
                <td class="text-center" style="line-height: 30px">
                    <a class="btn btn-sm btn-primary" href="/index.php/admin/showList/editGoods/{$v->id}/{$v->pid}/{$v->tid}/{$v->class}">编辑</a>|
                    <a class="btn btn-sm btn-danger" href="/index.php/admin/showList/delete/{$v->id}">删除</a>
                </td>
            </tr>
            {/foreach}
            {else}
                <td colspan="14" class="text-center">没有匹配结果</td>
            {/if}
            </tbody>
        </table>
        {$page}
    </div>
{/block}