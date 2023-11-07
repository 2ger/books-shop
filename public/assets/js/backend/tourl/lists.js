define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'tourl/lists/index' + location.search,
                    add_url: 'tourl/lists/add',
                    edit_url: 'tourl/lists/edit',
                    del_url: 'tourl/lists/del',
                    multi_url: 'tourl/lists/multi',
                    import_url: 'tourl/lists/import',
                    table: 'url_lists',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'add_time', title: __('Add_time'), operate:'RANGE', addclass:'datetimerange', autocomplete:false},
                        {field: 'to_url', title: __('To_url'), operate: 'LIKE', formatter: Table.api.formatter.url},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});
