var TableView = Backbone.View.extend({
    template: Handlebars.compile($('#oracle-table').html()),
    initialize: function() {
        this.render()
    },
    render: function() {
        console.log('entro')
        var query = $('#query-box').val();
        if (query.trim() !== '') {
            $.ajax({
                method: 'POST',
                url: '/query',
                contentType: 'application/json',
                async: false,
                data: {'query': query},
                success: function(data) {
                   console.log(data);
                }
            });
        }
    }
})

var QueriesRouter = Backbone.Router.extend({
    routes: {
        'execute': 'executeQuery'
    },
    executeQuery: function() {
        var table = new TableView();
    }

})
var queryRouter = new QueriesRouter();
Backbone.history.start();