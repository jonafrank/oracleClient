var app = app || {}

app.QueryForm = Backbone.View.extend({
    el: '#queryForm_container',
    template: Handlebars.compile($('#queryForm-template').html()),
    events: {
        'click #execQueryButton': 'executeQuery',
        'submit #query_form': 'executeQuery'
    },
    initialize: function() {
        this.render();
    },
    render: function() {
        this.$el.html(this.template());
    },
    executeQuery: function() {
        var stmt = $('#query_box').val();
        if (!stmt.trim()) {
            return false;
        }
        $.ajax({
            url: '/execute',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({query: stmt}),
            success: function(data) {
                if (data.result) {
                    var resultTable = new app.ResultTableView(data.columns, data.result);
                }
            },
            error: function(xhr, status, error) {
                var message = JSON.parse(xhr.responseText);
                var errorView = new app.ErrorView(message.error);
            }
        });
    }
})
