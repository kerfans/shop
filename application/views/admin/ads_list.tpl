{extends file='admin\public.tpl'}
{block name=content}
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <h3 class="panel-heading text-center">广告轮播图</h3>
        
        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <th class="text-center">序号</th>
                <th class="text-center">标题</th>
                <th class="text-center">链接地址</th>
                <th class="text-center">图片</th>
                <th class="text-center">状态</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            {foreach $adinfo as $v}
            <tr >
                <th scope="row" style="line-height: 30px" class="text-center">{$v->num}</th>
                <td style="line-height: 30px" class="text-center">{$v->title}</td>
                <td style="line-height: 30px" class="text-center"><a href="{$v->url}">{$v->url}</a></td>
                <td style="line-height: 30px" class="text-center">{$v->picture}</td>
                {if $v->status eq 1}
                <td style="line-height: 30px" class="text-center">可用</td>
                {else}
                <td style="line-height: 30px" class="text-center">禁用</td>
                {/if}
                <td style="line-height: 30px" class="text-center"><a class="btn btn-sm btn-primary" href="ad_update/{$v->id}">编辑</a>|
                    <a class="btn btn-sm btn-danger del" href="ad_del/{$v->id}">删除</a>
                </td>
            </tr>
            {/foreach}
            </tbody>
        </table>
        <script>
            $(function()
            {
                $('.del').on('click',function(){  
                    var msg = "您真的确定要删除吗？不能恢复！"; 
                    if (confirm(msg)==true){ 
                        return true; 
                    }else{ 
                        return false; 
                    } 
                });            
            });           
        </script>
    </div>
{/block}