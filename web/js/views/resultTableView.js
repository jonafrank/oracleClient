var app = app || {}

app.ResultTableView = Backbone.View.extend({
    id: 'resultTable_container',
    template: Handlebars.compile($('#resultTable-template').html()),
    initialize: function(columns, result) {
        this.columns = columns;
        this.result = result;
        this.render();
    },
    render: function() {
        this.$el.html(this.template({
            'columns': this.columns,
            'result': this.result,
        }));
        $('#right_bottom').html(this.$el.html());
        $('#result_table').DataTable();
    }
});
