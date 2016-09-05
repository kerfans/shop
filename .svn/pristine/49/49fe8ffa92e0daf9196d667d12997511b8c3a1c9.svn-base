{extends file='admin\public.tpl'}
{block name=content}
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <form method="get" action="http://manager.yaofang.cn/points_goods/goods_list" role="form" class="form-inline">

            <div class="panel-heading">兑换商品列表</div>
            <div class="form-group">
                <label for="name" class="sr-only">名称</label>
                <input type="text" placeholder="请输入产品id" style="width: 120px" value="" name="id" class="form-control">
            </div>
            <select name="goods_status" class="form-control">
                <option value="-1">上下架</option>
                <option value="1">上架</option>
                <option value="0">下架</option>
            </select>
            <select name="goods_points_type" class="form-control">
                <option value="-1">实物或者虚拟</option>
                <option value="1">实物</option>
                <option value="0">虚拟</option>
            </select>
            <select name="goods_views" class="form-control">
                DocumentRoot "D:/manager.yaofang.cn/public"
                ServerName manager.yaofang.cn

                <option value="0">产品浏览量</option>
                <option value="asc">升序</option>
                <option value="desc">降序</option>
            </select>
            <select name="goods_stock" class="form-control">
                <option value="0">库存数量</option>
                <option value="asc">升序</option>
                <option value="desc">降序</option>
            </select>
            <select name="goods_sales" class="form-control">
                <option value="0">销售数量</option>
                <option value="asc">升序</option>
                <option value="desc">降序</option>
            </select>
            <select name="goods_weight_1" class="form-control">
                <option value="0">权重</option>
                <option value="asc">升序</option>
                <option value="desc">降序</option>
            </select>
            <select name="goods_c_time" class="form-control">
                <option value="0">上传时间</option>
                <option value="asc">最新</option>
                <option value="desc">最老</option>
            </select>
            <button class="btn btn-default" type="submit">提交</button>
        </form>


        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="/index.php/admin/showList/editGoods">编辑</a>|
                    <a class="btn btn-sm btn-danger" href="">删除</a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
{/block}