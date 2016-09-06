{extends file='admin\public.tpl'}
{block name=content}
    <div class="row">
        <div class="col-lg-8">
            <form role="form" action="" method="">
                <div class="input-group">
                    <div class="input-group-btn">
                        <select type="button" name="" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <option value="">根据商品ID查询</option>
                            <option value="">根据商品名称查询</option>
                        </select>
                    </div><!-- /btn-group -->
                    <input type="text" name="" class="form-control" aria-label="..." placeholder="请输入商品ID或名称">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">搜索</button>
                  </span>
                </div><!-- /input-group -->
            </form>
        </div><!-- /.col-lg-6 -->
    </div>
    <br>
    <!-- /.row -->
    {*表单展示*}
        <div class="panel panel-default">
            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>商品ID</th>
                        <th>商品SN</th>
                        <th>商品标题</th>
                        <th>商品图片</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>123</td>
                        <td>1233424</td>
                        <td>感冒颗粒</td>
                        <td>@mdo</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="/index.php/admin/addGoods/edit_goods">编辑并添加</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
{/block}